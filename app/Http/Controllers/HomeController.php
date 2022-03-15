<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $service = Service::query()->count();
        $status = Status::all();
        return view('home' , ['services' =>$service , 'status' =>$status]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
