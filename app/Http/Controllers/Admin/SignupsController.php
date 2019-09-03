<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Signup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SignupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $signups = Signup::with('redemption')->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $signups = Signup::latest()->paginate($perPage);
        }

        $redemptions =  DB::table('signups')
                        ->join('redemption', 'signups.id','=','redemption.signup_id')
                        ->whereNotNull('redemption.outlet_id')
                        ->count();

        return view('admin.signups.index', compact('signups', 'redemptions'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $signup = Signup::with('redemption.outlet')->findOrFail($id);

        return view('admin.signups.show', compact('signup'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Signup::destroy($id);

        return redirect('admin/signups')->with('flash_message', 'Signup deleted!');
    }


    public function download() {
        $csvExporter = new \Laracsv\Export();
        $signups = Signup::with('redemption.outlet')->orderBy('created_at','desc')->get(); // All users        
       // Register the hook before building
        $csvExporter->beforeEach(function ($signup) {
            if (strtotime($signup->redemption->created_at) !== strtotime($signup->redemption->updated_at)) {
                $signup->redeemed_at = $signup->redemption->updated_at;
            } else {
                $signup->redeemed_at = '';
            }
            $signup->opt_in = $signup->opt_in ? 'Yes' : 'No';
            
        });

        $csvExporter->build($signups, [
            'name' => 'Full Name',
            'email' => 'Email', 
            'phone' => 'Phone',
            'beer' => 'Preferred Beer',
            'opt_in' => 'Newsletter Opt In',
            'phone' => 'Phone',             
            'redemption.redeem_code' => 'Redeem Code', 
            'redemption.outlet.title' => 'Outlet', 
            'created_at' => 'Registered', 
            'redeemed_at' => 'Redeemed'
            ])->download();
    }
}
