<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'student_id', 'phone1','phone2'
    ];

    public function student(){
        return $this ->belongsTo(Student::class, 'student_id');
    }

}
