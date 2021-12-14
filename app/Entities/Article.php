<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'article';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'title',
        'abstract',
        'image',
        'publication_date'
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'id', 
        'title',
        'abstract',
        'image',
        'publication_date'
    ];
}