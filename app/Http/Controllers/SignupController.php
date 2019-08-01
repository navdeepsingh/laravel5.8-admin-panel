<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Signup;

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
        $requestData = $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'beer' => 'required',
        ]);
        
        Signup::create($requestData);

        return redirect('home')->with('flash_message', 'Signup added!');
    }

    
}
