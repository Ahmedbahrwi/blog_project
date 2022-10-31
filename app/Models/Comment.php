<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey='comment_uid';
    protected $fillable = [
        
        'comment_uid',
        'comment_description',
    ];
}
