<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBookDetail extends Model
{
    // ReturnDetail.php
    public function returnBook()
    {
        return $this->belongsTo(ReturnBook::class, 'returnbook_id', 'id');
    }

    public $timestamps = false; // Ensure timestamps are disabled

    protected $table = 'returnbookdetails'; // Make sure this matches your table name

    protected $fillable = [
        'returnbook_id', // Ensure this matches the foreign key column in the table
        'book_id',
        'qty',
        'unit_price',
        'total_price',
    ];

}
