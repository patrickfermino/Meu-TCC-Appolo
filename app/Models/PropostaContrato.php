<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropostaContrato extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proposta_contrato';

    protected $fillable = [
        'id_artista',
        'id_usuario_avaliador',
        'titulo',
        'descricao',
        'data',
    ];

    protected $dates = ['data', 'deleted_at'];

    public function artista()
    {
        return $this->belongsTo(PortfolioArtista::class, 'id_artista');
    }

    public function usuarioAvaliador()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_avaliador');
    }

}
