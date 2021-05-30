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
        <form method="POST" action="{{ route('parkings.store') }}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Address</label>
              <input type="text" class="form-control" name="address">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Location</label>
                <input type="text" class="form-control" name="location">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Available Space</label>
                <input type="text" class="form-control" name="available_space">
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Available Time</label>
                <input type="text" class="form-control" name="available_time">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Available Space</label>
                <input type="text" class="form-control" name="review">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>