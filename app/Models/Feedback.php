<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';

    protected $fillable = [
        'tenant_id',
        'reason',
        'suggestion',
        'img_path',
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
}
