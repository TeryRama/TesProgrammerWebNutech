<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
