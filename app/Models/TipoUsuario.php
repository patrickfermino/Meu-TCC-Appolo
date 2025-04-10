<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';

    public $timestamps = false;

    protected $fillable = ['nome'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'tipo_usuario');
    }
}