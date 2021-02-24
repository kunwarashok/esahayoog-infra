<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentImage extends Model
{
    use HasFactory;

    protected $table = 'document_images';

    protected $fillable=[
        'documentTypeId',
        'image'
    ];
}
