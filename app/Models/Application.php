<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function applicationplatform()
    {
        return $this->belongsTo(Applicationplatform::class);
    }
    public function applicationdocument()
    {
        return $this->hasMany(Applicationdocument::class);
    }
    public function survey()
    {
        return $this->hasMany(Survey::class);
    }
    public function batch()
    {
        return $this->hasMany(Batch::class);
    }
}
