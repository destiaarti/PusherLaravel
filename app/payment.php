<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class payment extends Model
{use Notifiable;
    protected $table="payments";
    protected $fillable = ["payment_name"];
}
