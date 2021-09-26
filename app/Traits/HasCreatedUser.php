<?php

namespace App\Traits;

use App\Models\User;

trait HasCreatedUser {
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}