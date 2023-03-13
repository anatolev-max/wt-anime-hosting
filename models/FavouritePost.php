<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "favourite_post"
 *
 * @property int $id
 * @property string $created_at
 * @property int $user_id
 * @property int $post_id
 * @property int $status_id
 *
 * @property User $user
 * @property Post $post
 * @property FavouriteStatus $status
 */
class FavouritePost extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%favourite_post}}';
    }

    public function rules(): array
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['post_id'], 'required'],
            [['post_id'], 'integer'],
            [['post_id'], 'exist', 'targetClass' => Post::class, 'targetAttribute' => 'id'],

            [['status_id'], 'required'],
            [['status_id'], 'integer'],
            [['status_id'], 'exist', 'targetClass' => FavouriteStatus::class, 'targetAttribute' => 'id'],
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

    public function getStatus(): ActiveQuery
    {
        return $this->hasOne(FavouriteStatus::class, ['id' => 'status_id']);
    }
}
