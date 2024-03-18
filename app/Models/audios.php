<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comentarios;

class audios extends Model
{
    use HasFactory;

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'audios_id');
    }

    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'avaliacao', // Adicionando a propriedade 'avaliacao' ao fillable
    ];
}
