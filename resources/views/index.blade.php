<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    

<div class="container">
    <div class="row">
        @foreach($contacts as $contact)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    {{$contact->name}}
                    {{$contact->lastname}}
                    {{$contact->phone}}
                    <?php
                     $url = $contact->id;
                     echo $url;
                    ?>
                <br>
                {!! QrCode::size(100)->generate('http://127.0.0.1:8000//profile/'.$contact->id.''); !!}
                <a href="/profile/{{$contact->id}}">mpes sto profil</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>