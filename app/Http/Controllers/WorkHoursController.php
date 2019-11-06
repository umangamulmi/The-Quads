<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\WorkHours;

class WorkHoursController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getData($request);
        $data["status"] = $request->session()->get('login_status') ? $request->session()->get('login_status') : 'login';

        return view('workHours')->with($data);
    }

    public function view(Request $request)
    {
        $data = $this->getData($request);
        $data['hours']=WorkHours::with('actor')->get();

        return view('admin.showHours')->with($data);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function massDestroy(Request $request)
    {
        WorkHours::query()->delete();

        return response(null, 204);
    }

    private function getData(Request $request)
    {
        $Today = date('y:m:d', time());
        $new = date('l, F d, Y', strtotime($Today));

        $data["username"] = $request->session()->get('user_name');
        $data["today"] = $new;
        return $data;
    }
}
