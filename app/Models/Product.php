<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    // protected $table = 'prods';
    use SoftDeletes;

    protected $fillable = ['code', 'category_id', 'name', 'description', 'image', 'price', 'new', 'hit', 'recommend', 'count'];

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }
    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }
    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }
    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
    }
    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
        // dd($this);
    }
    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
        // dd($value);
    }
    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
        // dd($value);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function isAvailable()
    {
        return !$this->trashed() && $this->count > 0;
    }
    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }
    public function isHit()
    {
        return $this->hit === 1;
    }
    public function isNew()
    {
        return $this->new === 1;
    }
    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
