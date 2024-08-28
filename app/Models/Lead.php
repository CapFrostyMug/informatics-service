<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'appeal',
        'status_id',
    ];

    protected $attributes = [
        'status_id' => 1,
    ];

    protected $with = ['status'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(
            Status::class,
            'status_id',
            'id'
        );
    }
}
