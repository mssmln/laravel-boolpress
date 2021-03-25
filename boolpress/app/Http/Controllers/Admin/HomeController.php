<?php
/*Preparare le sezioni admin e gest del nostro progetto laravel-boolpress, così come visto a lezione.
Migrate la tabella users e provate la registrazione ed il login.
Create poi la taballa posts e i seeders.N.B. Se vi dovesse succedere il problema dell'out of memory potete provare con php artisan cache:clear,
così svuota la memoria cache! Appuntiamo anche questo :sweat_smile:*/

/* 2 milestone:     Create la relazione tra le tabelle users e posts e la relazione anche tra model.
    Popolate la tabella posts con i seeder.
    Create il controller PostController per la visualizzazione dei post e dei dettagli, per ora solo lato guest.
    Personalizzate le views.*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
}
