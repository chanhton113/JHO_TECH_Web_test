<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Opportunity extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'opportunitie_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'opportunitie_id',
        'phase',
        'organisation',
        'contact_id',
        'name',
        'value',
        'closing_date',
        'created_by',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'opportunity_tag', 'opportunitie_id', 'tag_id');
    }
}
