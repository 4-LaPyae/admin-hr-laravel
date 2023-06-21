<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employees(){
        return $this->belongsToMany(Employee::class,'team_employees','team_id','employee_id');
    }
    public function projects(){
        return $this->belongsToMany(Project::class,'project_teams','team_id','project_id');
    }
}