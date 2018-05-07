<div class="alert alert-error">
    <ul>
        @if( count( $errors ) )
            @foreach( $errors->all() as $error )
                <li class="alert-info">{{$error}}</li>
            @endforeach
        @endif
    </ul>
</div>