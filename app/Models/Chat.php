<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'own_chat_id', 'res_chat_id', 'res_char_id', 'char_id', 'name', 'icon_img', 'chat_txt'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
