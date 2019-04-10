<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note   =   Note::all();
        return view('notes/index',[
            'notes' => $note
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title'         =>  'required|min:5',
            'description'   =>  'required'
        ]);

        $note   =   Note::create(request(['title','description']));

        return redirect('/notes'.'/'.$note->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes/show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes/edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //Validate
        $request->validate([
            'title'         =>  'required|min:5',
            'description'   =>  'required',   
        ]);

        $note->update(request(['title','description']));
        return redirect('/notes'.'/'.$note->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect('/notes');
    }
}
