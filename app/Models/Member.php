<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Yeh line add karne se aap database mein data insert kar paayenge
    protected $fillable = ['member_id', 'name', 'phone', 'email', 'address'];
}
