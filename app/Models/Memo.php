<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * メモの所有ユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
