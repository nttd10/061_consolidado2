@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="pull-left">
                    <h3> Show procedure</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('procedures.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $procedure->name }}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $procedure->description }}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Typedocument_id:</strong>
                    {{ $procedure->typedocument_id }}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Process_id:</strong>
                    {{ $procedure->process_id }}
                </div>
            </div>
        </div>
    </div>
@endsection
