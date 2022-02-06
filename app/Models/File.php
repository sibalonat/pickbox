<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'path'
    ];


    public function sizeForHumans()
    {
        $bytes = $this->size;

        $units = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];

        for ($i=0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        // return  $i;

        return round($bytes, 2) . $units[$i];
    }

    public static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Str::uuid();
        });

        static::deleting(function($model) {
            Storage::disk('local')->delete($model->path);
        });
    }
}
