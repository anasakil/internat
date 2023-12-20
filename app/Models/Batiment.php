<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    protected $table = 'batiments'; // Make sure this matches your actual table name

    protected $fillable = ['id', 'nom']; // Specify the fields that can be mass-assigned

    // Define the one-to-many relationship to chambres
    public function chambres()
    {
        return $this->hasMany(Chambre::class, 'batiment_id');
    }
}
