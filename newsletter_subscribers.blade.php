<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Newsletter Subscribers</title>
  <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

	<div class="container">

    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addNewPersonModal"><i class="bi-person-plus-fill"></i> Dodaj novog primatelja</button>

    <div class="modal fade" id="addNewPersonModal" tabindex="-1" role="dialog" aria-labelledby="addNewPersonModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewPersonModalLabel"><i class="bi-person-fill"></i> Novi primatelj</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formSubmit" action="{{route('newsletter_subscribers')}}"  method="post">
            <div>
              <input type="hidden" id="_token" value="{{ csrf_token() }}" />
              <div class="modal-body">
                <div class="form-row mb-3">
                  <div class="col">
                    <label class="form-label" for="firstName">Ime</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Unesite ime">
                  </div>
                  <div class="col">
                    <label class="form-label" for="lastName">Prezime</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Unesite prezime">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="email">E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Unesite e-mail" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zatvori</button>
                <button type="submit" class="btn btn-success" id="submitNewPersonBtn" name="submitNewPersonBtn"><i class="bi-person-check-fill"></i> Spremi</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card my-3" style="border-color: #e20074;">
      <div class="card-header text-white" style="background-color: rgba(226, 0, 116, 0.9); border-color: #e20074;">
        <h3>Newsletter primatelji</h3>
      </div>
      <div class="card-body">
        <table class="card-table table table-hover table-responsive-md">
          <thead>
            <tr>
              <th scope="col" class="w-25">Ime</th>
              <th scope="col" class="w-25">Prezime</th>
              <th scope="col" class="w-25">E-mail</th>
              <th scope="col" class="w-25"></th>
            </tr>
          </thead>
          <tbody>

            @FOREACH ($primatelji as $primatelj)

            <tr>
              <td>{{$primatelj->ime}}</td>
              <td>{{$primatelj->prezime}}</td>
              <td>{{$primatelj->email}}</td>
              <td class="text-center"><button data-id="{{$primatelj->id}}" class="btn btn-sm btn-danger delete deletePersonBtn"><i class="bi-person-dash-fill"></i> Obriši primatelja</button></td>
            </tr>

            @ENDFOREACH

          </tbody>
        </table>
      </div>
    </div>

    <div class="text-right">
      <a href="{{ route('newsletter_generator') }}">
        <button type="button" id="backToGeneratorBtn" class="btn btn-secondary btn-lg">
          <span><i class="bi-envelope"></i> Povratak na Newsletter Generator</span>
        </button>
      </a>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

  $('#formSubmit').submit(function(event) {
  	event.preventDefault();
  });

  document.getElementById('submitNewPersonBtn').onclick = function()¸{

  	_token = "{{ csrf_token() }}";

    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var email = $('#email').val();

    if (validateEmail(email)) {

      $.ajax({
        method: "POST",
        data: {
          _token:_token, 
          firstName:firstName,
          lastName:lastName,
          email:email,
        },
        url: "{{route('newsletter_subscribers')}}",
      })
      .done(function(msg) {
        alert("Novi primatelj dodan!");
        location.reload();
      });

    }

  };

  $(".deletePersonBtn").on("click", function() {
    
    if (confirm('Jeste li sigurni da želite izbrisati primatelja?')) {
      var id = $(this).data("id");
      $.ajax({
        url : "{{route('deletePerson_Newsletter')}}",
        type: "POST",
        data : {_token:"{{ csrf_token() }}", id: id}
      })
      .done(function(msg) {
        //alert(msg);
        if(msg > 0){
          alert("Primatelj uspješno izbrisan!");
          location.reload();
        }
      });
    }

  });


  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

</script>