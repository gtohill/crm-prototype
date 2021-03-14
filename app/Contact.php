<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = 
    [
        'user_id',
        'company_id',
        'first_name',
        'last_name',
        'title',
        'ext',
        'phone',        
        'email'        
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }


}
