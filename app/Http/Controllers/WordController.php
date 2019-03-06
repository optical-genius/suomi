<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::all();
        return view('welcome', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request(['word_rus']));
        $word = new Word();
        $word->user_id = auth()->user()->id;
        $word->word_suomi = $request->input('word_suomi')['0'];
        $word->word_rus = $request->input('word_rus')['0'];
        $word->save();
        return redirect('/word');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->sortBy('word_suomi');
        return view('wordtrain', compact('words'));
    }


    public function suomitrain()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->sortBy('word_suomi');
        return view('suomitrain', compact('words'));
    }

    public function russiantrain()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->sortBy('word_rus');
        return view('russiantrain', compact('words'));
    }

    public function randomsuomi()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->random(10);
        return view('randomsuomi', compact('words'));
    }

    public function randomrussian()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->random(10);
        return view('randomrussian', compact('words'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->where('id', $id);
        return view('wordedit', compact('words'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $words = Word::find($request->input('id')[0]);
        $words->word_suomi = $request->input('word_suomi')[0];
        $words->word_rus = $request->input('word_rus')[0];
        $words->save();
        return redirect('/word');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::find($id);
        $word->delete();
        return redirect('/word');
    }

    public function massdelete(Input $input)
    {
        $worddelemass = Input::all();
        foreach ($worddelemass as $worddel) {
            Word::where('id', $worddel)->delete();

        }
        return redirect('/word');
    }



    public function test(Request $request)
    {
        return ['message' => 'HAve'];
    }


    public function updateajax(Request $request)
    {
        $words = Word::find($request->input('id'));
        $words->word_suomi = $request->input('word_suomi');
        $words->word_rus = $request->input('word_rus');
        $words->save();
        return redirect('/word');
    }
}
