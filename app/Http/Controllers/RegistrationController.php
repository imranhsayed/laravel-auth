<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    function create() {
    	return view( 'registration.create' );
    }

    function store() {
		// Validate the form

	    $this->validate( request(), [
	    	'name' => 'required',
		    'email' => 'required|email',
		    'password' => 'required|confirmed',
	    ] );

	    // Create and save the user
//	    $user = User::create( request( ['name', 'email', 'password'] ) );
	    $user = User::create( ['name' => request()->name, 'email' => request()->email, 'password' => bcrypt( request()->password ) ] );

	    // Sign them in.
		auth()->login( $user );

	    // Redirect to home page.
	    return redirect( url( '/' ) );
    }
}
