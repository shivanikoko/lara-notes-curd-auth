@extends('layouts.app')

@section('title')
    Notes List 
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <a class="btn btn-success float-right" href="/notes/create">Add New Note</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notes as $key=>$note)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$note->title}}</td>
                            <td>{{ str_limit($note->description, $limit = 70, $end = '...') }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="/notes/{{$note->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                                    <a href="/notes/{{$note->id}}/edit/" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                                    <form method="POST" action="/notes/{{$note->id}}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-success"><i class="fa fa-trash"></i></a>
                                    </form>
                                </div>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection