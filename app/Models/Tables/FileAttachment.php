<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAttachment extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'file_attachments';
    protected $primarykey = 'id';

    protected $fillable = [
        'id_document',
        'document_type',
        'path_file',
        'created_by',
        'updated_by',
    ];
}
