<?php

namespace LaraDev\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primaryKey = "id";
    public $timestamps = true;
    // public const CREATED_AT = "creation_date";
    // public const UPDATED_AT = "last_update";

    protected $fillable = ['title', 'subtitle', 'description'];
    protected $guarded = [];


}
