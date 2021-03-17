<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'documentType',
        'entityId'
    ];

    public function documentImages()
    {
        return $this->hasMany(DocumentImage::class, "documentId");
    }
}