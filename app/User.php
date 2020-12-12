<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

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

    public function staff()
    {
        return $this->hasOne('App\Staff')->where('status','=','0');
    }

    public function teacher()
    {
        return $this->hasOneThrough('App\Teacher','App\Staff');
    }

    public function staffs()
    {
        return $this->hasOne('App\Staff')->where('status','=','1');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function townships()
    {
        return $this->hasMany('App\Township');
    }

    public function locations()
    {
        return $this->hasMany('App\Township');
    }

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function inquires()
    {
        return $this->hasMany('App\Inquire');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function projecttypes()
    {
        return $this->hasMany('App\Projecttype');
    }

    public function journals()
    {
        return $this->hasMany('App\Journal');
    }

    public function installments()
    {
        return $this->hasMany('App\Installment');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
}
