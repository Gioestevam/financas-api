<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outgoing extends Model
{
    protected $table = 'outgoing';

    protected $fillable = [
        'id', 'dateCompetence', 'amount', 'person_id', 'category_id', 'created_by', 'description'
    ];
}
