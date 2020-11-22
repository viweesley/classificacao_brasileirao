<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $table = 'jogos';
    
    protected $fillable = [
        'clube_mandante_id',
        'gols_mandante',
        'clube_visitante_id',
        'gols_visitante',
    ];
  
}
