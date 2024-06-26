<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
