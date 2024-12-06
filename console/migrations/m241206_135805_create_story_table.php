<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 */
class m241206_135805_create_story_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%story}}', [
            'id' => $this->primaryKey(),
            'accusation' => $this->string()->notNull()->comment('Обвинение'),
            'first_name' => $this->string()->notNull()->comment('Имя'),
            'middle_name' => $this->string()->notNull()->comment('Отчество'),
            'last_name' => $this->string()->notNull()->comment('Фамилия'),
            'add_information' => $this->string()->comment('Дополнительная информация'),
            'desktop_photo' => $this->string()->comment('Фото для десктопа'),
            'mobile_photo' => $this->string()->comment('Фотография для мобильного'),
            'story' => $this->text()->comment('История'),
            'link' => $this->string()->comment('Ссылка'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%story}}');
    }
}
