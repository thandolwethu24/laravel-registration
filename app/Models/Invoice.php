<?php

namespace App\Models;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    public $timestamps = true;

    protected $casts = [
        'amount' => 'float'
    ];

    protected $guarded = [];


}
