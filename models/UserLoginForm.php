<?php
/**
 * Project: school
 * Date: 20.07.2019
 * Time: 23:11
 */

namespace app\models;


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
        ]);
    }
}