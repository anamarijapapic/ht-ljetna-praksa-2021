<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Sentry;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Queue\Console\RetryCommand;
use Hash;
use Mail;
use Sentinel;

class AnamarijaNewsletterController extends BaseController {

  public function addPicture($picture) {

    $filename = "";

    if ($picture != null){

      $extension = 'png';

      do {
        $FileExists = false;
        $filename = rand(11111111, 99999999). '.' . $extension;
        if (file_exists( base_path().'/public/newsletter/'.$filename)) {
          $FileExists = true;
        }
      } while ($FileExists);

      $picture->move(base_path().'/public/newsletter/', $filename);

    }

    return $filename;

  }

  public function newsletter_generator() {

    return View('AnamarijaNewsletter.newsletter_generator');

  }

  public function newsletter_generatorpost(Request $request) {

    $data = \Input::all();
    //dd($data);

    $mainPictureName = "";
    
    $mainPictureName = $this->addPicture($request->file('picture_primary'));
    
    $counter = $data["counter"];

    $pictureNames = array();
    
    for ($i = 1; $i < $counter + 1; $i++) {
      $pictureNames[$i] = $this->addPicture($request->file('picture_secondary-'.$i));
    }

    //dd($data, $request, $mainPictureName, $pictureNames);

    return View('AnamarijaNewsletter.newsletter_preview', compact("data", "counter", "mainPictureName", "pictureNames"));

  }

  public function newsletter_subscribers() {

    $primatelji = \DB::select("SELECT * FROM `newsletter_primatelji`");

    return View('AnamarijaNewsletter.newsletter_subscribers', compact('primatelji'));

  }

  public function newsletter_subscriberspost() {

    $data = \Input::all();

    \DB::insert("INSERT INTO newsletter_primatelji (ime, prezime, email) VALUES (?,?,?)", [$data['firstName'], $data['lastName'], $data['email']]);

  }

  public function deletePerson_Newsletter(){

    $data = \Input::all();

    $result = \DB::table('newsletter_primatelji')->where('id', $data['id'])->delete();

    return $result;

  }

  public function newsletter_preview() {

    $data = [];
    $mainPictureName = "";
    $counter = 0;
    $pictureNames = [];
    
    return View('AnamarijaNewsletter.newsletter_preview', compact("data", "counter", "mainPictureName", "pictureNames"));

  }

  public function newsletter_previewpost(Request $request) {

    $data = \Input::all();
    //dd($data);

    $data2 = $data["data"];
    //dd($data2);

    $dateFormatBaza = date("Y-m-d", strtotime($data2["date"]));

    $mainPictureName = $data["mainPictureName"];
    
    $counter = $data["counter"];

    $pictureNames = array();
    
    for ($i = 1; $i < $counter + 1; $i++) {
      $pictureNames[$i] = $data["pictureNames"][$i];
    }

    $tekstualniPodatci = array();
    array_push($tekstualniPodatci, $data2["title_primary"], $data2["text_primary"], $mainPictureName, $data2["link_primary"]); 
    for ($i = 1; $i < $counter + 1; $i++) {
      array_push($tekstualniPodatci, $data2["title_secondary-".$i], $data2["text_secondary-".$i], $pictureNames[$i], $data2["link_secondary-".$i]);
    }

    $lastInsertedID = \DB::table('newsletter_arhiva') -> insertGetId(array(
      'token' => $data['_token'],
      'datum' => $dateFormatBaza,
    ));

    /*\DB::insert("INSERT INTO newsletter_arhiva (token, datum) VALUES (?,?)", [$data['_token'], $dateFormatBaza]);*/

    $uloga = array();
    for ($i = 0; $i < count($tekstualniPodatci); $i += 4) {
      $uloga[$i] = "naslov";
    }
    for ($i = 1; $i < count($tekstualniPodatci); $i += 4) {
      $uloga[$i] = "tekst";
    }
    for ($i = 2; $i < count($tekstualniPodatci); $i += 4) {
      $uloga[$i] = "slika";
    }
    for ($i = 3; $i < count($tekstualniPodatci); $i += 4) {
      $uloga[$i] = "link";
    }
    //dd($uloga, $tekstualniPodatci);

    $tip = "";
    
    foreach ($tekstualniPodatci as $key => $value) {
      if($key < 4) {
        $tip = "primarno";
      }
      else {
        $tip = "sporedno";
      }
      $ulogaTrenutna = $uloga[$key];
      \DB::insert("INSERT INTO newsletter_podatci (uloga, tip, sadrzaj, tokenID) VALUES (?,?,?,?)", [$ulogaTrenutna, $tip, $value, $lastInsertedID]);
    }

    //dd($data, $data2, $dateFormatBaza, $request, $mainPictureName, $pictureNames, $tekstualniPodatci);

    $ljudiEmail = \DB::select("SELECT DISTINCT `email` FROM `newsletter_primatelji`");

    $primateljiEmail = [];

    foreach ($ljudiEmail as $osobaEmail) {
      $primateljiEmail[] = $osobaEmail->email;
    }

    \Mail::send ('AnamarijaNewsletter.newsletter_template_sent', array("data" => $data2, "counter" => $counter, "mainPictureName" => $mainPictureName, "pictureNames" => $pictureNames), function($m) use($primateljiEmail) {
      $m->from('tms@t.ht.hr', 'TMS Portal');
      $m->to($primateljiEmail);

      $m->subject ("Newsletter");
    } );

    //dd("Prošlo");
  
  }

  public function newsletter_arhiva() {

    $arhiva = \DB::select("SELECT * FROM `newsletter_arhiva` ORDER BY `newsletter_arhiva`.`datum` DESC, `newsletter_arhiva`.`id` DESC");
    $redoviNewslettera = \DB::table('newsletter_podatci')
      ->select('tokenID', \DB::raw('count(*) as redovi'))
      ->groupBy('tokenID')
      ->get();
    //dd($arhiva);
    //dd($redoviNewslettera);
    $organizacijaNewslettera = [];

    foreach ($redoviNewslettera as $redNewslettera) {
      $organizacijaNewslettera[$redNewslettera->tokenID] = $redNewslettera->redovi;
    }
    //dd($organizacijaNewslettera);

    $newsletteri = [];
    foreach ($organizacijaNewslettera as $token => $brojRedaka) {
      $newsletteri[$token] = \DB::select("SELECT uloga, tip, sadrzaj FROM `newsletter_podatci` WHERE tokenID = '$token' ORDER BY `newsletter_podatci`.`tokenID` DESC");
    }

    $newsletteri = array_reverse($newsletteri, true);
    //dd($newsletteri);

    foreach ($newsletteri as $token => $podatci) {
      foreach ($podatci as $podatak) {
        $uloga = $podatak->uloga;
        $tip = $podatak->tip;
        $sadrzaj = $podatak->sadrzaj;
        $nizNewslettera[$token][] = $sadrzaj;
      }
    }
    //dd($nizNewslettera);

    return View('AnamarijaNewsletter.newsletter_arhiva', compact('arhiva', 'nizNewslettera'));

  }

}