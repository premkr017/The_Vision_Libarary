<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'isbn', 'quantity', 'description'];

    // 🤝 Yeh relationship function class ke andar hona chahiye (Line 13 se pehle)
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
} // 👈 Class ka closing bracket sabse aakhiri mein aayega!
