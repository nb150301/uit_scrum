<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $id = 'id';
    protected $fillable = [
        'name',
        'password',
        'manager_id',
        'role',
    ];

    public function forms() {
        return $this->hasMany(LeavingRequest::class, 'sender_id');
    }

    public function managerForms() {
        return $this->hasMany(LeavingRequest::class, 'manager_id');
    }

    public function manager() {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
}
