<?php

namespace app\models\forms;

use app\models\Post;
use app\models\User;
use yii\base\Model;

class CommentForm extends Model
{
    public $text;
    public $user_id;
    public $post_id;

    public function rules(): array
    {
        return [
            [['text'], 'trim'],
            [['text'], 'required'],
            [['text'], 'string', 'max' => 128],

            [['user_id'], 'required'],
            [['user_id'], 'integer', 'min' => 1],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['post_id'], 'required'],
            [['post_id'], 'integer', 'min' => 1],
            [['post_id'], 'exist', 'targetClass' => Post::class, 'targetAttribute' => 'id'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'text' => 'Введите свой комментарий:',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
        ];
    }
}