<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ISBN', 'Value', 'id_store'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'id_store');
    }
}
