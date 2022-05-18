<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Acervo extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the Acervo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa(): HasOne
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }

    public function tipo(): HasOne
    {
        return $this->hasOne(Tipo::class, 'id', 'tipo_id');
    }
}
