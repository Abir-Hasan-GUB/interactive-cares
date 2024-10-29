<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ['full_url', 'short_url', 'user_id', 'visit_count'] ;
    protected $attributes = [
        'visit_count' => 0
    ] ;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'common_urls', 'url_id', 'user_id');
    }
}
