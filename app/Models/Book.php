<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'name',
        'year',
        'page',
        'author',
        'publisher_id',
    ];

    public static $rules = [
        'isbn' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'year' => 'required|integer',
        'page' => 'required|integer',
        'author' => 'required|string|max:255',
        'publisher_id' => 'required|integer',
    ];

    /**
     * book's publisher
     *
     * @return void
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class)
            ->withDefault([
                'identifier' => 'WITHOUT ID',
                'fname' => 'NOT FOUND',
                'lname' => 'NOT FOUND',
            ]);
    }

}
