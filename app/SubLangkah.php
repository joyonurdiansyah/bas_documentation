<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubLangkah extends Model
{
    protected $table = 'sub_langkah';
    protected $guarded = [];

    public function langkah()
    {
        return $this->belongsTo(Langkah::class, 'id_langkah');
    }
}
