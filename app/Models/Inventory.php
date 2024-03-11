<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventories';

    protected $fillable = [
        'category',
        'investment',
        'net_income',
        'return_of_investment',
        'notes',
    ];

    public function stall() {
        return $this->belongsTo(Stall::class);
    }
}
