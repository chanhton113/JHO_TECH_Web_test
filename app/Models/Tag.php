<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class, 'opportunity_tag', 'tag_id', 'opportunitie_id');
    }
}
