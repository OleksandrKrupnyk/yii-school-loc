<?php
/**
 * Project: school
 * Date: 20.07.2019
 * Time: 21:13
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Class UserJoinForm
 *
 * @property string     $name
 * @property string     $email
 * @property string     $password
 * @property UserRecord $userRecord
 * @property string     $password2
 * @package app\models
 */
class UserJoinForm extends Model
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $password2;

    public function scenarios(): array
    {
        return parent::scenarios();
    }


    /**
     * @return array
     */
    public function rules(): array
    {

        return ArrayHelper::merge(parent::rules(), [
            [['name', 'email', 'password', 'password2'], 'trim'],
            [['name', 'email', 'password', 'password2'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'password', 'password2'], 'string', 'min' => 3, 'max' => 60],
            [['password2'], 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
        ]);
    }

    /**
     * @param UserRecord $user
     */
    public function setUserRecord(UserRecord $user): void
    {
        $this->name     = $user->name;
        $this->email    = $user->email;
        $this->password = $this->password2 = '123456';
    }
}