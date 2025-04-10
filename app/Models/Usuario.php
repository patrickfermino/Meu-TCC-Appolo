<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class Usuario extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes, HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome', 'documento', 'email', 'sexo_usuario', 'senha',
        'tipo_usuario', 'data_nasc', 'cep', 'bairro',
        'endereco', 'cidade',
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario');
    }
}