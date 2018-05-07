<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionsController extends Controller
{
    function __construct() {
    	// This will only make the below methods ( except destroy() ) executable if user is logged in meaning he is not a guest.
		$this->middleware( 'guest' )->except( 'destroy' );
    }

	function create() {
    	return view( 'sessions.create' );
    }

	/**
	 * This function will be called if the user comes from the root_url/destroy via get request
	 */
    function destroy() {
    	// This function will logout the user.
    	auth()->logout();
    	// Once logged out redirect him to home page.
    	return redirect( url( '/' ) );
    }

    function store() {
		// auth()->attempt( request([ 'email', 'password' ]) ) will automatically login the user and return true
		$user_exits = auth()->attempt( request([ 'email', 'password' ]) );
	    if ( ! $user_exits ) {
	    	// if User does not exist with given credentials then return back to login page making $errors->all() array available.
	    	return back()->withErrors(['message'=>'error']);
	    } else {
	    	// If user exits then redirect him to home page.
	    	return redirect( '/' );
	    }

    }
}
