<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'Tasks';

    protected $fillable = ['content'];

    // const CREATED_AT = 'created_at';
    // const DELETED_AT = 'deleted_at';
    // const CONTENT = 'content';

    public static $validation = array(
        'content' => 'required | max:20'
    );
}