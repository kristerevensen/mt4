<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Jetstream\Team;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'website_categories',
        'owner_id',
        'updated_at',
        'created_at',
        'access',
        'team_id',
        'project_code',
    ];
    public function index() {

    }
    public function scopeSearch($query,$value){
        $query->where('domain', 'like', "%{$value}%")
        ->orWhere('name', 'like', "%{$value}%")
        ->orWhere('description', 'like', "%{$value}%");

    }

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }
     // Relationship with Team
     public function team()
     {
         return $this->belongsTo(Team::class, 'team_id');
     }

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->prosjekt_id = Str::random(8); // Genererer en 8-tegns lang ID
        });
    }
}
