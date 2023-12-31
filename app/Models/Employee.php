<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function teams(){
        return $this->belongsToMany(Team::class,'team_employees','employee_id','team_id');
    }
}