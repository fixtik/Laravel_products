<div class="col-md-12">
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}} </li>
            @endforeach
        </ul>
    @endif

    @if(session('success'))
        <p>{{session()->get('success')}}</p>
    @endif
</div>
