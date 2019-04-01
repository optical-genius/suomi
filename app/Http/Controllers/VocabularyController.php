<?php

namespace App\Http\Controllers;

use App\Vocabulary;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class VocabularyController extends Controller
{
    //

    public function index()
    {
        $vocabularies = Vocabulary::paginate(25);
        return view('vocabulary', compact('vocabularies'));
    }


    public function test(Request $request)
    {

        $test = DB::table('vocabularies')
            ->where('word_rus', 'like', '%' . $request['word_rus'] . '%')
            ->orWhere('word_suomi', 'like', '%' . $request['word_rus'] . '%')
            ->get();

        return compact('test');
        // $test = Word::all()->where('word_rus', $request['word_rus']);
        // return compact('test');


    }


}
