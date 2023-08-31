<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $guarded = [];

    public function dokumentasi()
    {
        return $this->belongsTo(Dokumentasi::class, 'id_docs');
    }
}
