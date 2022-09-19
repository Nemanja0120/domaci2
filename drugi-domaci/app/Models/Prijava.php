<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prijava extends Model
{
    protected $table = "prijava";
    protected $guarded = [];
    public $timestamps = false;

    public function termin()
    {
        return $this->belongsTo('App\Models\Termin', 'termin_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
