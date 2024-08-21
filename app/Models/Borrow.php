<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'borrow_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'borrows';
    protected $fillable = [
        'user_id',
        'book_id',
        'return_date',
        'action',
        // Add other fillable fields as needed
    ];


}
