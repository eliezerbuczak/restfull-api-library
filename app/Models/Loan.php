<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory;

    use softDeletes;

    protected $table = 'loans';

    protected $fillable = [
        'loan_date',
        'return_date',
        'status',
        'id_book',
        'id_user',
        'id_user_created',
        'id_user_updated',
        'id_user_deleted',
    ];
}
