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
     * @param string $email
     * @return UserRecord|null
     */
    public static function findUserByEmail(string $email): ?UserRecord
    {
        return static::findOne(['email' => $email]);
    }

    /**
     *
     */
    public function setTestUser(): void
    {
        $locale      = 'en_GB';
        $faker       = \Faker\Factory::create($locale);
        $this->name  = $faker->name('male');
        $this->email = $faker->freeEmail;
        $this->setPassword($faker->password(10, 10));
        $this->status = $faker->randomDigit;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function existEmail($email): bool
    {
        return 0 < (int)static::find()->where(['email' => $email])->count();
    }

    /**
     * @param UserJoinForm $model
     */
    public function setUserJoinForm(UserJoinForm $model): void
    {
        $this->email = $model->email;
        $this->name  = $model->name;
        $this->$this->setPassword($model->password);
        $this->status = 1;

    }

    public function setPassword($password):void
    {
        $this->passhash = $password;
    }
}