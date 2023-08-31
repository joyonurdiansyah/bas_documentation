<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langkah extends Model
{
    protected $table = 'langkah';
    protected $guarded = [];

    public function dokumentasi()
    {
        return $this->belongsTo(Dokumentasi::class, 'id_docs');
    }

    public function subLangkah()
    {
        return $this->hasMany(SubLangkah::class, 'id_langkah');
    }
}
