<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post_type"
 *
 * @property int $id
 * @property string $created_at
 * @property string $name
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
        ];
    }
}