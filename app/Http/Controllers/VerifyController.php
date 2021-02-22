<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
	
    public function verify($emailToken){
    	User:where('email_token', $emailToke)->firstOrFail()->update(['email_token', null]);

    	return redirect()
    			->route('account')
    			->with('success', 'Account Verfied');
    }
}
