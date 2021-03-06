<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Redemption;
use App\Events\RedemptionEvent;

class SignupRedemptionController extends Controller
{
    public function redeem(Request $request) {
        // Basic Check Outlet Code
        $validatedData = $request->validate([
            'outlet' => 'required|exists:outlets,code',
            'redeem_code' => 'required|exists:redemption,redeem_code'
        ]);
        
        // Get Outlet Object
        $outlet = Outlet::where('code', $request->outlet)->first();
        
        $redemption = Redemption::where('redeem_code', $request->redeem_code)->first();
        $redemptionOutlet = $redemption->outlet()->get();

        if (sizeof($redemptionOutlet) === 1) {
            // Already Redeemed
            $response = 0;
        } else {
            // New Redemption
            $redemption->outlet_id = $outlet->id;
            $redemption->save();
            $response = 1;

            // Trigger Mailchimp Event
            event(new RedemptionEvent($redemption));
        }

        return response()->json( $response );
    }

    public function getRedeem(Request $request, $code) {
        $redemption = Redemption::where('redeem_code', $code)->first();
        $response = '';
        $status = 404;
        if ($redemption) {
            $signup = $redemption->signup()->get();
            $response = $signup[0]->name;
            $status = 200;
        } 
        return response()->json($response, $status);
    }

}


