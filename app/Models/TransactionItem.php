<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'transaction_id'
    ];

    public function product ()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction ()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
