@extends('layouts.app')

@section('title')
    Write Note 
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <a class="btn btn-success float-right" href="/notes">All Notes</a>
        </div>
    </div>

    <div class="col-lg-8 offset-lg-2">
        <h2 class="text-center">Write Note</h2>

        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form method="POST" action="/notes">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="title" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Save Note">
            </div>
        </form>
    </div>
   
@endsection