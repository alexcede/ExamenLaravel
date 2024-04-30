<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Casal extends Model implements Authenticatable
{
    use  HasFactory, AuthenticatableTrait;
    public $timestamps = false;

    protected $table = 'casals';

    protected $fillable = ['nom', 'data_inici', 'data_final', 'n_places', 'id_ciutat'];

    public static function getAllCasals() {
        $casals = Casal::all();

        return $casals;
    }
    public static function deleteCasal($id) {
        $casal = Casal::findOrFail($id);
        $casal->delete();
    }
    public static function getCasal($id) {
        $casal = Casal::findOrFail($id);

        return $casal;
    }
    public function ciutat()
    {
        return $this->belongsTo(Ciutat::class, 'id_ciutat');
    }
    
    public static function updateCasal($casal, $name, $startDate, $endDate, $places, $id_city) {
        $casal->nom = $name;
        $casal->data_inici = $startDate;
        $casal->data_final = $endDate;
        $casal->n_places = $places;
        $casal->id_ciutat = $id_city;
        $casal->save();
    }

    public static function storeCasal(array $data) {
        return self::create($data);
    }
}