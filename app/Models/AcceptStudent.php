<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptStudent extends Model
{
    use HasFactory;
    protected $table = 'accept_student';



    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cne',
        'cni',

        'chambre_id',         // If 'chambre_id' is a foreign key, include it in the fillable array
    ];


 
    public function chamber()
{
    return $this->belongsTo(Chambre::class, 'chambre_id', 'id');
}



    // Add any relationships or additional methods here
}
