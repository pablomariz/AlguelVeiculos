<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'placa',
        'ano',
        'combustivel',
        'descricao',
        'preco',
        'cidade_id',
        'tipo_id', 
        'image'
    ];

    public function local(){
        return $this->hasOne(Local::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
        
    }
}
