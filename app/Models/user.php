<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class user extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name','email','password'];
    protected $guarded =['role'];
    protected $hidden =['password'];
    protected $table = 'users';
}