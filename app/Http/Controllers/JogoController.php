<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJogos;
use App\Models\Clube;

class JogoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJogos  $request)
    {
        $request->validated();
        $jogo = new Jogo();
        $jogo->clube_mandante_id = $request->clube_mandante_id;
        $jogo->gols_mandante = $request->gols_mandante;
        $jogo->clube_visitante_id = $request->clube_visitante_id;
        $jogo->gols_visitante = $request->gols_visitante;
        $jogo->save();

        if ($jogo->gols_visitante === $jogo->gols_mandante) 
            $pontos = array('mandante' => 1, 'visitante' => 1);
        else if ($jogo->gols_visitante < $jogo->gols_mandante)  
            $pontos = array('mandante' => 3, 'visitante' => 0);
        else $pontos = array('mandante' => 0, 'visitante' => 3);    
  
        $clube_mandante = Clube::find($jogo->clube_mandante_id);
        $clube_mandante->updateByJogo($pontos['mandante'], $jogo->gols_mandante,  $jogo->gols_visitante);
        
        $clube_visitante = Clube::find($jogo->clube_visitante_id);
        $clube_visitante->updateByJogo($pontos['visitante'], $jogo->gols_visitante, $jogo->gols_mandante);
    
        return response()->json(['message' => 'Confronto inserido com sucesso'], 201); 
    }
}
