<?php


namespace App\Http\Controllers\Requests;

use Illuminate\Http\Request;
use App\Models\WorkHours;
class TimeInOutRequestController
{
    public function setTime(Request $request)
    {
        $chkIn = $request->get('mode') === 'in' ? true: false;
        $data["actor_id"] = $request->session()->get('user_id') ? $request->session()->get('user_id') : '0';
        $data["login_status"] = $request->get('mode');
        if($chkIn === true){
            $id = WorkHours::create($data)->id;
            $request->session()->put('work_hours_id', $id );
            $request->session()->put('login_status', 'logout' );
            return response()->json(['success'=>'ok']);
        }else{
            $work_hours_id = $request->session()->get('work_hours_id');
            if($work_hours_id !== null){
                $result = WorkHours::updateOrCreate(
                    ['id' => $work_hours_id],
                    ['login_status' => 'out']
                );
                $request->session()->forget('work_hours_id');
                $request->session()->put('login_status', 'login' );
                return response()->json(['success'=>'ok']);
            }
        }
        return response()->json(['success'=>'error']);
    }
}