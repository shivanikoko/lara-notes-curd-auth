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
        <div class="col-lg-6 offset-lg-3">  
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">{{$note->title}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$note->description}}</p>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="/notes/{{$note->id}}/edit/" class="btn btn-primary btn-xs">Edit Note</a>
                        </div>
                        <div class="col-lg-6">
                            <form method="POST" class="pull-right" action="/notes/{{$note->id}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs">Delete Note</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection