<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product','name', 'price' ,'description', 'content', 'type', 'position'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class, 'id_product', 'id');
    }
}
