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


    /**
     * Get all words from big vocabulary and paginate
     * Получаем все слова из большого словаря и разбиваем на страницы
     */
    public function index()
    {
        $vocabularies = Vocabulary::paginate(25);
        return view('vocabulary', compact('vocabularies'));
    }


    /**
     * Word search. Searches for both Russian and Finnish words
     * Поиск по большому словарю. Ищет как финские так и русские слова.
     */
    public function searchwords(Request $request)
    {
        $searchwords = DB::table('vocabularies')
            ->where('word_rus', 'like', '%' . $request['word_rus'] . '%')
            ->orWhere('word_suomi', 'like', '%' . $request['word_rus'] . '%')
            ->get();



        if ($searchwords->first() == null){



            $searchwords = array(
                array('word_rus' => 'В словаре нет такого слова'),
                );

         return compact('searchwords');
        }
        else{
            return compact('searchwords');
        }

    }


}
