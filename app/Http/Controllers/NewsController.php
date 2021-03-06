<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Show news list

        return view('news/index', [
            'news' => $this->newsList
        ]);
    }
    public function show(int $id)
    {
        $newsList = [];
        foreach ($this->newsList as $news) {
            if ($news['id'] === $id) {
                $newsList[] = $news;
            }
        }

        if (empty($newsList)) {
            abort(code: 404);
        }

        return view('news/show', [
            'id' => $id
        ]);
    }
}
