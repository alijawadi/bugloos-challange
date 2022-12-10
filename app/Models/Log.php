<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Log extends Model
{
    use HasFactory;

    protected $dates = ['time'];

    public function scopeSearchName(Builder $query, string $term = null)
    {
        if (is_null($term)) {
            return;
        }
        $query->where('name', 'like', $term . '%');
    }

    public function scopeSearchStatus(Builder $query, int $term = null)
    {
        if (is_null($term)) {
            return;
        }
        $query->where('status_code', '=', $term);
    }

    public function scopeStartDate(Builder $query, $date = null)
    {
        if (is_null($date)) {
            return;
        }
        $query->whereDate('time', '>=', $date);
    }

    public function scopeEndDate(Builder $query, $date = null)
    {
        if (is_null($date)) {
            return;
        }
        $query->whereDate('time', '<=', $date);
    }
}
