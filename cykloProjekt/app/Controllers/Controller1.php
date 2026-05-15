<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Controller1 extends BaseController
{
    public function index()
    {
        $model = new \App\Models\Rider();
        
        // Tohle vytáhne všechno z databáze
        $data['jezdci'] = $model->findAll(); 
    
        // Pořád posíláme stejnou proměnnou do stejného view
        return view('wiews1', $data);
    }
}
