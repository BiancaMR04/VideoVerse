<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Canal;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Verificar se o usuário tem um canal associado ao perfil
        $canal = Canal::where('user_id', $user->id)->first();

        if ($canal) {
            return redirect()->route('meu-canal');
        } else {
            return redirect()->route('criar_canal');
        }
    }
}
