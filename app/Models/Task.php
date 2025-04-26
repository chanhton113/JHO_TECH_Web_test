<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_id','title', 'start_date', 'user_id', 'status', 'end_date', 'contact_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'contact_id');
    }
}
