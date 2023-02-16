<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicationplatform extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function application()
    {
        return $this->hasMany(Application::class);
    }
}
