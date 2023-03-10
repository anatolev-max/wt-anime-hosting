<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230310_000001_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'login' => $this->string(128)->notNull()->unique(),
            'email' => $this->string(128)->notNull()->unique(),
            'password_hash' => $this->string(255)->notNull(),
            'age' => $this->integer()->unsigned()->notNull(),
            'avatar_path' => $this->string(128)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
