<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m230310_161357_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'title' => $this->string(128)->notNull(),
            'desc' => $this->text()->null(),
            'year' => $this->integer()->unsigned()->notNull(),
            'image_path' => $this->string(128)->notNull()->unique(),
            'episode_count' => $this->integer()->unsigned()->null(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'type_id' => $this->integer()->unsigned()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
