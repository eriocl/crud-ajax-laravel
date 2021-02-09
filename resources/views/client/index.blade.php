@extends ('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center">Clients</h1>
        <div class="col-8">
            <table class="table table-bordered table-secondary table-hover table-striped">
                <thead>
                <tr>
                    <th class="col-2">Name</th>
                    <th class="col-2">Gender</th>
                    <th class="col-2">Phone</th>
                    <th class="col-2">Address</th>
                    <th class="col-2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr>
                    <td class="col-3">{{$client->name}}</td>
                    <td class="col-3">{{$client->gender}}</td>
                    <td class="col-3">{{$client->phone}}</td>
                    <td class="col-3">{{$client->address}}</td>
                    <td class="col-1 "><a href="{{route('clients.show', ['id'=>$client->id])}}" class="btn bg-secondary border-secondary">Show</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @if(count($clients) != 0)
                @include('paginate')
            @endif
            <div class="row m-1">
                <a class="btn btn-secondary text-dark col-2 m" href="{{route('clients.create')}}">New client</a>
            </div>
        </div>
        <div class="col-8">
            <h1 class="text-center">Parked cars</h1>
            <table class="table table-bordered table-secondary">
                <thead>
                <tr>
                    <th class="col-2">Brand</th>
                    <th class="col-2">Model</th>
                    <th class="col-2">Color</th>
                    <th class="col-2">Number</th>
                    <th class="col-2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($parkedCars as $car)
                    <tr>
                        <td class="col-3">{{$car->brand}}</td>
                        <td class="col-3">{{$car->model}}</td>
                        <td class="col-3">{{$car->color}}</td>
                        <td class="col-3">{{$car->number}}</td>
                        <td class="col-1">
                            <form action="{{route('cars.update', ['id' => $car->id])}}" method="POST">
                                @csrf
                                {{method_field('patch')}}
                                <button type="submit" class="btn btn-secondary text-dark">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(count($parkedCars) != 0)
                @include('paginate')
            @endif
            <form action="{{route('clients.store')}}"  method="post" class="bg-white p-3 border rounded row">
                @csrf
                <h2 class="h5 text-muted mb-3 text-center">Park the car</h2>
                <div class="row">
                    <div class="col-6">
                        <label class="text-muted small">Gender</label>
                        <select class="form-select" name="clientId" id="client">
                            <option disabled selected value="">...</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="text-muted small">Gender</label>
                        <select class="form-select" name="carId" id="car">
                            <option disabled selected value="">...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3 text-right">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-secondary">Park the car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let clientSelect = document.querySelector('#client');
        clientSelect.addEventListener('change', () => {
            let clientId = clientSelect.value;
            let data = {
                id: clientId
            };
            let response = await fetch('login.php', {
                method: 'POST',
                body: JSON.stringify(data),
            });
            response = await response.json();
            console.dir(response);
        });
    </script>



@endsection
