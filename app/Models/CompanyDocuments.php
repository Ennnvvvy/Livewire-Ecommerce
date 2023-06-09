<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDocuments extends Model
{
    use HasFactory;

    protected $table = 'company_documents';

    protected $fillable = [
        'name',
        'filename',
    ];


    public function profile()
    {
        return $this->belongsTo(CompanyProfile::class);
    }
}
