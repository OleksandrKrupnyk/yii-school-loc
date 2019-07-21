<?php

use yii\db\Migration;

/**
 * Handles adding authokey to table `{{%user}}`.
 */
class m190721_152049_add_authokey_column_to_user_table extends Migration
{
    public $userTable = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->userTable, 'authokey', $this->string()->unique()->comment('Authokey'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->userTable, 'authokey');
    }
}
