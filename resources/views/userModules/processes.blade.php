@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($listings as $listing)
                @foreach($processes as $process)
                    @if($listing->process_id == $process->id)
                        <div class="card">
                            <div class="card-header">
                                {{'Process name:  '}}{{$process->name}}
                                <div class="float-right">
                                    <a href="{{action('ListingController@processPDF', $process->id)}}" class="btn btn-primary">
                                        <i class="fa fa-file"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ __('Process description:') }}
                                <br>
                                {{$process->description}}
                            </div>
                            <div class="container">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Procedure</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($procedures as $procedure)
                                            @if($procedure->process_id == $process->id)
                                                <tr>
                                                    <td>{{$procedure->id}}</td>
                                                    <td>{{$procedure->name}}</td>
                                                    <td>{{$procedure->description}}</td>
                                                    <td>
                                                        <a href="{{action('ListingController@procedurePDF', $procedure->id)}}" class="btn btn-primary">
                                                            <i class="fa fa-file"></i>
                                                        </a>
                                                        <a href="{{route('listings.registers',$procedure->id)}}" class="btn btn-primary">
                                                            <i>REG</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection
