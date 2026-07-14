<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'member_id',
        'issue_date',
        'return_date',
        'status',
        'fine'
    ];

    // 📖 1. Book ke saath relationship (Har issue ek book se juda hai)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // 👤 2. Member ke saath relationship (Har issue ek member se juda hai)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
