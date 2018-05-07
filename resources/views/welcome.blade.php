@extends( 'layouts.master' )

@if( Auth::check() )
    {{'logged in'}}
@endif