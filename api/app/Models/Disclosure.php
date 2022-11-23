<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class Disclosure extends Model
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
        'name',
        'image',
        'about',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected $date = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
