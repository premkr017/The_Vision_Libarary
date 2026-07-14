<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Yeh line aapki file mein missing thi, ise add karein

class Book extends Model
{
    use HasFactory; // Ab PHP ko pata chal jayega ki yeh trait kahan se aaya hai

    protected $fillable = ['title', 'author', 'isbn', 'quantity', 'description'];
}
