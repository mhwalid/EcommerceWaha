<?php

namespace App\Model;

use App\Notifications\EmailNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers'; // add this line with your table name

    public function orders()
    {

        return $this->hasMany('App\Model\Order', 'user_id')->orderBy('created_at', 'desc');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailNotification);
    }
}
