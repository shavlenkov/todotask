<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'surname', 'login', 'password'
    ];

    public function getId() {
        return $this->id;
    }

    public function getNameAndSurname() {
        return $this->name." ".$this->surname;
    }
}
