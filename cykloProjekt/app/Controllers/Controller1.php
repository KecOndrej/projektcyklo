<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Controller1 extends BaseController
{
    public function index()
    {
        $model = new \App\Models\Rider();
        $model->select('cp_rider.*, cp_location.name as mesto_narodeni')
              ->join('cp_location', 'cp_location.id = cp_rider.place_of_birth', 'left')
              ->where('cp_rider.country', 'fr')
              ->orderBy('cp_rider.first_name', 'ASC')
              ->orderBy('cp_rider.last_name', 'ASC');

        $data['jezdci'] = $model->paginate(20);
        $data['pager'] = $model->pager;

        return view('wiews1', $data);
    }

    public function misto($id)
    {
        $model = new \App\Models\Rider();
        $model->select('cp_rider.*, cp_location.name as mesto_narodeni')
              ->join('cp_location', 'cp_location.id = cp_rider.place_of_birth', 'left')
              ->where('cp_rider.place_of_birth', $id)
              ->orderBy('cp_rider.first_name', 'ASC')
              ->orderBy('cp_rider.last_name', 'ASC');

        $data['jezdci'] = $model->paginate(20);
        $data['pager'] = $model->pager;

        return view('wiews2', $data);
    }

    public function novy()
    {
        $db = \Config\Database::connect();
        $data['lokace'] = $db->table('cp_location')->orderBy('name', 'ASC')->get()->getResultArray();

        return view('wiews3', $data);
    }

    public function ulozit()
    {
        $request = \Config\Services::request();
        $firstName = $request->getPost('first_name');
        $lastName = $request->getPost('last_name');
        
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $firstName . '-' . $lastName)));
        $link = "rider/" . $slug;

        $photoName = null;
        $file = $request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $photoName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $photoName);
        }

        $insertData = [
            'first_name'     => $firstName,
            'last_name'      => $lastName,
            'country'        => strtolower($request->getPost('country')),
            'date_of_birth'  => $request->getPost('date_of_birth') ?: null,
            'place_of_birth' => $request->getPost('place_of_birth') ?: null,
            'photo'          => $photoName ? 'uploads/' . $photoName : null,
            'weight'         => $request->getPost('weight') ?: 0,
            'height'         => $request->getPost('height') ?: 0,
            'link'           => $link,
            'in_results'     => 1
        ];

        $db = \Config\Database::connect();
        $db->table('cp_rider')->insert($insertData);

        return redirect()->to(base_url('index.php/controller1/vsechny'));
    }

    // Zobrazení VŠECH závodníků v administrační tabulce s tlačítky Upravit
    public function vsechny()
    {
        $model = new \App\Models\Rider();
        $model->select('cp_rider.*, cp_location.name as mesto_narodeni')
              ->join('cp_location', 'cp_location.id = cp_rider.place_of_birth', 'left')
              ->orderBy('cp_rider.id', 'DESC'); // Nejnovější nahoře

        $data['jezdci'] = $model->paginate(30);
        $data['pager'] = $model->pager;

        return view('wiews_seznam', $data);
    }

    // Načtení editačního formuláře s daty konkrétního jezdce
    public function editovat($id)
    {
        $db = \Config\Database::connect();
        $data['jezdec'] = $db->table('cp_rider')->where('id', $id)->get()->getRowArray();
        $data['lokace'] = $db->table('cp_location')->orderBy('name', 'ASC')->get()->getResultArray();

        if (empty($data['jezdec'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Jezdec s ID $id neexistuje.");
        }

        return view('wiews_edit', $data);
    }

    // Zpracování úpravy a uložení do DB (SQL UPDATE)
    public function aktualizovat($id)
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect();

        $firstName = $request->getPost('first_name');
        $lastName = $request->getPost('last_name');
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $firstName . '-' . $lastName)));

        $updateData = [
            'first_name'     => $firstName,
            'last_name'      => $lastName,
            'country'        => strtolower($request->getPost('country')),
            'date_of_birth'  => $request->getPost('date_of_birth') ?: null,
            'place_of_birth' => $request->getPost('place_of_birth') ?: null,
            'weight'         => $request->getPost('weight') ?: 0,
            'height'         => $request->getPost('height') ?: 0,
            'link'           => "rider/" . $slug,
        ];

        // Pokud byla nahrána nová fotka, aktualizujeme ji
        $file = $request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $photoName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $photoName);
            $updateData['photo'] = 'uploads/' . $photoName;
        }

        $db->table('cp_rider')->where('id', $id)->update($updateData);

        return redirect()->to(base_url('index.php/controller1/vsechny'));
    }
    
}