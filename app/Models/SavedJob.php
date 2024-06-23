<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SavedJob extends Model
{
    use HasFactory;
    protected $table = 'saved_jobs'; // Ensure this matches your actual table name
    public function job(){
        return $this->belongsTo(Job::class);
    }
}
