<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    protected $table = 'user';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'secondName', 'middleName', 'email', 'password', 'nickname', 'birthday', 'facebook', 'googleplus', 'linkedin',
        'twitter', 'phone', 'address', 'education', 'educform', 'interests', 'aboutUS', 'aboutMy', 'avatar', 'status',
        'reg_time', 'skype', 'country', 'city', 'cancelled', 'prev_job', 'current_job', 'education_shift', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    }

    public function confirmEmail()
    {
        $this->status = 1;
        $this->token = null;
        $this->save();
    }

    public function fullName()
    {
        return trim($this->firstName . " " . $this->secondName . " " . $this->email);
    }

    public function hasVerifiedEmail()
    {
        return $this->status;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\MailResetPasswordNotification($token));
    }
}
