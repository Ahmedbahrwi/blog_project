<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $primaryKey='blog_uid';
    protected $fillable = [
        
        'blog_uid','blog_title','blog_description',
        'blog_img','blog_status',
       
    ];
}
