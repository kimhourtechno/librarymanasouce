<?php

namespace App\Rules;
use App\Models\Borrow;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckReturnDate implements ValidationRule
{
    private $borrowId;
    public function __construct($borrowId)
    {
        $this->borrowId = $borrowId;
    }
    public function passes($attribute, $value)
    {
        $borrow = Borrow::find($this->borrowId);
        return !$borrow || !$borrow->return_date; // Return true if no return_date is set
    }
    public function message()
    {
        return 'Return date is already set for this borrow record.';
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
