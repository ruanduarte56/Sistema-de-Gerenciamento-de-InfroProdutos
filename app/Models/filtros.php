<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filtros extends Model
{
    use HasFactory;

    // Define a tabela associada ao modelo
    protected $table = 'filtros';

    // Define os campos que podem ser atribuídos em massa
    protected $fillable = [
        'nicho',
        'formato_produto',
        'idioma',
        'moeda',
        'afiliados',
        'tipo_comissao',
        'hotlink_alternativos',
        'premio_afiliado'
    ];

    protected $guarded=[];

    
    public function produtos()
    {
        return $this->belongsToMany('App\models\produtos');
    }
}
