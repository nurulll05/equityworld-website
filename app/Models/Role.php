<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Relasi Role dengan User
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user')
            ->withTimestamps();
    }

    // Relasi Role dengan Permission
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role')
            ->withTimestamps();
    }
}
