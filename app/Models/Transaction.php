<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'transactionId',
        'amount',
        'message',
        'userId',
        'entityId',
        'paymentMethod',
        'currency',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }
    public function entity()
    {
        return $this->belongsTo(Entity::class, "entityId");
    }
}