<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Signup;
use App\Redemption;


class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        //return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:signups',
          'phone' => 'required',
          'beer' => 'required',
          'opt_in' => 'nullable'
        ]);
        
        $signup = Signup::create($validatedData);

        $redemption = new Redemption;
        // Create Random Code
        $redemption->redeem_code = Str::random(5);

        $signup->redemption()->save($redemption);

        return response()->json($signup);
    }

    
}
