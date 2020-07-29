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
                <h3>Procedures</h3>
                <div>
                    <a href="{{ route('procedures.create')}}" class="btn btn-primary">Create Procedure</a>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <td>id</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Process name</td>
                        <td width="250px">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($procedures as $procedure)
                        <tr>
                            <td>{{$procedure->id}}</td>
                            <td>{{$procedure->name}}</td>
                            <td>{{$procedure->description}}</td>
                            @foreach ($processes as $process)
                                @if($process->id == $procedure->process_id)
                                    <td>{{$process->name}}</td>
                                @endif
                            @endforeach
                            <td>
                                <form action="{{ route('procedures.destroy', $procedure->id)}}" method="post">
                                    <a href="{{ route('procedures.show',$procedure->id)}}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('procedures.edit',$procedure->id)}}" class="btn btn-warning">
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
