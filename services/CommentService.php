<?php

namespace app\services;

use app\models\Comment;
use app\models\forms\CommentForm;

class CommentService
{
    /**
     * @param CommentForm $model
     * @return bool
     */
    public function create(CommentForm $model): bool
    {
        $comment = new Comment();

        $comment->text = $model->text;
        $comment->user_id = $model->user_id;
        $comment->post_id = $model->post_id;

        return $comment->save();
    }
}