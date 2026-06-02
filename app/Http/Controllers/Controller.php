<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function authorizeAdmin(): void
    {
        abort_unless(auth()->user()?->is_admin, 403, 'Akses ditolak.');
    }
}
