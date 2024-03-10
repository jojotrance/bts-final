<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table = 'revenue';

    protected $fillable = [
        'tenant_id',
        'category',
        'investment',
        'net_income',
        'return_of_investment',
        'notes',
    ];

    public function tenantrevenue() {
        return $this->belongsTo(Tenant::class);
    }
}
