<?php

namespace App\Http\Controllers;

use App\Models\AccessUser;
use App\Models\Line;
use App\Models\Station;
use App\Models\StationAccessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['updateStationAccess', 'updateStationTest']]);
    }

    public function index()
    {
        $data = Station::paginate(15);
        $users = AccessUser::all();
        $lines = Line::all();
        return view('station.index', ['stations' => $data, 'users' => $users, 'lines' => $lines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lines = Line::all();
        return view('station.create', ['lines' => $lines]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
        ]);
        $data = new Station();
        $data->title = $request->title;
        $data->line_id = $request->line_id;
        $data->critical = 1;
        if(empty($request->critical))
            $data->critical = 0;
        $data->test = 1;
        if(empty($request->test))
            $data->test = 0;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->route('station.index')->with('success', 'Dados Salvo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Station::findOrFail($id);
        $lines = Line::all();
        return view('station.edit', ['data' => $data, 'lines' => $lines]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $data = Station::findOrFail($id);
        $data->title = $request->title;
        $data->line_id = $request->line_id;
        $data->critical = 1;
        if(empty($request->critical))
            $data->critical = 0;
        $data->test = 1;
        if(empty($request->test))
            $data->test = 0;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->route('station.index')->with('success', 'Dados Editados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Station::findOrFail($id);
        $data->delete();
        return redirect()->route('station.index')->with('success', 'Dados Excluidos');
    }

    public function show()
    {

    }

    public function addAccessUsers(Request $request)
    {
        $this->validate($request, [
            'access_user_id' => 'required'
        ]);

        $validate = StationAccessUser::where('station_id', '=', $request->station_id)->
        where('access_user_id', '=', $request->access_user_id)->first();

        if ($request->access_user_id == "Escolha um usuário")
            return redirect()->route('station.index')->with('warning', 'Selecione um usuário valido ao adicionar em um posto');
        else {
            if ($validate)
                return redirect()->route('station.index')->with('warning', 'Usuário já cadastrado no posto');
            else {
                $data = new StationAccessUser();
                $data->station_id = $request->station_id;
                $data->access_user_id = $request->access_user_id;
                $data->start_date_station = date('Y-m-d', strtotime($request->start_date_station));
                $data->end_date_station = date('Y-m-d', strtotime($request->end_date_station));
                $data->licensed = 0;
                $data->save();

                return redirect()->route('station.index')->with('success', 'Usuário Adicionado ao Posto');
            }
        }
    }

    public function destroyAccessUser(Request $request)
    {
        $data = StationAccessUser::findOrFail($request->stationuser_id);
        $data->delete();
        return redirect()->route('station.index')->with('success', 'Usuário Excluido do Posto');
    }



}
