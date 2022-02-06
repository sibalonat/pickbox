<?php

namespace App\Models;

// use App\Models\Obj;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use App\Models\Traits\RelatesToTeams;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Obj extends Model
{
    use HasFactory, RelatesToTeams, HasRecursiveRelationships, Searchable;

    public $asYouType = true;

    public $table = 'objects';

    protected $fillable = ['parent_id'];

    public static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Str::uuid();
        });
        static::deleting(function($model) {
            optional($model->objectable)->delete();
            $model->descendants->each->delete();
        });
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'team_id' => $this->team_id,
            'name' => $this->objectable->name,
            'path' => $this->ancestorsAndSelf->pluck('objectable.name')->reverse()->join('/')
        ];
    }


    public function objectable()
    {
        return $this->morphTo();
    }

}
