<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'author',
        'year_published',
        'isbn',
        'copies_available',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrows')
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }

    public function isBorrowed()
    {
        return $this->users()->whereNull('borrows.returned_at')->exists();
    }


    // New method to decrement copies_available
    public function decrementAvailableCopies()
    {
        $this->decrement('copies_available');
    }
}
