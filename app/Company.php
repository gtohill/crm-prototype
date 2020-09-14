<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = 
    [
        'name',
        'address',
        'city',
        'prov',
        'pc',
        'url',
        'phone'                       
    ];
    
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
