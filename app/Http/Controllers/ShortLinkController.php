<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Traits\ShortUrlTrait;

class ShortLinkController extends Controller
{
    use ShortUrlTrait;

    public function home()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate([
           'url' => 'required|url'
        ]);

        $link = $this->getShortUrl($request->url);

        return redirect('/')->with('shortenLink',  $link);
    }

    public function shortLinkRedirection($code)
    {
        $link = Link::where('code', $code)->firstOrFail();

        return redirect($link->url);
    }
}
