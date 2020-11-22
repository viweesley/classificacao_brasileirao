<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use Illuminate\Support\Facades\DB;
use App\Models\Jogo;

class ClassificacaoController extends Controller
{
    public function index()
    {
        $classificacao = Clube::orderBy('pontos', 'desc')
        ->orderBy('vitorias', 'desc')
        ->orderBy('saldo_gols', 'desc')
        ->orderBy('gols_pro', 'desc')
        ->orderByDesc(
            DB::table('clubes AS clubes2')->selectRaw('count(*)')
                ->join('jogos', function ($join) {
                    $join->on('jogos.clube_mandante_id', '=', 'clubes.id')
                    ->whereColumn('jogos.clube_visitante_id', '=', 'clubes2.id')
                    ->whereColumn('jogos.gols_mandante', '>' , 'jogos.gols_visitante')
                    ->orOn('jogos.clube_visitante_id', '=', 'clubes.id')
                    ->whereColumn('jogos.clube_mandante_id', '=', 'clubes2.id')
                     ->whereColumn('jogos.gols_mandante', '<' , 'jogos.gols_visitante');
                })
                ->whereColumn('clubes2.jogos', 'clubes.jogos')
                ->whereColumn('vitorias', 'clubes.vitorias')
                ->whereColumn('clubes2.id', '!=', 'clubes.id')
        )
        ->orderBy('gols_contra', 'asc')
        ->get();

        $classificacao->map(function ($item, $key) {
            if($key === 0 ) $item['tipoClassificacao'] = 'campeao';
            else if($key >= 1 AND $key <= 6) $item['tipoClassificacao'] = 'libertadores';
            else if($key >= 7 AND $key <= 13 ) $item['tipoClassificacao'] = 'sul-americana';
            else if($key >= 16 ) $item['tipoClassificacao'] = 'rebaixamento';
        });
    
        return response()->json($classificacao, 200); 
    }
}
