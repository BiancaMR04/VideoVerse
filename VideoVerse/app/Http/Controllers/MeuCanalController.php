<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\User;

require __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Canal; // Certifique-se de importar o modelo Canal

class MeuCanalController extends Controller
{
    public function view()
    {
        // Busque os dados do canal do usuário autenticado (ou como desejar obtê-los)
        $canal = Canal::where('user_id', auth()->id())->first();
        $temCanal = Canal::where('user_id', auth()->id())->exists();

        return view('meu_canal', compact('canal', 'temCanal'));
    }
}
