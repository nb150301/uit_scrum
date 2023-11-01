<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeavingRequest extends Model
{
    protected $table = 'request_form';

    protected $id = 'id';
    protected $fillable = [
        'sender_id',
        'start_date',
        'end_date',
        'reason',
        'status',
        'created_at',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'sender_id');
    }
}
