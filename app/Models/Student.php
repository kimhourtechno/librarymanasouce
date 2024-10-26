<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function returnbooks()
{
    return $this->hasMany(ReturnBook::class, 'borrow_id', 'borrow_id');
}

public function returnbookdetails()
{
    return $this->hasManyThrough(
        ReturnBookDetail::class,
        ReturnBook::class,
        'borrow_id',
        'returnbook_id',
        'borrow_id',
        'id'
    );
}

public function brokenbooks()
{
    return $this->hasMany(BrokenBook::class, 'borrow_id', 'borrow_id');
}

public function brokenbookdetails()
{
    return $this->hasManyThrough(
        BrokenBookDetail::class,     // Final model
        BrokenBook::class,           // Intermediate model
        'borrow_id',                 // Foreign key on `brokenbooks` table
        'brokenbook_id',             // Foreign key on `brokenbookdetails` table
        'borrow_id',                 // Local key on `students` table
        'brokenbook_id'                         // Local key on `brokenbooks` table
    );
}


public function borrows()
{
    return $this->hasMany(Borrow::class, 'borrow_id', 'borrow_id');
}

public function borrowdetails()
{
    return $this->hasManyThrough(
        BorrowDetail::class,
        Borrow::class,
        'borrow_id',
        'borrow_id',
        'borrow_id',
        'borrow_id'
    );
}


}
