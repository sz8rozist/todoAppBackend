<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    /**
     * A model táblája.
     *
     * @var string
     */
    protected $table = 'todos';

    public $timestamps = false;

    /**
     * A tömeges töltéshez engedélyezett mezők.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'description', 'completed', 'due_date', 'created_at',
    ];
}
