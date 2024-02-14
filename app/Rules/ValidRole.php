<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Spatie\Permission\Models\Role;

class ValidRole implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the role exists in the roles table
        return Role::where('name', $value)->exists();
    }

    public function message()
    {
        return 'The selected role is invalid.';
    }
}
