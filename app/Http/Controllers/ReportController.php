<?php

namespace App\Http\Controllers;

use App\Models\AccessUser;
use App\Models\AccessUserHistory;
use App\Models\Line;
use App\Models\Station;
use App\Models\StationAccessUser;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['api','stations','lines']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    public function search(Request $request)
    {
        $station_accessusers = StationAccessUser::where('start_date_station', '>=', date('Y-m-d', strtotime($request->start_date)))->where('end_date_station', '<=', date('Y-m-d', strtotime($request->end_date)))->get();
//        dd($station_accessusers);
        if(count($station_accessusers) > 0) {
            $datas = AccessUserHistory::get();
            $station = Station::paginate(15);

            return view('reports.search', ['datas' => $datas,'station_accessusers' => $station_accessusers, 'stations' => $station, 'start_date' => $request->start_date, 'end_date' => $request->end_date ]);

        } else
            return view('reports.index')->with('status', 'Não foi possível encontrar a busca');
    }

    public function api($barcode)
    {
        $user = AccessUser::where('barcode', '=', $barcode)->first();
        if($user != null){
                $user_station = StationAccessUser::where('access_user_id', '=', $user->id)->get();
            if(count($user_station)){
                    foreach ($user_station as $keys)
                            $station = Station::where('id','=',$keys->station_id)->get();

                return response()->json(['user' => $user, 'station' => $station, 'userstation' => $user_station]);
            }else{
                return response()->json(['user' => $user, 'station'=> 'null']);
            }

        }else{
            return response()->json(['user' => 'null']);
        }
                
    }
    
    public function stations()
    {
        $stations = Station::all();
        return response()->json(['station' => $stations]);
    }

    public function lines()
    {
        $stations = Line::all();
        return response()->json(['line' => $stations]);
    }
}
