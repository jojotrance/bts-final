<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantFinancial extends Model
{
    use HasFactory;
    protected $table = 'tenant_financials';

    protected $fillable = [
        'tenant_id',
        'amount',
        'type',
        'description',
        'date',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
