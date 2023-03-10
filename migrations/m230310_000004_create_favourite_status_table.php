<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favourite_status}}`.
 */
class m230310_000004_create_favourite_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favourite_status}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'name' => $this->string(128)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favourite_status}}');
    }
}
