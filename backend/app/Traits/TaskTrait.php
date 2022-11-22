<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait TaskTrait
{
    public function setCod(): string
    {
        return (string) Str::uuid();
    }

    public function getCodUser(): string
    {
        return Auth::user()->cod;
    }

    public function getCodUrl(): string
    {
        return explode('/', parse_url($_SERVER['REQUEST_URI'])['path'])[3];
    }
}
