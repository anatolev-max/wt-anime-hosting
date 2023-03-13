<?php

namespace app\models;

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
 * @property int $user_id
 * @property int $type_id
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
        ];
    }
}