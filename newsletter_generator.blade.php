<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Newsletter Generator</title>
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<style>
	.clickable {
		cursor: pointer;
	}
</style>
</head>
<body>

	<form class="form-horizontal" action="{{route('newsletter_generator')}}" enctype="multipart/form-data" method="post">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}">

		<input type="hidden" name="date" class="form-control" value="<?php echo date('d.m.Y.');?>">

		<input type="hidden" name="counter" id="counter" class="form-control" value=1>

		<div class="container my-3">
			
			<h1>Newsletter Generator</h1>

			<a href="{{ route('newsletter_subscribers') }}">
				<button type="button" id="subscribersBtn" class="btn btn-responsive btn-info btn-lg">
					<span><i class="bi-people"></i> Uredi primatelje</span>
				</button>
			</a>
			
			<div class="card my-3" style="border-color: #e20074;">
				<div class="card-header text-white" style="background-color: rgba(226, 0, 116, 0.9); border-color: #e20074;">
					<div class="row">
						<h3 class="card-title col-10"><i class="bi-newspaper"></i> Izdvojena vijest</h3>
						<h3 class="col-2 text-right"><i onclick="toggleMain()" id="chevronMain" class="bi-chevron-up clickable" data-toggle="collapse" data-target="#main" aria-expanded="true" aria-controls="main"></i></h3>
					</div>
				</div>
				<div class="card-body collapse show" id="main">
					<div id="mainNews">
						<div class="mb-3">
							<label class="form-label" for="title_primary">Naslov</label>
							<input type="text" class="form-control form-control-lg" id="title_primary" name="title_primary" pattern=".{0,250}" placeholder="Unesite naslov">
						</div>
						<div class="mb-3">
							<label class="form-label" for="text_primary">Tekst</label>
							<textarea class="form-control" id="text_primary" name="text_primary" pattern=".{0,2500}" rows="5" placeholder="Unesite tekst"></textarea>
						</div>
						<div class="mb-3">
							<label class="form-label" for="picture_primary">Slika</label>
							<input type="file" class="form-control file" id="picture_primary" name="picture_primary">
							<small id="pictureHelpBlock" class="form-text text-muted">Odaberite sliku s računala</small>
						</div>
						<div class="mb-3">
							<label class="form-label" for="link_primary">Link</label>
							<input type="text" class="form-control" id="link_primary" name="link_primary" placeholder="Unesite link">
						</div>
					</div>
				</div>
			</div>
			
			<div class="card my-3">
				<div class="card-header">
					<div class="row">
						<h3 class="card-title col-10"><i class="bi-card-text"></i> Ostale vijesti</h3>
						<h3 class="col-2 text-right"><i onclick="toggleOther()" id="chevronOther" class="bi-chevron-up clickable" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="true" aria-controls="news addNewsBtn"></i></h3>
					</div>
				</div>
				<div class="card-body collapse multi-collapse show" id="news">
					<div id="newsBody1">
						<div class="mb-3">
							<label class="form-label" for="title_secondary">Naslov</label>
							<input type="text" class="form-control form-control-lg" id="title_secondary-1" name="title_secondary-1" pattern=".{0,250}" placeholder="Unesite naslov">
						</div>
						<div class="mb-3">
							<label class="form-label" for="text_secondary">Tekst</label>
							<textarea class="form-control" id="text_secondary-1" name="text_secondary-1" pattern=".{0,2500}" rows="5" placeholder="Unesite tekst"></textarea>
						</div>
						<div class="mb-3">
							<label class="form-label" for="picture_secondary">Slika</label>
							<input type="file" class="form-control file" id="picture_secondary-1" name="picture_secondary-1">
							<small id="pictureHelpBlock" class="form-text text-muted">Odaberite sliku s računala</small>
						</div>
						<div class="mb-3">
							<label class="form-label" for="link_secondary">Link</label>
							<input type="text" class="form-control" id="link_secondary-1" name="link_secondary-1" placeholder="Unesite link">
						</div>
					</div>
				</div>
				<button type="button" id="addNewsBtn" class="collapse multi-collapse show btn btn-block btn-default">
					<span><i class="bi-plus-square"></i> Dodaj vijest</span>
				</button>
			</div>

			<div class="text-right">
				<button id="submit-btn" type="submit" class="btn btn-responsive btn-success btn-lg">Nastavi <i class="bi-arrow-right"></i></button>
			</div>
			
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<script>

	var changeMain = true;

	function toggleMain() {
		$("#chevronMain").toggleClass("bi-chevron-down", changeMain);
		$("#chevronMain").toggleClass("bi-chevron-up", !changeMain);
		changeMain = !changeMain;
	}

	var changeOther = true;

	function toggleOther() {
		$("#chevronOther").toggleClass("bi-chevron-down", changeOther);
		$("#chevronOther").toggleClass("bi-chevron-up", !changeOther);
		changeOther = !changeOther;
	}

	var newsID = 1;
	
	$('#addNewsBtn').on('click',(function(e) {

		$('#counter').val(newsID + 1);

		$('#news').append('<br/><br/><div id="newsBody'+(newsID++)+'">'+
			'<div class="form-horizontal">'+

				'<div class="mb-3">'+
					'<label class="form-label" for="title_secondary">Naslov</label>'+
					'<input type="text" class="form-control form-control-lg" id="title_secondary-'+(newsID)+'" name="title_secondary-'+(newsID)+'" pattern=".{0,250}" placeholder="Unesite naslov">'+
				'</div>'+
				
				'<div class="mb-3">'+
					'<label class="form-label" for="text_secondary">Tekst</label>'+
					'<textarea class="form-control" id="text_secondary-'+(newsID)+'" name="text_secondary-'+(newsID)+'" pattern=".{0,2500}" rows="5" placeholder="Unesite tekst"></textarea>'+
				'</div>'+
				
				'<div class="mb-3">'+
					'<label class="form-label" for="picture_secondary">Slika</label>'+
					'<input type="file" class="form-control file" id="picture_secondary-'+(newsID)+'" name="picture_secondary-'+(newsID)+'">'+
					'<small id="pictureHelpBlock" class="form-text text-muted">Odaberite sliku s računala</small>'+
				'</div>'+
				
				'<div class="mb-3">'+
					'<label class="form-label" for="link_secondary">Link</label>'+
					'<input type="text" class="form-control" id="link_secondary-'+(newsID)+'" name="link_secondary-'+(newsID)+'" placeholder="Unesite link">'+
				'</div>'+
			
			'</div>'+
			
			'</div>'
			
			);
	}));

</script>