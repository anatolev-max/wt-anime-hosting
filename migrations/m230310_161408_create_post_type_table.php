<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_type}}`.
 */
class m230310_161408_create_post_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_type}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post_type}}');
    }
}
