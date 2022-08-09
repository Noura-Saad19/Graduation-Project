<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class exam extends Model
{
    use HasFactory, Notifiable;

//    protected $connection = 'sqlsrv2';
//    protected $table='doctors';
    protected $fillable = [
        'examID','ExamLevel','ExamType'
    ];
}
