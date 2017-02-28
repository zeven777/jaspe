<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Nob\Admin\Model\NobBase;

class Web extends NobBase implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    protected $table = 'usuario';

    protected $hidden = array('password');

    protected $fillable = array('username','password','nombre','telefono','email');

    protected static $rules = array(
        'username' => 'required|alpha_num|unique:usuario,username',
        'password' => 'required',
        'telefono' => 'required',
        'email' => 'required|email|unique:usuario,email'
    );

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->token;
    }

    public function setRememberToken($value)
    {
        $this->value = $value;
    }

    public function getRememberTokenName()
    {
        return $this->token;
    }
}