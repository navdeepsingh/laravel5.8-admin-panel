<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupRedemptionController extends Controller
{
    public function redeem(Request $request) {
        // @TODO Basic Check Outlet Code
        $validatedData = $request->validate([
            'outlet' => 'required|exists:outlets,code'
        ]);
        
        // @TODO Get Signup object from redeem code

        // @TODO Authenticate signup user with redemption
        // Redeem Code if all good and send to thanks page
        // Else redirect to Error page
    
        return response()->json( $validatedData);
    }
}
