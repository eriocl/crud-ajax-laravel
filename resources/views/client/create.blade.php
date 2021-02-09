@extends('layouts.app')

@section('content')
    <div class="row col-10">
        @if (count($errors) > 0)
            <div class="alert alert-danger p-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-4 ">
            <form action="{{route('clients.store')}}"  method="post" class="bg-white p-3 border rounded row">
                @csrf
                    <h2 class="h5 text-muted mb-3 text-left col-5">Client</h2>
                <div class="row">
                    <div class="col-3">
                        <label class="text-muted small">Name</label>
                        <input type="text" class="form-control" name="client[name]" required>
                    </div>
                    <div class="col-3">
                        <label class="text-muted small">Gender</label>
                        <select class="form-select" name="client[gender]" id="" required="true">
                            <option disabled selected value="">...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="text-muted small">Phone</label>
                        <input type="text" class="form-control" name="client[phone]" required>
                    </div>
                    <div class="col-3">
                        <label class="text-muted small">Address</label>
                        <input type="text" class="form-control" name="client[address]" required>
                    </div>
                </div>
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
                            <button type="submit" class="btn btn-secondary">Create</button>
                        </div>
                    </div>
            </form>
    </div>
@endsection
