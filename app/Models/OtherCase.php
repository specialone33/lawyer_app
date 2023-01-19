<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherCase extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'other_cases';

    protected $dates = [
        'registration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_file_number',
        'registration_date',
        'case_type_id',
        'case_description',
        'user_id',
        'opponent',
        'lawyer_id',
        'comments',
        'charging_expenses',
        'hours',
        'hourly_rate',
        'one_time_fees_id',
        'custom_one_time_fee_name',
        'custom_one_time_fee_value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRegistrationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRegistrationDateAttribute($value)
    {
        $this->attributes['registration_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function case_type()
    {
        return $this->belongsTo(OtherCaseType::class, 'case_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id');
    }

    public function one_time_fees()
    {
        return $this->belongsTo(OneTimeFee::class, 'one_time_fees_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
