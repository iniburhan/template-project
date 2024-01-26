<?php

namespace App\Models\Tables\PFA;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsOutcome extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_pfa_outcome';
    protected $primarykey = 'id';
    
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
