<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\Article;
use Response;
use Validator;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showArticle(Request $request)
    {   
        $userArticles = Auth::user()->articles()->orderBy('created_at', 'DESC');
        if (Request::ajax()) {
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $countAddTweet = Input::get('countAddTweet');
            $count = $userArticles->count();
            $temp = $userArticles->skip((int)$countAddTweet)->take($count-(int)$countAddTweet)->get();
            $collection = new Collection($temp);
            $perPage = config('constant.page_number');
            $currentPageShow = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $articles = new LengthAwarePaginator($currentPageShow, count($collection), $perPage);
            $lastPage = $articles->lastPage();
            $view = View::make('articles', array('articles' => $articles))->render();
            return Response::json(array('view' => $view, 'lastPage' => $lastPage));
        }
        return view('home', ['articles' => $userArticles->paginate(config('constant.page_number'))]);
    }

    public function addArticle(Request $request)
    {
        if (Request::ajax()) {
            $rules = array(
                'content' => 'required|max:140',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            }   
            $article = new Article;
            $article->content = Input::get('content');
            $article->user_id = Auth::user()->id;
            $article->save();
            $view = View::make('article', array('article' => $article))->render();
            return Response::json($view);
        }
        return redirect()->to($this->getRedirectUrl())
                        ->withInput($request->input())
                        ->withErrors($errors, $this->errorBag());
    }
}
