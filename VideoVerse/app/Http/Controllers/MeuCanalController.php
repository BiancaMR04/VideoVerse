<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\User;

require ('/home/eduardo/VideoVerse/VideoVerse/VideoVerse/vendor/autoload.php');

class MeuCanalController extends Controller
{

    public function view(){
        return view('meu_canal');
    }
}