<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [

        'due_date',
        'description',
        'status'
    ];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
