<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [

        'user_id',
        'due_date',
        'description',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
