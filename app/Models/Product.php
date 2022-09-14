<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'image',
        'price',
    ];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->whereHas('user');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
