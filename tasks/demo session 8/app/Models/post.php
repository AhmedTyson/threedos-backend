<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
