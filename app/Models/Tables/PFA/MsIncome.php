<?php

namespace App\Models\Tables\PFA;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsIncome extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_pfa_income';
    protected $primarykey = 'id';
    
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
