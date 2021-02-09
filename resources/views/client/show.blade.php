@extends('layouts.app')

@section('content')
    <div class="row col-10 justify-content-center">
        @if(!empty($client))
            <h1 class="text-center">Client</h1>
            <div class="col-10">
                <table class="table table-bordered table-secondary">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-3">{{$client->name}}</td>
                        <td class="col-3">{{$client->gender}}</td>
                        <td class="col-3">{{$client->phone}}</td>
                        <td class="col-3">{{$client->address}}</td>
                        <td class="col-1 "><a href="{{route('clients.edit', ['id' => $client->id])}}" class="btn bg-secondary border-secondary">Edit</a></td>
                        <td class="col-1">
                            <form action="{{route('clients.destroy', ['id' => $client->id])}}" method="POST">
                                @csrf
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-secondary text-dark">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h1 class="text-center">Cars</h1>
                    <table class="table table-bordered table-secondary">
                        <thead>
                        <tr>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Color</th>
                            <th scope="col">Number</th>
                            <th scope="col">Parking</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td class="col-3">{{$car->brand}}</td>
                            <td class="col-3">{{$car->model}}</td>
                            <td class="col-3">{{$car->color}}</td>
                            <td class="col-3">{{$car->number}}</td>
                            @if($car->parking != 0)
                                <td class="col-3 bg-success"></td>
                            @else
                                <td class="col-3 bg-danger"></td>
                            @endif
                            <td class="col-1">
                                    <form action="{{route('cars.destroy', ['carId' => $car->carId, 'id' => $client->id])}}" method="POST">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-secondary text-dark">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @if (count($errors) > 0)
                    <div class="alert alert-danger p-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('cars.store', ['id' => $client->id])}}"  method="post" class="bg-white border rounded row">
                    @csrf
                    <h2 class="h5 text-muted mb-3 text-left col-5 mt-3">Car</h2>
                    <div class="row">
                        <div class="col-3">
                            <label class="text-muted small">Brand</label>
                            <input type="text" class="form-control" name="car[brand]" required>
                        </div>
                        <div class="col-3">
                            <label class="text-muted small">Model</label>
                            <input type="text" class="form-control" name="car[model]" required>
                        </div>
                        <div class="col-3">
                            <label class="text-muted small">Color</label>
                            <input type="text" class="form-control" name="car[color]" required>
                        </div>
                        <div class="col-3">
                            <label class="text-muted small">Car number</label>
                            <input type="text" class="form-control" name="car[number]" required>
                        </div>
                    </div>
                    <div class="form-row mt-3 text-right">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-secondary">New car</button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <h1 class="text-center">Client is not founded</h1>
        @endif
@endsection
