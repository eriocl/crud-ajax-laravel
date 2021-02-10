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
            @if($clients->lastPage() < 3)
                @for($number = 1; $number <= $clients->lastPage(); $number++)
                    <li class="page-item m-1">
                        <a class="page-link bg-light text-dark" href="{{$clients->url($number)}}">{{$number}}</a>
                    </li>
                @endfor
            @else
                @for($number = $clients->lastPage() - 2; $number <= $clients->lastPage(); $number++)
                    <li class="page-item m-1">
                        <a class="page-link bg-light text-dark" href="{{$clients->url($number)}}">{{$number}}</a>
                    </li>
                @endfor
            @endif
        @endif
        <li class="page-item m-1">
            <a class="page-link bg-light text-dark" href="{{$clients->nextPageUrl()}}">Next</a>
        </li>
    </ul>
</div>
