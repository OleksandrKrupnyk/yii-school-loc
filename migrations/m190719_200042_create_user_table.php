<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190719_200042_create_user_table extends Migration
{


    public $userTable = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->userTable, [
            'id'       => $this->primaryKey(),
            'name'     => $this->string(255)->notNull()->comment('Name'),
            'email'    => $this->string(255)->unique()->notNull()->comment('Email'),
            'passhash' => $this->string(255)->notNull()->comment('Password hash'),
            'status'   => $this->integer()->defaultValue(1)->comment('Status'),
        ]);
        $this->addCommentOnTable($this->userTable, 'Users');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->userTable);
    }
}
