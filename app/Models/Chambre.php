<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = ['numbre', 'gender', 'capacity', 'batiment_id'];


   // Chamber.php

public function acceptStudents()
{
    return $this->hasMany(AcceptStudent::class, 'chambre_id', 'id');
}
public function batiment()
{
    return $this->belongsTo(Batiment::class, 'batiment_id', 'id');
}

}
