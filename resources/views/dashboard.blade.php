<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    @if(Auth::user() && Auth::user()->role == 'administrator')
    <div class="container mt-5">
        Users List <br>
    </div>
    
    <table class="table container mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->address }}</td>
              </tr>
            @endforeach
          
          
        </tbody>
    </table>
    @else
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Name: {{ $user->name }}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Mobile: {{ $user->mobile }}</li>
                <li class="list-group-item">Address: {{ $user->address }}</li>
                {{-- <li class="list-group-item">{{ $user->name }}</li> --}}
            </ul>
          </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</x-app-layout>
