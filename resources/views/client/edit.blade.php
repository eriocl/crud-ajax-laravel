@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger p-4 col-8">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('clients.update',['id' => $client->id])}}"  method="POST" class="bg-white p-3 border rounded col-8">
            @csrf
            {{method_field('patch')}}
            <h2 class="h5 text-muted mb-3 text-left col-5">Client edit</h2>
            <div class="row">
                <div class="col-3">
                    <label class="text-muted small">Name</label>
                    <input value="{{$client->name}}"  type="text" class="form-control" name="client[name]" required>
                </div>
                <div class="col-3">
                    <label class="text-muted small">Gender</label>
                    <select class="form-select" name="client[gender]" required>
                        @if($client->gender ==='male')
                            <option value="Male"  selected>Male</option>
                            <option value="Female">Female</option>
                        @else
                            <option value="Female"  selected>Female</option>
                            <option value="Male">Male</option>
                        @endif
                    </select>
                </div>
                <div class="col-3">
                    <label class="text-muted small">Phone</label>
                    <input value="{{$client->phone}}"  type="text" class="form-control" name="client[phone]" required>
                </div>
                <div class="col-3">
                    <label class="text-muted small">Address</label>
                    <input  value="{{$client->address}}" type="text" class="form-control" name="client[address]" required>
                </div>
            </div>
            <div class="form-row mt-3 text-right">
                <div class="col text-right">
                    <button type="submit" class="btn btn-secondary col-1">Edit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
