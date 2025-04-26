<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Contact extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'contact_id', 
        'name', 
        'email', 
        'phone', 
        'address',     
        'opportunity', 
    ];

    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'contact_id', 'contact_id');
    }

}
