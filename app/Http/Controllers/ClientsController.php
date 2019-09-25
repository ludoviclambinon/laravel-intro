<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Entreprise;

class ClientsController extends Controller
{
    public function /*list*/index() {
        $clients = Client::all();
        //VOIR APP/PROVIDERS/CLIENT.PHP
        //Si Client::all(); -> Montre toutes les entrées envoyées
        //where permet de trier dans la bd

        //$entreprises = Entreprise::all();
        //Récupère toutes les infos des entreprises

        //Sur Client, clic droit > importer class > \Client
        return view('clients.index', compact('clients'));
    }

    public function create() {
        $entreprises = Entreprise::all();
        return view('clients.create', compact('entreprises'));
    }

    public function store()
    {
        //On rajoute $data si on écrit nouveau code (VOIR A REMPLACER PLUS BAS) + VOIR Client.php
        $data = request()->validate([
            'name' => 'required|min:3', //Correspond au name du formulaire dans index.blade.php (laravel rules)
            'email' => 'required|email',
            //Si l'on crée plusieurs required, il faut rajouter | afin de les différencier
            'status' => 'required|integer',
            //integer en required car value dans le formulaire
            'entreprise_id' => 'required|integer'
        ]);

        Client::create($data);

        /*A REMPLACER PAR (code au dessus)
        
        $pseudo = request('pseudo');
        $email = request('email');
        $status = request('status');
        
        $client = new Client();
        $client->name = $pseudo;
        $client->email = $email;
        $client->status = $status;
        $client->save();
        
        */

        return back(); //permet de revenir sur la page client

        /*Va récupérer les infos dans index.blade.php afin de post les noms enregistrés. 
        @csrf /!\ pour éviter les failles de sécurité*/
        
        //dd($pseudo); -> Sert à voir la donnée récupée.
    }

    public function show(Client $client)
    {
        //$client = Client::where('id', $client)->firstOrFail(); A AJOUTER SI ON ECRIT function show($client)

        return view('clients.show', compact('client'));
    }
    public function edit(Client $client)
    {
        $entreprises = Entreprise::all();
        return view('clients.edit', compact('client', 'entreprises'));
    }

    public function update(Client $client)
    {
        $data = request()->validate([
            'name' => 'required|min:3', //
            'email' => 'required|email',
            'status' => 'required|integer',
            'entreprise_id' => 'required|integer'
        ]);
        $client->update($data);
        return redirect('clients/' . $client->id);
    }
}

/* Pour créer cette page, il faut ouvrir le terminal et écrire : 

php artisan make:controller ClientsController */
