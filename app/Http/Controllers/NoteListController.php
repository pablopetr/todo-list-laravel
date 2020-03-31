<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NoteList;
use Carbon\Carbon;

class NoteListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noteList = NoteList::all();
        return view('notes', ['notes' => $noteList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = Carbon::today()->toDateString();
        return view('newnote', ['today' => $today]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->date;
        $notes = NoteList::all();
        $data = ['content' => $request->content, 'background_color' => $request->background_color, 'font_color' => $request->font_color, 'date' => $request->date];
        DB::table('note_lists')->insert($data);
        return redirect()->route('notes', ['notes' => $notes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = DB::table('note_lists')->find($id);
        return view('editnote', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = NoteList::find($id);
        $note->content = $request->content;
        $note->background_color = $request->background_color;
        $note->font_color = $request->font_color;
        $note->date = $request->date;
        $note->save();
        return redirect('/notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NoteList::destroy($id);
        return back();
    }
}
