<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait TaskTrait
{
    public function cod(): string
    {
        return (string) Str::uuid();
    }

    public function user(): string
    {
        return Auth::user()->cod;
    }


}
