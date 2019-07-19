<?php
/**
 * Project: school
 * Date: 19.07.2019
 * Time: 23:32
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class UserRecord
 *
 * @property int    $id
 * @property string $name
 * @property string $email
 * @property string $passhash
 * @property int    $status
 *
 * @package models
 */
class UserRecord extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user}}';
    }

    /**
     *
     */
    public function setTestUser(): void
    {
        $this->name     = 'John';
        $this->email    = 'user@user.ua';
        $this->passhash = 'hash hash hash';
        $this->status   = 2;
    }


}