<?php

namespace App\Http\Controllers;

use App\Operators\Operators;

class OperatorsController
{
    public function index(Operators $operators)
    {
        $pages = $operators->pagesByCategory();

        return view('front.pages.tools.operators.index', compact('pages'));
    }

    public function show(string $slug, Operators $operators)
    {
        $page = $operators->page($slug);

        abort_unless($page !== null, 404);

        return view('front.pages.tools.operators.show', compact('page'));
    }
}

//## Comparison
//
//- `$a == $b`: Equality with type juggling
//- `$a != $b`: No equality with type juggling
//- `$a <> $b`: No equality with type juggling
//- `$a === $b`: Equality without type juggling
//- `$a !== $b`: No equality without type juggling
//- `$a < $b`: `$a` is less then `$b`
//- `$a <= $b`: `$a` is less then or equal to `$b`
//- `$a > $b`: `$a` is greater then `$b`
//- `$a >= $b`: `$a` is greater then or equal to `$b`
//- `$a && $b`: `$a` and `$b`
//- `$a and $b`: Alias for `&&`
//- `$a || $b`: `$a` or `$b`
//- `$a or $b`: Alias for `||`
//- `$a xor $b`: `$a` or `$b`, but not both
//- `!$a`: Not `$a`
//- `$a <=> $b`: An int less than, equal to, or greater than zero when $a is less than, equal to, or greater than $b, respectively.
//- `$a ? $b : $c`: Ternary operator
//
//## Null coalescing
//
//- `$a ?? $b`: Null coalescing
//- `$a ??= $b`: Shorthand for `$a = $a ?? $b`
//
//## Bitwise
//
//- `$a & $b`: Binary and
//- `$a | $b`: Binary or
//- `$a ^ $b`: Binary xor
//- `~$a`: Binary not
//- `$a << $b`: Bitshift left (each step means "multiply by two")
//- `$a >> $b`: Bitshift right (each step means "divide by two")
//- `$a &= $b`: Shorthand for `$a = $a & $b`
//- `$a |= $b`: Shorthand for `$a = $a | $b`
//- `$a ^= $b`: Shorthand for `$a = $a ^ $b`
//- `$a <<= $b`: Shorthand for `$a = $a << $b`
//- `$a >>= $b`: Shorthand for `$a = $a >> $b`
//
//## Strings
//
//- `$a . $b`: Concat `$a` and `$b`
//- `"{$a} {$b}"`: Interpolate `$a` and `$b` in the same string
//- `$a .= $b`: Shorthand for `$a = $a . $b`
//
//## Generators
//
//- `yield`: Yield a value from a generator
//- `yield from`
