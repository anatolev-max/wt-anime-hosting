<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "review"
 *
 * @property int $id
 * @property string $created_at
 * @property int $rate
 * @property int $user_id
 * @property int $post_id
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
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['post_id'], 'required'],
            [['post_id'], 'integer'],
            [['post_id'], 'exist', 'targetClass' => Post::class, 'targetAttribute' => 'id'],
        ];
    }
}
