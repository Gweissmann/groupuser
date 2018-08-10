<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::paginate(10);
        return view('user.index', ['users' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('station.create');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('user.edit', ['data' => $data]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|exists:users',
        ]);

        $data = User::findOrFail($id);
        $data->name = ucwords(mb_strtolower($request->name));
        $data->email = $request->email;

        if (!$request->get('password') == '') {
            $data->password = bcrypt($request->password);
        }
        $data->save();

        return redirect()->route('users.index')->with('success', 'Dados editados');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('users.index')->with('succes', 'Dados deletados');
    }
}
