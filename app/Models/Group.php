<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $primaryKey='group_uid';
    protected $fillable = [
        'group_name',
        'group_uid',
       
    ];

}
