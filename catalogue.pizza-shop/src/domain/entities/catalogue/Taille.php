<?php

namespace pizzashop\catalogue\domain\entities\catalogue;

use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{

    const NORMALE = 1;
    const GRANDE = 2;
	
    protected $connection = 'catalogue';
    protected $table = 'taille';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [ 'libelle'];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'tarif', 'taille_id', 'produit_id');
    }

}