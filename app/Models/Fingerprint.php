<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    use HasFactory;

    public $table = "fingerprint";

    protected $guarded = ['id'];

    // protected $casts = [
    //     'active' => 'string'
    // ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
