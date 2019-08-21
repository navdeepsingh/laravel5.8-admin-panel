<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Signup;
use Illuminate\Http\Request;

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

        return view('admin.signups.index', compact('signups'));
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
}
