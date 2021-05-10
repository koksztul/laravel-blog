<?php

namespace App\Services;

use App\Models\Tag;

class TagsParsingService
{
    public static function parse($text)
    {
        $list = preg_split('/ +/', $text);
        $ids = [];
        if ($list[0] == '') {
            return $ids;
        }
        foreach ($list as $tag) {
            $tag = Tag::firstorCreate(['name' => $tag]);
            $ids[] = $tag->id;
        }
        return $ids;
    }
}
