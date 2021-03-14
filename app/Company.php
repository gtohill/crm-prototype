<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = 
    [
        'user_id',
        'name',
        'address',        
        'url',
        'city',
        'prov',
        'pc',        
        'phone',        

    ];
    
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
