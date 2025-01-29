<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_company',
        'description',
        'adress',
        'phone',
        'email',
    ];

    /**
     * Get the user that belong to this study.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the study.
     */
    public function scopeOwner($query)
    {
        return $query->where('user_id', auth()->id());
    }
    
}
