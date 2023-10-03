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


    protected function authenticated($request, $user)
    {
        // Verificar se o usuário tem um canal associado ao perfil
        $canal = Canal::where('user_id', $user->id)->first();

        if ($canal) {
            // Se o usuário tiver um canal, redirecione para a rota nomeada 'meu-canal'
            return redirect()->route('meu-canal');
        } else {
            // Se o usuário não tiver um canal, redirecione para a rota nomeada 'cadastro-canal'
            return redirect()->route('cadastro-canal');
        }
    }

}
