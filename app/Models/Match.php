<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        "name",
        "country",
        "year",
        "winner",
        "runnerup"
    ];
}
