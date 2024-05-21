<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'position'
    ];

    public function users(): HasOne
    {
        return $this->HasOne(User::class);
    }
}
