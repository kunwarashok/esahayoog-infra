<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $table='entities';

    protected $fillable = [
        "name",
        "address",
        "phone",
        "logo",
        "coverImage",
        "email",
        "uniqueName",
        "entityType",
        "verified",
        "status"
    ];
}
