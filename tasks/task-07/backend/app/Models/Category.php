<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
