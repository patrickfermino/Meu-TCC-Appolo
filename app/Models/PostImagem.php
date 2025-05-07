<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImagem extends Model
{
    protected $table = 'posts_imgs';

    protected $fillable = [
        'post_id',
        'caminho_imagem',
    ];

    public function post()
    {
        return $this->belongsTo(PostPortfolio::class, 'post_id');
    }
}
