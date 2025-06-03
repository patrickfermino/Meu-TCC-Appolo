<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notificacao extends Model
{
    use HasFactory;



  protected $table = 'notificacoes'; // <- corrige a inferência automática
    protected $fillable = [
        'usuario_id',
        'remetente_id',
        'mensagem',
        'lida',
        'proposta_id', 
    ];


    public function destinatario() {
    return $this->belongsTo(Usuario::class, 'usuario_id');
}

public function remetente() {
    return $this->belongsTo(Usuario::class, 'remetente_id');
}

    public function proposta()
    {
        return $this->belongsTo(PropostaContrato::class, 'proposta_id');
    }


}
