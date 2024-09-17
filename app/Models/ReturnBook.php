<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    use HasFactory;
    // ReturnBook.php
    public function returnBookDetails()
    {
        return $this->hasMany(ReturnBookDetail::class, 'returnbook_id', 'id');
    }

    public $timestamps = false; // Disable timestamps

    protected $table = 'returnbooks'; // Make sure this matches your table name

    protected $fillable = [
        'borrow_id',
        'return_date',
    ];
    // Define fillable fields if you want mass assignment
}
