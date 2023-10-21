<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'produto_id',
        'cliente_id',
        
    ];

    function produto(){
        return $this->belongsTo(Produto::class);
    }

    function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function getVendaPesquisarIndex(string $search = '') {
        $venda = $this->where(function ($query) use ($search) {
            if (is_numeric($search)) {
                // Se $search for um número, busque pelo 'numero_da_venda'
                $query->where('numero_da_venda', $search);
            } else {
                // Se $search for texto, busque pelo nome do produto
                $query->whereHas('produto', function ($subquery) use ($search) {
                    $subquery->where('nome', 'LIKE', "%{$search}%");
                });
            }
        })->get();
    
        return $venda;
    }
    

}
