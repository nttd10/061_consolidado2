<?php

namespace App\Http\Controllers;

use App\Document;
use App\Process;
use App\Typedocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        $processes = Process::all();
        $typedocuments = Typedocument::all();

        return view('adminModules.documents.index', compact('documents','processes','typedocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processes = Process::all();
        $typedocuments = Typedocument::all();

        return view('adminModules.documents.create', compact('processes','typedocuments'));
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
            'typedocument_id' => 'required',
            'process_id' => 'required'
        ]);
        $document = new Document([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'typedocument_id' => $request->get('typedocument_id'),
            'process_id' => $request->get('process_id'),
        ]);
        $document->save();

        return redirect('/documents')->with('success','Document saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);

        return view('adminModules.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        $processes = Process::all();
        $typedocuments = Typedocument::all();

        return view('adminModules.documents.edit', compact('document','processes','typedocuments'));
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
            'typedocument_id' => 'required',
            'process_id' => 'required'
        ]);

        $document = Document::find($id);
        $document->name = $request->get('name');
        $document->description = $request->get('description');
        $document->typedocument_id = $request->get('typedocument_id');
        $document->process_id = $request->get('process_id');
        $document->save();

        return redirect('/documents')->with('success','Document updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect('/documents')->with('success','Document deleted!');
    }
}
