<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class ClassificacaoController extends Controller
{
    public function index(){
        $classificacao = Clube::orderBy('pontos', 'desc')
        ->orderBy('vitorias', 'desc')
        ->orderBy('empates', 'desc')
        ->orderBy('derrotas', 'asc')
        ->orderBy('gols_pro', 'desc')
        ->orderBy('gols_contra', 'asc')
        ->orderBy('saldo_gols', 'desc')
        ->orderBy('nome', 'asc')
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
