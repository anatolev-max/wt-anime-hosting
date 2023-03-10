<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favourite_status}}`.
 */
class m230310_161418_create_favourite_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favourite_status}}', [
            'id' => $this->primaryKey(),
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
