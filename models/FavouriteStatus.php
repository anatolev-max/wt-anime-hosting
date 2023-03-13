<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "favourite_status"
 *
 * @property int $id
 * @property string $created_at
 * @property string $name
 */
class FavouriteStatus extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%favourite_status}}';
    }

    public function rules(): array
    {
        return [
        ];
    }
}