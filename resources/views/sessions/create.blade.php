@extends( 'layouts.master' )

@section( 'content' )
    <h2>Login</h2>
    <form action="{{url( '/login' )}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" >Login</button>
        </div>
    </form>
    @include( 'layouts.errors' )

    @if( Auth::check() )
        {{'logged in'}}
    @endif
    @endsection