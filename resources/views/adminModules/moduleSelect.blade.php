@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Select') }}</div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('processes.index') }}" >Processes</a>
                        <a class="btn btn-primary" href="{{ route('procedures.index') }}" >Procedures</a>
                        <a class="btn btn-primary" href="{{ route('documents.index') }}" >Documents</a>
                        <a class="btn btn-primary" href="{{ route('pivot') }}" >Pivot</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
