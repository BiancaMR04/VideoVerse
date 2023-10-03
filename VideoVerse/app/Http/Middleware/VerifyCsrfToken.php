<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Os URIs que deveriam estar excluídos do middleware CSRF.
     *
     * @var array
     */
    protected $except = [
        'login', // Rota de login
    ];

    // Restante do código...
}
