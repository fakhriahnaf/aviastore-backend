<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionDetail extends Model
{
    //use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'products_id', 'transaction_id'
    ];

    protected $hidden = [

    ];

    public function transaction()
    {
        return $this-> belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function products()
    {
        return $this-> belongsTo(Products::class, 'products_id', 'id');
    }
}
