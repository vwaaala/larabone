<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDomain implements Rule
{
    public function passes($attribute, $value): bool|int
    {
        // Use regular expression to validate domain name
        return preg_match('/^([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,}$/i', $value);
    }

    public function message(): string
    {
        return 'The :attribute must be a valid domain name.';
    }
}
