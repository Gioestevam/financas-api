<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $table = "persons";

    protected $fillable = [
        'id', 'first_name', 'last_name', 'age', 'genre', 'cpf', 'user_id'
    ];

    protected $hidden = [
        'id',
    ];

}
