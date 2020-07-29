<?php

namespace App\Http\Controllers;

use App\Process;
use App\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedures = Procedure::all();
        $processes = Process::all();

        return view('adminModules.procedures.index', compact('procedures','processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processes = Process::all();

        return view('adminModules.procedures.create', compact('processes'));
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
            'description' => 'required',
            'process_id' => 'required'
        ]);
        $procedure = new Procedure([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'process_id' => $request->get('process_id'),
        ]);
        $procedure->save();

        return redirect('/procedures')->with('success','procedure saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $procedure = Procedure::find($id);

        return view('adminModules.procedures.show', compact('procedure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procedure = Procedure::find($id);
        $processes = Process::all();

        return view('adminModules.procedures.edit', compact('procedure','processes'));
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
            'description' => 'required',
            'process_id' => 'required'
        ]);

        $procedure = Procedure::find($id);
        $procedure->name = $request->get('name');
        $procedure->description = $request->get('description');
        $procedure->process_id = $request->get('process_id');
        $procedure->save();

        return redirect('/procedures')->with('success','Procedure updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedure = Procedure::find($id);
        $procedure->delete();

        return redirect('/procedures')->with('success','Procedure deleted!');
    }
}
