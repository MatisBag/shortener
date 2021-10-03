<?php

namespace App\Traits;

use App\Models\Link;

trait ShortUrlTrait {
    public function getShortUrl($link)
    {
        if(!Link::where('url', $link)->first()){
            $randomCode = $this->generateCode();

            Link::create([
                'url' => $link,
                'code' => $randomCode
            ]);

            return url($randomCode);
        }
        else {
            return url(Link::where('url', $link)->first()->code);
        }
    }

    private function generateCode(){
        do {
            $randomCode = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )), 1, 5);
        } while (Link::where('code', $randomCode)->exists());
        
        return $randomCode;
    }
}