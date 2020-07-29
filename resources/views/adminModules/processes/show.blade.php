@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="pull-left">
                    <h3> Show process</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('processes.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $process->name }}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $process->description }}
                </div>
            </div>
        </div>
    </div>
@endsection
