<?php


namespace App\Http\Controllers;

use App\Models\Actor;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirstController extends Controller
{
    public function ajaxPincodePost(Request $request)
    {
//        var_dump($request);
        $result = Actor::where('pincode', sha1($request->get('pincode')))->first();
        if ($result !== null) {
            if ($result->role === 'cashier' && $request->get('title') === 'Administrator')
                return response()->json(['success' => 'Permission Error']);
            if ($result->role === 'manager' && ($request->get('title') === 'Cash')) {
                return response()->json(['success' => 'Permission Error']);
            }
            $redirectUrl = '/clock';
            switch ($request->get('title')) {
                case 'Cash':
                    $redirectUrl = '/cash';
                    break;
                case 'Administrator':
                    $redirectUrl = '/admin';
            }
            $session_id = Session::getId();
            $request->session()->put("user_name", $result->name);
            $request->session()->put("user_role", $result->role);
            $request->session()->put("user_id", $result->id);
            DB::table('session')->insert(
                ['session' => $session_id, 'uid' => $result->id]
            );
            return response()->json([
                'success' => 'ok',
                'url' => $redirectUrl]);
        } else {
            return response()->json(['success' => 'Pincode Error']);
        }
    }
}


     // Create a new controller instance.
