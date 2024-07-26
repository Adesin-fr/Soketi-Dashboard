<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class App extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'secret',
        'max-connections',
        'enable_client_messages',
        'enabled',
        'max_backend_events_per_sec',
        'max_client_events_per_sec',
        'max_read_req_per_sec',
    ];

    protected $appends = [
        'diff_for_humans',
    ];

    public function getDiffForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public static function booted()
    {
        self::creating(function ($app) {
            $app->id = uniqid();
            $app->key = bin2hex(random_bytes(16));
            $app->secret = bin2hex(random_bytes(32));
        });
    }


}
