@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-8 offset-sm-2">
            <h3>Update Document</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documents.index') }}"> Back</a>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif
            <form method="post" action="{{ route('documents.update', $document->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $document->name }} />
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" value={{ $document->description }} />
                </div>

                <div class="form-group">
                    <label for="typedocument_id">Document type:</label>
                    <select class="form-control" name="typedocument_id">
                        @foreach ($typedocuments as $typedocument)
                            @if ($document->typedocument_id == $typedocument->id)
                                <option value="{{$typedocument->id}}" selected>
                                    id: {{$typedocument->id}}&emsp;name: {{$typedocument->name}}
                                </option>
                            @else
                                <option value="{{$typedocument->id}}">
                                    id: {{$typedocument->id}}&emsp;name: {{$typedocument->name}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="process_id">Process:</label>
                    <select class="form-control" name="process_id">
                        @foreach ($processes as $process)
                            @if ($document->process_id == $process->id)
                                <option value="{{$process->id}}" selected>
                                    id: {{$process->id}}&emsp;name: {{$process->name}}
                                </option>
                            @else
                                <option value="{{$process->id}}">
                                    id: {{$process->id}}&emsp;name:{{$process->name}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
