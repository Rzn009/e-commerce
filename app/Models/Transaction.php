<?php

namespace App\Models;

use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'user_id',
        'name',
        'slug',
        'email',
        'phone',
        'addres',
        'courier',
        'payment',
        'payment_url',
        'status',
        'total_price'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction_item()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
