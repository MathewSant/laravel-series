<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    

    public function seasons(){
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted()
    {
      self::addGlobalScope('ordered', function($builder){
        $builder->orderBy('nome', 'asc');   
      });
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }
}
