<?php

namespace app\services;

use app\models\Post;

class PostService
{
    /**
     * @param array $data
     * @return bool
     */
    public function dc_create(array $data): bool
    {
        $post = new Post();

        $post->title = $data['title'];
        $post->desc = $data['desc'];
        $post->year = $data['year'];
        $post->image_path = $data['image_path'];
        $post->episode_count = $data['episode_count'];
        $post->episode_duration = $data['episode_duration'];
        $post->user_id = $data['user_id'];
        $post->type_id = $data['type_id'];

        return $post->save();
    }
}