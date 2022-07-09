<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function race()
    {
        return $this->hasOne(Race::class, 'id', 'race_id');
    }

    public function ethnicity()
    {
        return $this->hasOne(Ethnicity::class, 'id', 'ethnicity_id');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->diff(Carbon::now())->y;
    }

    public function getSymptomDetailsAttribute()
    {
        $symptom_ids = explode(',', $this->symptoms);
        return Symptom::whereIn('id', $symptom_ids)->get();
    }
}
