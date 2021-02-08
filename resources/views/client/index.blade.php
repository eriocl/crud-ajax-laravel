@extends ('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center">Все клиенты</h1>
        <div class="col-8">
            <table class="table table-bordered table-secondary table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col">Клиент</th>
                    <th scope="col">Авто</th>
                    <th scope="col">Гос. Номер</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr>
                    <td class="col-3">{{$client->name}}</td>
                    <td class="col-3">{{$client->model}}</td>
                    <td class="col-3">{{$client->car_number}}</td>
                    <td class="col-1"><a href="" class="btn btn-bd-light border-secondary">Edit</a></td>
                    <td class="col-1"><a href="" class="btn btn-bd-light border-secondary">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <ul class="pagination">
                    <li class="page-item m-1">
                        <a class="page-link bg-light text-dark" href="{{$clients->previousPageUrl()}}">Previous</a>
                    </li>
                    @if($clients->lastPage() - $clients->currentPage() >= 3)
                        @for($number = $clients->currentPage(); $number <= $clients->currentPage() + 2; $number++)
                            <li class="page-item m-1">
                                <a class="page-link bg-light text-dark"" href="{{$clients->url($number)}}">{{$number}}</a>
                            </li>
                        @endfor
                    @else
                        @for($number = $clients->lastPage() - 1; $number <= $clients->lastPage(); $number++)
                            <li class="page-item m-1">
                                <a class="page-link bg-light text-dark" href="{{$clients->url($number)}}">{{$number}}</a>
                            </li>
                        @endfor
                    @endif
                    <li class="page-item m-1">
                        <a class="page-link bg-light text-dark" href="{{$clients->nextPageUrl()}}">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
