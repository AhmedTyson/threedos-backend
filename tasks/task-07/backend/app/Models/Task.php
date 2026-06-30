<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // 
    use HasFactory;
    protected $table= 'tasks';
    protected $guarded = ['id'];
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'due_date',
        'is_completed',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
