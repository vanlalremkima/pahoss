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
  <x-app-layout>
    <div class="container">
      @if(Auth::user() && Auth::user()->role == 'administrator')
        <a class="btn btn-primary" href="{{ route('parkings.create') }}">Create</a>
      @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Address</th>
                <th scope="col">Location</th>
                <th scope="col">Available Space</th>
                <th scope="col">Available Time</th>
                @if(Auth::user() && Auth::user()->role == 'administrator')
                  <th scope="col">Action</th>
                @endif

                @if(Auth::user() && Auth::user()->role == 'user')
                  <th scope="col">Booking</th>
                  <th>Cancel</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @foreach ($parkings as $parking)
                <tr>
                    <th scope="row">{{ $parking->id }}</th>
                    <td>{{ $parking->address }}</td>
                    <td>{{ $parking->location }}</td>
                    <td>{{ $parking->available_space }}</td>
                    <td>{{ $parking->available_time }}</td>

                    @if(Auth::user() && Auth::user()->role == 'administrator')
                    <td>
                        <a class="btn btn-warning" href="{{ route('parkings.edit',$parking->id) }}">Edit</a>
                    </td>
                    <td>
                      <form action="{{ route('parkings.destroy',$parking->id) }}" method="post">
                        @csrf
                        @method('delete')
                          <button type="submit" class="btn btn-danger" >Delete</button>
                      </form>
                      
                    </td>
                    @endif

                    @if(Auth::user() && Auth::user()->role == 'user')
                    <td>
                      <a class="btn btn-info" href="{{ route('bookings',$parking->id) }}">Book</a>
                    </td>
                    
                    <td>
                      <a class="btn btn-info" href="{{ route('bookings.view',$parking->id) }}">Cancel</a>
                    </td>
                    @endif
                  </tr>
                @endforeach
              
              
            </tbody>
          </table>
    </div>
    
  </x-app-layout>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>