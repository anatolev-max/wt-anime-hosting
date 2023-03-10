<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favourite_post}}`.
 */
class m230310_000005_create_favourite_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favourite_post}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'post_id' => $this->integer()->unsigned()->notNull(),
            'status_id' => $this->integer()->unsigned()->notNull(),
        ]);

        // creates foreign key for table 'user'
        $this->addForeignKey(
            '{{%fk-favourite_post-user_id}}',
            '{{%favourite_post}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates foreign key for table 'post'
        $this->addForeignKey(
            '{{%fk-favourite_post-post_id}}',
            '{{%favourite_post}}',
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
        $this->dropTable('{{%favourite_post}}');
    }
}
