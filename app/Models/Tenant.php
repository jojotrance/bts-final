<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';

    protected $fillable = [
        'user_id',
        'stall_id',
        'age',
        'contact_no',
        'address',
        'leaseagreement',
        'img_path',
        'status',
    ];

    public function feedback() {
        return $this->hasMany(Feedback::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function stall()
    {
        return $this->belongsTo(Stall::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
