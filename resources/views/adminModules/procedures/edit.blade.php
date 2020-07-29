@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-8 offset-sm-2">
        <h3>Update procedure</h3>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('procedures.index') }}"> Back</a>
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
        <form method="post" action="{{ route('procedures.update', $procedure->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $procedure->name }} />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value={{ $procedure->description }} />
            </div>
            <div class="form-group">
                <label for="process_id">Process:</label>
                <select class="form-control" name="process_id">
                    <option value="" selected disabled hidden>Choose Process</option>
                    @foreach ($processes as $process)
                        @if ($procedure->process_id == $process->id)
                            <option value="{{$process->id}}" selected>
                                id: {{$process->id}}&emsp;name: {{$process->name}}
                            </option>
                        @else
                            <option value="{{$process->id}}">
                                id: {{$process->id}}&emsp;name: {{$process->name}}
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
