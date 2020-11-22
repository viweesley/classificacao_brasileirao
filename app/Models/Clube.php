<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jogo;

class Clube extends Model
{
    use HasFactory;

    protected $table = 'clubes';
    
    protected $fillable = [
        'nome',
        'esculdo',
        'pontos',
        'jogos',
        'vitorias',
        'derrotas',
        'empates',
        'gols_pro',
        'gols_contra',
        'saldo_gols'
    ];

    public $timestamps = false;  


    public function updateByJogo($pontos, $golsRealizados, $golsSofridos){
        $this->pontos = $this->pontos + $pontos;
        $this->jogos++;
        if ($pontos === 3) $this->vitorias++;
        else if ($pontos === 1) $this->empates++;
        else $this->derrotas++;
        $this->gols_pro = $this->gols_pro + $golsRealizados;
        $this->gols_contra = $this->gols_contra + $golsSofridos; 
        $this->saldo_gols = $this->gols_pro - $this->gols_contra; 
        $this->save();
        
        return true;
       
    }
}
