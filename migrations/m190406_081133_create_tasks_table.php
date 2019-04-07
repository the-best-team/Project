<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m190406_081133_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'category_id' => $this->integer(),
            'target_id' =>$this->integer(),
            'user_id' => $this->integer(),
            'responsible_id' => $this->integer(),
            'date_create' => $this->dateTime(),
            'date_change' => $this->dateTime(),
            'date_plane' => $this->date(),
            'date_resolve' => $this->date(),
            'result' => $this->text(),
            'status_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_tasks_status', 'tasks','status_id', 'status', 'id');
        $this->addForeignKey('fk_tasks_users', 'tasks','user_id', 'users', 'id');
        $this->addForeignKey('fk_tasks_targets', 'tasks','target_id', 'targets', 'id');
        $this->addForeignKey('fk_tasks_categories', 'tasks','category_id', 'categories', 'id');
        $this->addForeignKey('fk_tasks_responsible', 'tasks','responsible_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
