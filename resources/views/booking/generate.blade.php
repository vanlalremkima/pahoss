<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><small>{{ $user_tokken }}</small></h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $user->name }}</h6>
              
              <p class="card-text">{{ $user->mobile }}</p>
              Parking Address: <b>{{ $parking->address }}</b>
              <br>
              Vehicle Type: <b class="card-link">{{ $user->vehicle_type }}</b>
            </div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>