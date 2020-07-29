<?php

namespace App\Http\Controllers;

use App\Process;
use App\User;
use Illuminate\Http\Request;

class PivotController extends Controller
{
    public function index()
    {
        $processes = Process::all();
        $users = User::all();

        return view('adminModules.pivot', compact('processes','users'));
    }

    public function insert()
    {
        $processes = Process::all();
        $users = User::where('rol_id','1')->get();

        return view('adminModules.pivotInsert', compact('processes','users'));
    }

    public function attach(Request $request)
    {
        $request->validate([
            'process_id' => 'required',
            'user_id' => 'required'
        ]);

        $process = Process::find($request->get('process_id'));
        $process->user()->attach($request->get('user_id'));

        return redirect('/pivot')->with('success','Done!');
    }
}
