<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GameRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return strlen(count_chars($value, 3)) === 15;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Игра может быть инициализирована только из строки, с уникальными 15 символами.';
    }
}
