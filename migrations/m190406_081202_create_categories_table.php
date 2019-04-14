<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m190406_081202_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()
        ]);

        $this->fillIn();
    }

    public function fillIn() {
        $this->batchInsert('{{%categories}}', ['name'], [['работа'], ['дом'], ['саморазвитие'], ['семья'], ['здоровье'], ['спорт'], ['отдых'], ['другое']]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
