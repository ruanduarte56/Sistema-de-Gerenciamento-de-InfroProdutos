<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use HasFactory;
    protected $fillable = [
        'i_usuario',
        'pagina_de_vendas',
        'nome',
        'preco',
        'descricao',
        'slug',
        'porcetagem_afiliacao',
        'imagem',
    ];

    protected $casts = [
        'status' => 'string'
    ];

    protected $guarded=[];
    public function filtros(){
        return $this->belongsToMany('App\models\filtros');
    }
}
