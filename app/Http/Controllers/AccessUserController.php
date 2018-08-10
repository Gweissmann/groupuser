<?php

namespace App\Http\Controllers;

use App\Models\AccessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = AccessUser::paginate(10);
        return view('access_user.index', ['access_users' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('access_user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'barcode' => 'required'
        ]);
        $data = new AccessUser;
        $data->name = $request->name;
        $data->birth_date = $request->birthday;
        $data->barcode = $request->barcode;
//        $data->start_date = $request->start_date;
//        $data->end_date = $request->end_date;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->route('access_user.index')->with('success', 'Dados Salvo');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AccessUser::findOrFail($id);
        return view('access_user.edit',['data' => $data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'barcode' => 'required'
        ]);
        $data = AccessUser::findOrFail($id);
        $data->name = $request->name;
        $data->birth_date = $request->birth_date;
        $data->barcode = $request->barcode;
//        $data->start_date = $request->start_date;
//        $data->end_date = $request->end_date;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->route('access_user.index')->with('success', 'Dados Editados');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AccessUser::findOrFail($id);
        $data->delete();
        return redirect()->route('access_user.index')->with('success', 'Dados Excluidos');
    }
}
