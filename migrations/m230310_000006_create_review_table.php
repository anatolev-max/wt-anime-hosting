<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m230310_000006_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'rate' => $this->integer()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'post_id' => $this->integer()->unsigned()->notNull(),
        ]);

        // creates foreign key for table 'user'
        $this->addForeignKey(
            '{{%fk-review-user_id}}',
            '{{%review}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates foreign key for table 'post'
        $this->addForeignKey(
            '{{%fk-review-post_id}}',
            '{{%review}}',
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
        $this->dropTable('{{%review}}');
    }
}
