<?php

namespace App\Http\Controllers;

use App\Process;
use App\Procedure;
use App\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade;
use PDF;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::all();
        $procedures = Procedure::all();
        $listings = DB::table('process_users')->where('user_id',Auth::user()->id)->join('processes','process_users.process_id','=','processes.id')->get();
        return view('userModules.processes', ['listings' => $listings])->with('procedures',$procedures)->with('processes',$processes);
    }

    public function listRegisters($id)
    {
        $registers = Register::where('procedure_id',$id)->get();
        $procedure = Procedure::find($id);

        return view('userModules.registers',compact('registers','procedure'));
    }

    public function processPDF(int $id)
    {
        $data = Process::find($id);
        $pdf = PDF::loadView('userModules.pdf_view', compact('data'));

        return $pdf->stream();
    }

    public function procedurePDF(int $id)
    {
        $data = Procedure::find($id);
        $pdf = PDF::loadView('userModules.pdf_view', compact('data'));

        return $pdf->stream();
    }

}
