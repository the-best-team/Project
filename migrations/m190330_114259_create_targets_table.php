<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%targets}}`.
 */
class m190330_114259_create_targets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%targets}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer(),
            'date_create' => $this->dateTime(),
            'date_change' => $this->dateTime(),
            'date_plane' => $this->date(),
            'date_resolve' => $this->date(),
            'status_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_targets_status', 'targets','status_id', 'status', 'id');
        $this->addForeignKey('fk_targets_users', 'targets','user_id', 'users', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%targets}}');
    }
}
