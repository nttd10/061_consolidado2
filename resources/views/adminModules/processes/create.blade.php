@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-8 offset-sm-2">
            <h3>Add Process</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('processes.index') }}"> Back</a>
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
            <form method="post" action="{{ route('processes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                <button type="submit" class="btn btn-primary">Add process</button>
            </form>
        </div>
    </div>
@endsection
