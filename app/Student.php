<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contact;

class Student extends Model
{
    protected $fillable = [

        'name',
        'email',
        'image',
    ];

public function contacts(){
    return $this->hasMany(Contact::class);
}
}
