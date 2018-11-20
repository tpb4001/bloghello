<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    // 配置用户和用户详情
    public function userinfo()
    {
        return $this->hasOne('App\Models\Userdetail','uid');
    }

    public function noticeinfo()
    {
        return $this->hasOne('App\Models\Notices','uid');
    }
    
    public function articleinfo()
    {
        return $this->hasOne('App\Models\Article','aid');
    }
    public function topicinfo()
    {
        return $this->hasOne('App\Models\Topic','uid');
    }
    public function messageinfo()
    {
        return $this->hasOne('App\Models\Message','uid');
    }
    public function message_hfinfo()
    {
        return $this->hasOne('App\Models\Message_hf','uid');
    }

    //用户关注
    public function following()
    {
        return $this->belongsToMany(self::class,'follows','follower_id','followed_id')->withTimestamps();
    }

    //用户的粉丝
    public function followers()
    {
        return $this->belongsToMany(self::class,'follows','followed_id','follower_id')->withTimestamps();
    }

    //关注用户
    public function followThisUser($user)
    {
        return $this->following()->toggle($user);
    }
}
