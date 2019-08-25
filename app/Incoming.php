<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model {
    protected $table = 'incoming';

    protected $fillable = [
        'id', 'dateCompetence', 'amount', 'person_id', 'category_id', 'created_by', 'description'
    ];
}
