<?php

namespace App\Models\Tables\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsArtikel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_blog_artikel';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
