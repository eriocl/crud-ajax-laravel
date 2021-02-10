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
                @include('paginate-clients')
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
                            <form action="{{route('cars.unpark', ['id' => $car->id])}}" method="POST">
                                @csrf
                                {{method_field('patch')}}
                                <button type="submit" class="btn btn-secondary text-dark">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form action="" id="form-add-parking"  method="post" class="bg-white p-3 border rounded">
                @csrf
                {{method_field('patch')}}
                <h2 class="h5 text-muted mb-3 text-center">Park the car</h2>
                <div class="row">
                    <div class="col-6">
                        <label class="text-muted small">Gender</label>
                        <select class="form-select" name="clientId" id="client" required>
                            <option disabled selected value="">Select client</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="text-muted small">Gender</label>
                        <select class="form-select" name="carId" id="car" required>
                            <option id="car-default" disabled selected value=""> Select car</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="">
                        <button type="submit" class="btn btn-secondary">Park the car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const clientSelect = document.querySelector('#client');
        clientSelect.addEventListener('change', async () => {
            const clientId = clientSelect.value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const url = `api/clients/${clientId}/cars`;
            const response = await fetch(url, {
                method: 'GET',
                headers:{
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                }
            });
            const cars = await response.json();
            const carSelect = document.querySelector('#car');
            const defaultCar = document.querySelector('#car-default');
            carSelect.innerHTML = '';
            carSelect.append(defaultCar);
            cars.forEach((car) => {
                const option = document.createElement('option');
                option.textContent = `${car.brand}   ${car.model}   ${car.color}   ${car.number}`;
                option.value = car.id;
                carSelect.append(option);
            });
        });
        const carSelect = document.querySelector('#car');
        carSelect.addEventListener('change', () => {
            if (carSelect.value === '') return false;
            const form = document.querySelector('#form-add-parking');
            form.action = `cars/${carSelect.value}/addpark`;
        });
    </script>
@endsection
