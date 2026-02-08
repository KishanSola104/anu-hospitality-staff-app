<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{

    protected $table = 'contact_messages';


    protected $fillable = [
        'company_name',
        'applicant_name',
        'email',
        'mobile',
        'subject',
        'message',
    ];
}
