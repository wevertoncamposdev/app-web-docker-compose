<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class Location extends Model
{
    use HasFactory;
    use Uuid;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'zip_code',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state'
    ];

    protected $date = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
