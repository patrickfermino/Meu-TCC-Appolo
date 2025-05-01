<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaArtistica extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorias_artisticas';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    
    public function usuarios()
{
    return $this->belongsToMany(Usuario::class, 'categorias_usuarios', 'id_categoria', 'id_usuario');
}
}
