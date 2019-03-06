<?php

namespace App\Http\Controllers;

use App\Word;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id);
        return view('addlessons', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return dd($request['lesson_name']);
        $lessons = new Lesson();
        $lessons->name = $request['lesson_name'];
        $lessons->word_id = json_encode($request['words_id']);
        $lessons->user_id = auth()->user()->id;
        $lessons->save();
        return redirect('/addlessons');
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
        $user_id = Auth::id();
        $lessons = Lesson::findOrFail($id);
        $lessons = Lesson::all()->where('id', $id)->first();
        $word_id = json_decode($lessons->word_id);
        $words = Word::all()->whereIn('id', $word_id);
        return view('lessons', compact('lessons', 'words'));

    }


    /**
     * Display the specified resource for grammar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function grammar($id)
    {
        //
        $user_id = Auth::id();
        $lessons = Lesson::findOrFail($id);
        $lessons = Lesson::all()->where('id', $id)->first();
        $word_id = json_decode($lessons->word_id);
        $words = Word::all()->whereIn('id', $word_id);
        return view('grammar', compact('lessons', 'words'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $lessons = Lesson::findOrFail($id);
        $lessons->delete();
        return redirect('/lessons');
    }


    public function all_lessons()
    {
        $user_id = Auth::id();
        $lessons = Lesson::all()->where('user_id', $user_id);
        return view('alllessons', compact('lessons'));
    }
}
