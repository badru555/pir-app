<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function applicationdocument()
    {
        return $this->hasOne(Applicationdocument::class);
    }
}
