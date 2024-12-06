<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m241206_135752_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => "int NOT NULL AUTO_INCREMENT",
            'date' => $this->integer()->comment('Дата'),
            'title' => $this->string()->comment('Дата изменения'),
            'description' => $this->string()->notNull()->comment('Описание'),
            'link' => $this->string()->notNull()->comment('Ссылка'),
            'PRIMARY KEY (id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
