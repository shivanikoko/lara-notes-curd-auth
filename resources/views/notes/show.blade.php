@extends('layouts.app')

@section('title')
    SeekGeeks 
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <a class="btn btn-success float-right" href="/notes">All Notes</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">  
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{$note->title}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$note->description}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection