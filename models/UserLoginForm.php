<?php
/**
 * Project: school
 * Date: 20.07.2019
 * Time: 23:11
 */

namespace app\models;


use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Class UserLoginForm
 *
 * @package app\models
 */
class UserLoginForm extends Model
{
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;

    private $modelUserRecord;

    /**
     * @return array
     */
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
            [['email', 'password',], 'trim'],
            [['email', 'password',], 'required'],
            [['email'], 'email'],
            [['password',], 'string', 'min' => 3],
            [['email', 'password',], 'string', 'max' => 60],
            [['email'], 'errorIfEmailNotFound'],
            [['password'], 'errorIfWrongPassword']
        ]);
    }

    public function errorIfEmailNotFound(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $model = $this->modelUserRecord = UserRecord::findUserByEmail($this->email);
        if ($model === null) {
            $this->addError('email', 'This email does not register');
        }

    }

    public function errorIfWrongPassword(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $model = $this->modelUserRecord;
        if ($model === null || $model->passhash !== $this->password) {
            $this->addError('password', 'Wrong password');
        }

    }

    public function login()
    {
        if ($this->hasErrors()) {
            return false;
        }

        $model = $this->modelUserRecord;
        if ($model !== null) {
            $uid = UserIdentity::findIdentity($model->id);
            Yii::$app->user->login($uid);
            return true;
        }

        $this->addError('password', 'Wrong password');
        return false;

    }
}