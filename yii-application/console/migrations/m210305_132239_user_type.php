<?php

use yii\db\Migration;

/**
 * Class m210305_132239_user_type
 */
class m210305_132239_user_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER table {{%user}} add column TYPE ENUM ('user' , 'admin') default 'user'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210305_132239_user_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210305_132239_user_type cannot be reverted.\n";

        return false;
    }
    */
}
