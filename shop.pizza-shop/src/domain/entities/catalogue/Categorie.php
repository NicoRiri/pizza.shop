<?php

namespace pizzashop\shop\domain\entities\catalogue;

class Categorie extends \Illuminate\Database\Eloquent\Model
{

    protected $connection = 'catalogue';
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [ 'libelle'];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'categorie_id');
    }

}