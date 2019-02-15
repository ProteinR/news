<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 13.02.19
 * Time: 10:29
 */

namespace App\Transformer;


use App\Tag;
use League\Fractal\TransformerAbstract;

class TagsTransformer extends TransformerAbstract
{
    public function transform(Tag $tag)
    {
        return [
            'id'  => (int)$tag->id,
            'title'   => $tag->title,
        ];
    }
}