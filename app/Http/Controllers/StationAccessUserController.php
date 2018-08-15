<?php

namespace App\Http\Controllers;

use App\Models\AccessUserHistory;
use App\Models\StationAccessUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StationAccessUserController extends Controller
{
    public function updateStationAccess($station_id, $access_id) {
        $today = Carbon::today();

        $data_check = StationAccessUser::where('station_id', '=', $station_id)->where('access_user_id', '=', $access_id)->first();

        if( $today->toDateString() >= date('Y-m-d', strtotime($data_check->start_date_station)) and $today->toDateString() <= date('Y-m-d', strtotime($data_check->end_date_station)))
            $licensed = 1;
        else
            $licensed = 0;
        $data_history = AccessUserHistory::insert(['station_id' => $station_id, 'access_user_id' => $access_id, 'licensed' => $licensed ,'tested' => 0, 'check_date' => date('Y-m-d', strtotime($today->toDateString()))]);
        if( $data_history > 0)
            return response()->json(['response' => 'updated']);
        else
            return response()->json(['response' => 'null']);
    }

    public function updateStationTest($station_id, $access_id, $test) {
        $data = AccessUserHistory::where('station_id', '=', $station_id)->where('access_user_id', '=', $access_id)->update(['tested' => $test]);
//            dd($data);
        if( $data > 0)
            return response()->json(['test' => 'updated']);
        else
            return response()->json(['test' => 'null']);
    }
}
