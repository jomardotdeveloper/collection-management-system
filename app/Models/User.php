<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'role',
        'email',
        'password',
        'contact_no',
        'position'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, "user_id");
    }

    public function financing_agreements()
    {
        return $this->hasMany(FinancingAgreement::class, "user_id");
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, "user_id");
    }

    public function getFullNameAttribute()
    {
        if ($this->middle_name) {
            return "$this->first_name $this->middle_name $this->last_name";
        } else if ($this->middle_name && $this->name_extension) {
            return "$this->first_name $this->middle_name $this->last_name $this->name_extension";
        }
        return "$this->first_name $this->last_name";
    }
    

    public function getTokenAttribute(){
        $id = strval($this->id);
        return "MAG" . str_pad($id, 4, "0", STR_PAD_LEFT);
    }

    public function getCbuBalanceAttribute()
    {
        $cbu_debit = 0;
        $cbu_credit = 0;
        foreach ($this->payments as $payment) {
            $cbu_debit += $payment->cbu_debit;
        }
        foreach ($this->payments as $payment) {
            $cbu_credit += $payment->cbu_credit;
        }

        // dd($this->financing_agreements);
        return $cbu_debit - $cbu_credit;
    }
    public function getLcbuBalanceAttribute()
    {
        $lcbu_debit = 0;
        $lcbu_credit = 0;
        foreach ($this->payments as $payment) {
            $lcbu_debit += $payment->lcbu_debit;
        }
        foreach ($this->payments as $payment) {
            $lcbu_credit += $payment->lcbu_credit;
        }
        return $lcbu_debit - $lcbu_credit;
    }

    public function getActiveFinancingAgreementsAttribute()
    {
        $active = [];
        foreach ($this->financing_agreements as $financing_agreement) {
            if ($financing_agreement->is_active) {
                array_push($active, $financing_agreement);
            }
        }
        return $active;
    }
    

}
