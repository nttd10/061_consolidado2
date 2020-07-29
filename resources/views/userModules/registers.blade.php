@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container col-md-8">
            <a href="{{route('listings')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="row justify-content-center">
            <h3>{{'Listing registers for procedure: '}}{{$procedure->name}}</h3>
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registers as $register)
                        <tr>
                            <td>{{$register->id}}</td>
                            <td>{{$register->name}}</td>
                            <td>{{$register->description}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
