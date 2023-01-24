<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foldernumber extends Model
{
    use HasFactory;

    public $table = 'foldernumbers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'number',
        'casefile_id',
        'contract_id',
        'companycontract_id',
        'other_cases_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function casefile()
    {
        return $this->belongsTo(CaseFile::class, 'casefile_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function companycontract()
    {
        return $this->belongsTo(CompanyContract::class, 'companycontract_id');
    }

    public function other_cases()
    {
        return $this->belongsTo(OtherCase::class, 'other_cases_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
