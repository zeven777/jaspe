<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Nob\Admin\Model\NobBase;

class User extends NobBase implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    protected $table = "admin";

    protected $hidden = array('password');

    protected $fillable = array('username','password','email','tipo','permisos');

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