<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_number', 
        'virtual_ccu', 
        'test_time', 
        'success_rate', 
        'error_rate', 
        'max_tps', 
        'total_request', 
        'http_codes', 
        'total_errors', 
        'labels', 
        'values', 
        'request_per_minute'
    ];

    protected $casts = [
        'http_codes' => 'array',
        'total_errors' => 'array',
        'labels' => 'array',
        'values' => 'array',
    ];
}
