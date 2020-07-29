<?php

namespace App\Http\Controllers;

use App\Process;
use App\Process_user;
use App\User;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::all();
        $users = User::where('rol_id','1')->get();
        $relationships = Process_user::all();

        return view('adminModules.processes.index', compact('processes','users','relationships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminModules.processes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $process = new Process([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $process->save();

        return redirect('/processes')->with('success','Process saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $process = Process::find($id);

        return view('adminModules.processes.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $process = Process::find($id);

        return view('adminModules.processes.edit', compact('process'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $process = Process::find($id);
        $process->name = $request->get('name');
        $process->description = $request->get('description');
        $process->save();

        return redirect('/processes')->with('success','Process updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $process = Process::find($id);
        $process->delete();

        return redirect('/processes')->with('success','Process deleted!');
    }
}
