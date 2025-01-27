<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use function Pest\Laravel\json;
use function PHPUnit\Framework\isArray;
use function PHPUnit\Framework\isJson;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'article',
        'name',
        'status',
        'data',
    ];

    protected $casts = [
        'data' => 'json',
    ];

    public function scopeAvaileble(Builder $query): void
    {
        $query->where('status', 'available');
    }

    /*
     * Изменение статуса товара для отображения на форме
     */
    public function getStatusAttribute(): string {
        $this->attributes['status'] == 'available' ? $result = "Доступен" : $result ='Недоступен';
        return $result;
    }

    /*
     * Изменение статуса товара для добавление в БД
     * @param $incomingValue
     */
    public function setStatusAttribute($incomingValue): void {
        $incomingValue == 'Доступен' ? $this->attributes['status'] = 'available' : $this->attributes['status'] ='unavailable';
    }
    /*
     * получение атрибутов с формы для добавления в БД
     */
    public function setDataAttribute($incomArray): void
    {
        $this->attributes['data'] = json_encode($incomArray);
    }

    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }

}
