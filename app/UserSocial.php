<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_social';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['social_id', 'service'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
