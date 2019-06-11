<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Lesson;

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
     * Добавляем слово в словарь
     *
     * Получаем последнее добавленное слово
     *
     * Добавляем последнее слово из словаря в урок
     *
     * @return \Illuminate\Http\Response
     */
    public function word_add_to_lessons_and_vocabulary(Request $request)
    {

        $word = new Word();
        $word->user_id = auth()->user()->id;
        $word->word_suomi = $request->input('word_suomi')['0'];
        $word->word_rus = $request->input('word_rus')['0'];
        $word->save();
        $word = Word::get()->last();

        $lessons = Lesson::find($request['id']);
        $frominput = array("$word[id]");
        $frombase = json_decode($lessons['word_id'], true);
        $result = array_merge($frombase, $frominput);
        $lessons->word_id = json_encode($result);
        $lessons->user_id = auth()->user()->id;
        $lessons->save();

        return redirect()->back();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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


    /**
     * Get all finish words from user vocabulary from training
     * Получаем все финские слова из пользовательского словаря для тренировки
     */
    public function suomitrain()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->sortBy('word_suomi');
        return view('suomitrain', compact('words'));
    }


    /**
     * Get all russian words from user vocabulary from training
     * Получаем все русские слова из пользовательского словаря для тренировки
     */
    public function russiantrain()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->sortBy('word_rus');
        return view('russiantrain', compact('words'));
    }


    /**
     * Practice 10 russian random words.
     * Получаем 10 случайных финских слов для тренировки
     */
    public function randomsuomi()
    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id);
        if ($words->count() <= 10) {
            $count_word = $words->count();
            $words = Word::all()->where('user_id', $user_id)->random($count_word);
            return view('randomsuomi', compact('words'));
        } else {
            $words = Word::all()->where('user_id', $user_id)->random(10);
            return view('randomsuomi', compact('words'));
        }
    }


    /**
     * Practice 10 russian random words.\
     * Получаем 10 случайных русских слов для тренировки
     */
    public function randomrussian()
    {
        // Get ID authenticated user

        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id);
        if ($words->count() <= 10) {
            $count_word = $words->count();
            $words = Word::all()->where('user_id', $user_id)->random($count_word);
            return view('randomrussian', compact('words'));
        } else {
            $words = Word::all()->where('user_id', $user_id)->random(10);
            return view('randomrussian', compact('words'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * Редактирование ресурса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        // Get ID authenticated user
        $user_id = Auth::id();
        $words = Word::all()->where('user_id', $user_id)->where('id', $id);
        return view('wordedit', compact('words'));
    }

    /**
     * Update the specified resource in storage.
     * Обновление записи
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if (file_exists($request->file('select_file'))){
            $this->validate($request, [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $image = $request->file('select_file');
            $new_name = $request->input('word_suomi')[0] . '_' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("img/word"), $new_name);
            $words = Word::find($request->input('id')[0]);
            $words->word_suomi = $request->input('word_suomi')[0];
            $words->word_rus = $request->input('word_rus')[0];

            if(file_exists('../public/img/word/'.$words->img) && !is_null($words->img)){
                Word::deleteImageFromWord($words->img);

            }

            $words->img = $new_name;
            $words->save();
            return redirect('/word');
        }
        else {
            $words = Word::find($request->input('id')[0]);
            $words->word_suomi = $request->input('word_suomi')[0];
            $words->word_rus = $request->input('word_rus')[0];
            $words->save();
            return redirect('/word');
        }




    }


    /**
     * Remove the specified resource from storage.
     * Удаление одной записи
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


    /**
     * Mass delete words
     * Массовое удаление слов
     */

    public function massdelete(Input $input)
    {
        $worddelemass = Input::all();
        foreach ($worddelemass as $worddel) {
            Word::where('id', $worddel)->delete();
        }
        return redirect('/word');
    }


    /**
     * Adding words from a large dictionary to the user's dictionary
     * Добавляем слова из большого словаря в пользовательский словарь
     */

    public function addFromBigVocabulary (Request $request)
    {
        $input = Input::get('data');

        foreach ($input as $item) {
            $user_id = Auth::id();
            $word = Word::updateOrCreate(array('user_id' => $user_id, 'word_rus' => $item['word_rus'], 'word_suomi' => $item['word_suomi']));
            $word->save();
        }
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
