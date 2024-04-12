<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'color'];

    public function project() {
        return $this->hasMany(Project::class);
    }

    public function getBadge() {
        return "<strong class='badge' style='background-color: {$this->color}'>$this->label</strong>";
      }
}