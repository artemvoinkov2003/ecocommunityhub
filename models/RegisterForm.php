<?php

namespace app\models;

use yii\base\Model;
use Yii;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;

    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'email', 'password', 'phone'], 'required'],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Данные уже есть в системе']
        ];
    }

    public function register()
    {
        if (!$this->validate()){
            return false;
        }

        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->phone = $this->phone;

        $user->save();
        return true;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Почта',
            'password' => 'Пароль',
            'phone' => 'Телефон'
        ];
    }
}

