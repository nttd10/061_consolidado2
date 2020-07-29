@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="container">
                <a href="/home" class="btn btn-primary float-right">Back</a>
                <h3>Documents</h3>
                <div>
                    <a href="{{ route('documents.create')}}" class="btn btn-primary">Create Document</a>
                </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td>id</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Document type name</td>
                                <td>Process name</td>
                                <td width="250px">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                            <tr>
                                <td>{{$document->id}}</td>
                                <td>{{$document->name}}</td>
                                <td>{{$document->description}}</td>
                                @foreach ($typedocuments as $typedocument)
                                    @if($typedocument->id == $document->typedocument_id)
                                        <td>{{$typedocument->name}}</td>
                                    @endif
                                @endforeach
                                @foreach ($processes as $process)
                                    @if($process->id == $document->process_id)
                                        <td>{{$process->name}}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <form action="{{ route('documents.destroy', $document->id)}}" method="post">
                                        <a href="{{ route('documents.show',$document->id)}}" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('documents.edit',$document->id)}}" class="btn btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        <div>
    </div>
@endsection
