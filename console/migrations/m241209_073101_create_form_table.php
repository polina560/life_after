<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%form}}`.
 */
class m241209_073101_create_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%form}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Имя'),
            'email' => $this->string()->notNull()->comment('E-mail'),
            'moderation_status' => $this->boolean()->defaultValue(0)->comment('Статус модерации'),
            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%form}}');
    }
}
