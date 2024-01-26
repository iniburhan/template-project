<?php

namespace App\Models\Tables\PFA;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxTransactionDetails extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'trx_pfa_details';
    protected $primarykey = 'id';
    
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
