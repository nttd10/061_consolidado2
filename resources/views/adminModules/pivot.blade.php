@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/home" class="btn btn-primary float-right">Back</a>
        <h3>Pivot table</h3>
        <div class="">
            <a href="{{ route('pivot.insert')}}" class="btn btn-primary">Insert</a>
        </div><br>
        <table class="table">
            <thead class="thead">
                <tr>
                    <td>Process id</td>
                    <td>Process name</td>
                    <td>User id</td>
                    <td>User email</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($processes as $process)
                    @foreach ($process->user as $user)
                        <tr>
                            <td>{{$user->pivot->process_id}}</td>
                            <td>{{$process->name}}</td>
                            <td>{{$user->pivot->user_id}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
