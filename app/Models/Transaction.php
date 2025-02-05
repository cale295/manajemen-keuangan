<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'type',
        'amount',
        'transaction_date',
    ];

    /**
     * Get the category associated with the transaction.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
