@extends('layouts.app')

@section('title')
    Notes List 
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-success float-right" href="/notes/create">Add New Note</a>
            </div>
        </div>
        <div class="row">
            @foreach($notes as $key=>$note)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$note->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><i class='fa fa-clock'></i> 10 hours ago</h6>
                            <p class="card-text">{{ str_limit($note->description, $limit = 15, $end = '...') }}</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="/notes/{{$note->id}}/edit/" class="btn btn-primary btn-xs">Edit Note</a>
                                </div>
                                <div class="col-lg-6">
                                    <form method="POST" action="/notes/{{$note->id}}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs">Delete Note</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            @endforeach
        </div>
    </div>
@endsection