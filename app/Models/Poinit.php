<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poinit extends Model
{
    //protected $table = 'DomainRelatedSettings';
    protected $table = 'point_transactions';


    protected $fillable = [
        'message', 'pointable_type', 'pointable_id', 'amount', 'current'
    ];
}
