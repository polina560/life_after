<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questionnaire}}`.
 */
class m241209_073152_create_questionnaire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%questionnaire}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull()->comment('ФИО'),
            'age' => $this->integer()->notNull()->comment('Возраст'),
            'city' => $this->string()->notNull()->comment('Город'),
            'status' => $this->integer()->notNull()->comment('Статус'),
            'work' => $this->boolean()->notNull()->comment('Опыт работы'),
            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%questionnaire}}');
    }
}
