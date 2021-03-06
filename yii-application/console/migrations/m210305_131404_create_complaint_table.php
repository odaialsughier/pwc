<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%complaint}}`.
 */
class m210305_131404_create_complaint_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complaint}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'title' => $this->string(255),
            'description' => $this->text(),
            'status' => "ENUM('resolved','pending resolution','dismissed') default 'pending resolution'",
            'date_added' => $this->dateTime(),
        ]);

        $this->addForeignKey('FK_USER_COMPLAINT','{{%user}}','id','{{%complaint}}','user_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_USER_COMPLAINT','{{%user}}');
        $this->dropTable('{{%complaint}}');
    }
}
