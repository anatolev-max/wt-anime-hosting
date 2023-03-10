<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favourite_post}}`.
 */
class m230310_161430_create_favourite_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favourite_post}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favourite_post}}');
    }
}
