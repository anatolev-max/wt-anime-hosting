<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m230310_000007_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'text' => $this->string(128)->notNull(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'post_id' => $this->integer()->unsigned()->notNull(),
        ]);

        // creates foreign key for table 'user'
        $this->addForeignKey(
            '{{%fk-comment-user_id}}',
            '{{%comment}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates foreign key for table 'post'
        $this->addForeignKey(
            '{{%fk-comment-post_id}}',
            '{{%comment}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
