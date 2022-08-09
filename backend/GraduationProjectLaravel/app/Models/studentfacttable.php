<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class studentfacttable extends Model
{
    use HasFactory,Notifiable;
//    protected $table='studentfacttables';
    protected $fillable = [
        'DoctorID','CourseID','TaScore'
    ];
}
