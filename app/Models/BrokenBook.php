<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrokenBook extends Model
{
    use HasFactory;
    protected $table = 'brokenbooks'; // Ensure this matches your table name

    // Disable timestamps if not used
    public $timestamps = false;

    // Define fillable fields

    protected $primaryKey = 'brokenbook_id'; // Explicitly set the primary key

    public function details()
    {
        return $this->hasMany(BrokenBookDetail::class, 'brokenbook_id', 'brokenbook_id');
    }


}
