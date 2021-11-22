<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddCommentToArticleRequest;
use App\Jobs\AddCommentToArticleJob;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index()
    {
        return Article::query()->with(['tags'])->orderByDesc('id')->paginate(10);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return Article::with(['tags', 'comments'])
            ->whereSlug(urldecode($slug))
            ->first();
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function like($id): int
    {
        $article        = Article::whereId($id)->first();
        $article->likes += 1;
        $article->save();

        return $article->likes;
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function incrementView($id): int
    {
        $article        = Article::whereId($id)->first();
        $article->views += 1;
        $article->save();

        return $article->views;
    }

    /**
     * @param AddCommentToArticleRequest $request
     */
    public function commentAdd(AddCommentToArticleRequest $request): void
    {
        AddCommentToArticleJob::dispatchNow(
            $request->post('id'), $request->post('subject'), $request->post('text')
        );
    }
}
