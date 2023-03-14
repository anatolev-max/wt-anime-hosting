<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post"
 *
 * @property int $id
 * @property string $created_at
 * @property string $title
 * @property string $desc
 * @property int $year
 * @property string $image_path
 * @property int $episode_count
 * @property int $episode_duration
 * @property int $user_id
 * @property int $type_id
 *
 * @property User $user
 * @property PostType $postType
 * @property Comment[] $comments
 */
class Post extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%post}}';
    }

    public function rules(): array
    {
        return [
            [['title'], 'trim'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 128],

            [['desc'], 'trim'],
            [['desc'], 'string', 'max' => 128],
            [['desc'], 'default', 'value' => null],

            [['year'], 'required'],
            [['year'], 'integer', 'min' => 1900, 'max' => intval(date('Y'))],

            [['image_path'], 'trim'],
            [['image_path'], 'required'],
            [['image_path'], 'string', 'max' => 128],

            [['episode_count'], 'integer'],
            [['episode_count'], 'default', 'value' => null],

            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['type_id'], 'required'],
            [['type_id'], 'integer'],
            [['type_id'], 'exist', 'targetClass' => PostType::class, 'targetAttribute' => 'id'],
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getType(): ActiveQuery
    {
        return $this->hasOne(PostType::class, ['id' => 'type_id']);
    }

    public function getComments(): ActiveQuery
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}
