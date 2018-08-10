<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Line::paginate(10);
        return view('lines.index', ['lines' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lines.create');
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
            'title' => 'required|max:150',
        ]);
        $data = new Line;
        $data->title = $request->title;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->route('line.index')->with('success', 'Dados Salvo');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Line::findOrFail($id);
        return view('lines.edit',['data' => $data]);
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
            'title' => 'required|max:150',
        ]);
        $data = Line::findOrFail($id);
        $data->title = $request->title;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->route('line.index')->with('success', 'Dados Editados');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Line::findOrFail($id);
        $data->delete();
        return redirect()->route('line.index')->with('success', 'Dados Excluidos');
    }
}
