<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Website extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
