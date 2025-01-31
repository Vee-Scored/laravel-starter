<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Phone extends Model
{
    use HasFactory;

    public function people () : BelongsTo {
        return $this->belongsTo(People::class,"Person_id");
    }
}

