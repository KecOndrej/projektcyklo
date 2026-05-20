<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Controller1 extends BaseController
{
    public function index()
    {
        $model = new \App\Models\Rider();
    
        // Nastavení dotazu s joinem, filtrem a řazením
        $model->select('cp_rider.*, cp_location.name as mesto_narodeni')
              ->join('cp_location', 'cp_location.id = cp_rider.place_of_birth', 'left')
              ->where('cp_rider.country', 'fr')
              ->orderBy('cp_rider.first_name', 'ASC')
              ->orderBy('cp_rider.last_name', 'ASC');
    
        // Místo findAll() použijeme paginate s limitem 20 kousků
        $data['jezdci'] = $model->paginate(20); 
        // Do view si přibalíme i samotný odkazovník na stránky
        $data['pager'] = $model->pager;
    
        return view('wiews1', $data);
    }
}
