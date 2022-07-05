<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendataanip extends Model
{
    use HasFactory;

    protected $table = 'pendataan';
    protected $primaryKey = 'id';
    protected $fillable = ['user_name', 'computer_name', 'ip_address', 'ram', 'os', 'division', 'img_path'];
}
