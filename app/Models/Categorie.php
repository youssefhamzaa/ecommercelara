<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        'nomcategorie',
        'imagecategorie'
    ];
    public function categories()
    {
        return $this->hasMany(Scategorie::class ,"categorieID");
    }
}
