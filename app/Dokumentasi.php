<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $guarded = [];


    public function langkah()
    {
        return $this->hasMany(Langkah::class, 'id_docs');
    }

    public function faq()
    {
        return $this->hasMany(Faq::class, 'id_docs');
    }
}
