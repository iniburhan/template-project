<?php

namespace App\Models\Tables\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsKategori extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_blog_kategori';
    protected $primarykey = 'id';
    
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
