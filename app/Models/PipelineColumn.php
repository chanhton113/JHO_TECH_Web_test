<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelineColumn extends Model
{
    use HasFactory;

    protected $fillable = ['pipeline_id', 'name', 'order'];

    // Mối quan hệ ngược lại với Pipeline
    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class);
    }
}
