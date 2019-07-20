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
        $locale         = 'en_GB';
        $faker          = \Faker\Factory::create($locale);
        $this->name     = $faker->name('male');
        $this->email    = $faker->freeEmail;
        $this->passhash = $faker->password(10, 10);
        $this->status   = $faker->randomDigit;
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
        $this->name = $model->name;
        $this->passhash = $model->password;
        $this->status = 1;

    }

}