<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        "payment_date",
        "loan_cycle",
        "instance",
        "mfo_name",
        "member_name",
        "payment_amount",
        "cbu_debit",
        "lcbu_debit",
        "cbu_credit",
        "lcbu_credit",
        'user_id',
        'financing_agreement_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function financing_agreement()
    {
        return $this->belongsTo(FinancingAgreement::class);
    }
}
