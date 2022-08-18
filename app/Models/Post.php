<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // public static function boot():void
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->posted_by=auth()->user()->id;
    //     });
    // }

    // public function user():BelongsTo
    // {
    //     return $this->belongsTo('User::class', 'posted_by');
    // }
}
