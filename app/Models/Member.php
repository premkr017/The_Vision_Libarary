<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    $table->id();
$table->string('name');
$table->string('phone');
$table->string('email')->unique()->nullable();
$table->string('address');
$table->string('member_id')->unique(); // LIB001 jaise
$table->timestamps();

}
