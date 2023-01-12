<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        "birthdate",
        'civil_status', 
        "birthplace",
        "street",
        "barangay",
        "city",
        "province",
        "zip",
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function getFullAddressAttribute()
    {
        return "{$this->street}, {$this->barangay}, {$this->city}, {$this->province}, {$this->zip}";
    }
}
