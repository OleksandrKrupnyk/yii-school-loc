<?php
/**
 * Project: school
 * Date: 20.07.2019
 * Time: 21:13
 */

namespace app\models;


use phpDocumentor\Reflection\Types\Parent_;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Class UserJoinForm
 *
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
            [['password', 'password2'], 'string', 'min' => 3],
            [['password2'], 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            [['name', 'email', 'password', 'password2'], 'string', 'max' => 60],
        ]);
    }
}