<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "review"
 *
 * @property int $id
 * @property string $created_at
 * @property int $rate
 * @property int $user_id
 * @property int $post_id
 *
 * @property User $user
 * @property Post $post
 */
class Review extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%review}}';
    }

    public function rules(): array
    {
        return [
            [['rate'], 'required'],
            [['rate'], 'integer'],

            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['post_id'], 'required'],
            [['post_id'], 'integer'],
            [['post_id'], 'exist', 'targetClass' => Post::class, 'targetAttribute' => 'id'],
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getPost(): ActiveQuery
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}
