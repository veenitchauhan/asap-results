<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCollection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function test_type()
    {
        return $this->hasOne(TestType::class, 'id', 'test_type_id');
    }
}
