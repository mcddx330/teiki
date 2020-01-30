<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Character extends Authenticatable {
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name_first',
        'name_last',
        'is_foreigner',
        'profile_title',
        'password',
        'level',
        'hp',
        'attack',
        'defense',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * フルネーム
     * @return string
     */
    public function getNameFullAttribute(): string {
        return ((bool)$this->is_foreigner)
            ? sprintf('%s・%s', $this->name_first, $this->name_last)
            : sprintf('%s・%s', $this->name_last, $this->name_first);
    }
}
