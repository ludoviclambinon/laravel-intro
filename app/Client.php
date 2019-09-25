<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //VOIR APP/CONTROLLERS/CLIENTSCONTROLLER.PHP

    //Ligne protected à rajouter si on passe à la méthode $data (voir clientcontroller.php)
    /*protected $fillable = ['name', 'email', 'status']; REMPLACE PAR GUARDED*/
    protected $guarded = [];

    public function scopeStatus($query) {
        return $query->where('status', 1)->get();

        // scopeStatus(toujours écrire scope avant) car la fonction est appelée Client::status dans ClientController.php
    }

    public function entreprise()
    {
        return $this->belongsTo('App\Entreprise'); //Récupère les entreprises du client
    }
    
    public function getStatusAttribute($attributes)
    {
        return [
            '0' => 'Inactif',
            '1' => 'Actif'
        ][$attributes];
    }
}

