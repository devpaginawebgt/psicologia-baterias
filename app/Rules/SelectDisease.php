<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectDisease implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_array($value)) {
            $fail('Debe seleccionar una opción del listado.');
            return;
        }

        $hasNone = in_array(1, $value);
        
        if (count($value) > 1 && $hasNone) {
            $fail('No se puede seleccionar ninguna y una enfermedad al mismo tiempo.');
        }
    }
}
