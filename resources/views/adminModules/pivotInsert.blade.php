@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-8 offset-sm-2">
            <h3>Insert Pivot</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pivot') }}"> Back</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('pivot.attach') }}">
                @csrf
                <div class="form-group">
                    <label for="user_id">User:</label>
                    <select class="form-control" name="user_id">
                        <option value="" selected disabled hidden>Choose User</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">
                                id: {{$user->id}}&emsp;name: {{$user->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="process_id">Process:</label>
                    <select class="form-control" name="process_id">
                        <option value="" selected disabled hidden>Choose Process</option>
                        @foreach ($processes as $process)
                            <option value="{{$process->id}}">
                                id: {{$process->id}}&emsp;name: {{$process->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Insert</button>
            </form>
        </div>
    </div>
@endsection
