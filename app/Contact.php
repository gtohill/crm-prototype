<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = 
    [
        'company_id',
        'first_name',
        'last_name',        
        'phone',        
        'email'        
    ];
    
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
