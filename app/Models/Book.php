<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'year',
        'id_department',
        'id_user_created',
        'id_user_updated',
        'id_user_deleted',
    ];
}
