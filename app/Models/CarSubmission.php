<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarSubmission extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'v5_present' => 'boolean',
            'keys_present' => 'boolean',
            'driveable' => 'boolean',
            'photos' => 'array',
        ];
    }
}
