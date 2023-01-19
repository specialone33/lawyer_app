<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProceduralProcess extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const FILING_MOTIONS_BEFORE_AFTER_RADIO = [
        '0' => 'Πριν',
        '1' => 'Μετά',
    ];

    public const SERVICE_OF_SUIT_BEFORE_AFTER_RADIO = [
        '0' => 'Πριν',
        '1' => 'Μετά',
    ];

    public const FILING_ADD_SENTENCES_BEFORE_AFTER_RADIO = [
        '0' => 'Πριν',
        '1' => 'Μετά',
    ];

    public const FILING_MOTIONS_TYPE_RADIO = [
        '0' => 'Ημερολογιακές',
        '1' => 'Εργάσιμες',
    ];

    public const SERVICE_OF_SUIT_DAYS_TYPE_RADIO = [
        '0' => 'Ημερολογιακές',
        '1' => 'Εργάσιμες',
    ];

    public const FILING_ADD_SENTENCES_TYPE_RADIO = [
        '0' => 'Ημερολογιακές',
        '1' => 'Εργάσιμες',
    ];

    public $table = 'procedural_processes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'proccess_id',
        'service_of_suit_days',
        'service_of_suit_days_type',
        'service_of_suit_before_after',
        'filing_motions_days',
        'filing_motions_type',
        'filing_motions_before_after',
        'filing_add_sentences_days',
        'filing_add_sentences_type',
        'filing_add_sentences_before_after',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function proccess()
    {
        return $this->belongsTo(Proccess::class, 'proccess_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
