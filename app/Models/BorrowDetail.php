<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    use HasFactory;
    protected $table = 'borrowdetails'; // Specify the correct table name
    protected $fillable = ['borrow_id', 'book_id'];
    public $timestamps = false;

}
