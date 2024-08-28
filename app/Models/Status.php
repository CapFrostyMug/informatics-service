<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(
            Lead::class,
            'status_id',
            'id'
        );
    }
}
