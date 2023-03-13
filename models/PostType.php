<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post_type"
 *
 * @property int $id
 * @property string $created_at
 * @property string $name
 *
 * @property Post[] $posts
 */
class PostType extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%post_type}}';
    }

    public function rules(): array
    {
        return [
            [['name'], 'trim'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    public function getPosts(): ActiveQuery
    {
        return $this->hasMany(Post::class, ['type_id' => 'id']);
    }
}
