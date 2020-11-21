<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'empates',
        'gols_pro',
        'gols_contra',
        'saldo_gols'
    ];

    protected function teste(){
        echo 'oi';
    }
}
