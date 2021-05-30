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
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Location</th>
                <th scope="col">token</th>
              </tr>
            </thead>
            <tbody>
              @foreach($bookings as $result)  
              <tr>
                <th scope="row">{{ $result->id }}</th>
                <td>{{ $result->name }}</td>
                <td>{{ $result->mobile }}</td>
                
                <td>{{ $result->address }}</td>
                <td>{{ $result->location }}</td>
                <td>{{ $result->token }}</td>
                <td>
                    <form method='POST' action="{{ route('bookings.complete',$result->id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info">Completed</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>