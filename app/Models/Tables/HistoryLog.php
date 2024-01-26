<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLog extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'history_log';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at',
    ];
}
