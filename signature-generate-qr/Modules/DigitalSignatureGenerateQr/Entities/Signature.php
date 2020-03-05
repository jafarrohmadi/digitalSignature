<?php

namespace Modules\DigitalSignatureGenerateQr\Entities;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'model_type',
        'model_id',
        'signature',
        'user_id',
        'status',
    ];
}
