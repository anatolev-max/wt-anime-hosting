<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user"
 *
 * @property int $id
 * @property string $created_at
 * @property string $login
 * @property string $password_hash
 * @property string $email
 * @property int $age
 * @property string $avatar_path
 *
 * @property Post[] $posts
 * @property Comment[] $comments
 */
class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName(): string
    {
        return '{{%user}}';
    }

    public function rules(): array
    {
        return [
            [['login'], 'trim'],
            [['login'], 'required'],
            [['login'], 'string', 'max' => 128],
            [['login'], 'unique'],

            [['password_hash'], 'trim'],
            [['password_hash'], 'required'],
            [['password_hash'], 'string', 'max' => 255],

            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'string', 'max' => 128],
            [['email'], 'email'],

            [['age'], 'required'],
            [['age'], 'integer', 'min' => 0],

            [['avatar_path'], 'trim'],
            [['avatar_path'], 'required'],
            [['avatar_path'], 'string', 'max' => 128],
            [['avatar_path'], 'unique'],
        ];
    }

    public function getPosts(): ActiveQuery
    {
        return $this->hasMany(Post::class, ['user_id' => 'id']);
    }

    public function getComments(): ActiveQuery
    {
        return $this->hasMany(Comment::class, ['user_id' => 'id']);
    }

    // IdentityInterface
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId(): int
    {
        // TODO: Implement getId() method.
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
