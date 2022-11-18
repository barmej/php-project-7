
@if(session()->has('messages'))
    <div class="alert alert-success" role="alert">
        <ul style="list-style: none;">
            @foreach(session('messages') as $message)
                <li>{{$message}}</li>
            @endforeach
        </ul>
    </div>
@endif