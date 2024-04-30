<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Ciutat extends Model implements Authenticatable
{
    use  HasFactory, AuthenticatableTrait;
    public $timestamps = false;

    protected $table = 'ciutats';

    protected $fillable = ['nom', 'n_habitants'];

    public function casals()
    {
        return $this->hasMany(Casal::class, 'id_ciutat');
    }
    public static function getCiutats() {
        $ciutats = Ciutat::all();

        return $ciutats;
    }
}