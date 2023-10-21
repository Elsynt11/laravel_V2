<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Confirmados extends Model
{
    use HasFactory;
    protected $table = 'confirmados';
    //protected $primaryKey = 'ESTADO_ID';
    public $incrementing = false;
    public $timesstamps = false;
    protected $attributes = ['ESTADO_ID', 'FECHA', 'CASOS'];

    public function estado():BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }
}
