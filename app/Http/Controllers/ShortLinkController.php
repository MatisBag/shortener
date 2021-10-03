<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function shortenLink($code)
    {
        $find = Link::where('code', $code)->first();
   
        return redirect($find->link);
    }
}
