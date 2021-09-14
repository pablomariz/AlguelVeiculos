<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = "locais";

    protected $fillable = [
        'rua',
        'numero',
        'bairro'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
