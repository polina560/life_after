<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partner}}`.
 */
class m241206_135849_create_partner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название партнера'),
            'logo' => $this->string()->comment('Логотип партнера'),
            'link' => $this->string()->comment('Ссылка на сайт партнера'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%partner}}');
    }
}
