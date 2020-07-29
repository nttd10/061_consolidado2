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
                <h3>Processes</h3>
                <div>
                    <a href="{{ route('processes.create')}}" class="btn btn-primary">Create Process</a>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Users (name)</td>
                            <td width="250px">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($processes as $process)
                        <tr>
                            <td>{{$process->id}}</td>
                            <td>{{$process->name}}</td>
                            <td>{{$process->description}}</td>
                            <td>
                                @foreach ($relationships as $relationship)
                                    @foreach ($users as $user)
                                        @if ($relationship->process_id == $process->id)
                                            @if ($user->id == $relationship->user_id)
                                                {{$user->name}}<br>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('processes.destroy', $process->id)}}" method="post">
                                    <a href="{{ route('processes.show',$process->id)}}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('processes.edit',$process->id)}}" class="btn btn-warning">
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
