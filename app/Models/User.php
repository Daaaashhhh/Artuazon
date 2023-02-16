<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;;

class User extends Authenticatable
{
    use HasFactory;

    protected $table ='table_users';
    protected $primaryKey = 'user_id';
    
    protected $fillable=['name', 'username', 'password'];

    
    public function student()
{
    return $this->hasMany(Student::class);
}
}