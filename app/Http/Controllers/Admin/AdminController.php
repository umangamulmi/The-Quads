<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $Today = date('y:m:d', time());
        $new = date('l, F d, Y', strtotime($Today));

        $data["username"] = $request->session()->get('user_name');
        $data["today"] = $new;

        return view('home')->with($data);
    }
}