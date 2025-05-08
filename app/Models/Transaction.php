<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'invoice_number',
        'pengguna_id',
        'total_price',
        'payment_amount',
        'change_amount',
        'transaction_date'
    ];

    public function items()
    {
        return $this->hasMany(TransactionItem::class);
    }
    
    public function pengguna()
    {
        return $this->belongsTo(UserPos::class, 'pengguna_id');
    }
}
