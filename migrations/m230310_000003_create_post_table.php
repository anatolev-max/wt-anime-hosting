<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m230310_000003_create_post_table extends Migration
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
            'episode_duration' => $this->integer()->unsigned()->null(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'type_id' => $this->integer()->unsigned()->notNull(),
        ]);

        // creates foreign key for table 'user'
        $this->addForeignKey(
            '{{%fk-post-user_id}}',
            '{{%post}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates foreign key for table 'post_type'
        $this->addForeignKey(
            '{{%fk-post-type_id}}',
            '{{%post}}',
            'type_id',
            '{{%post_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
