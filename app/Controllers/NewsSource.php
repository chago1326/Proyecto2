<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NewsSource extends BaseController
{
    public function index()
    {
        $newsModel = new \App\Models\NewsSource();
        $news = $newsModel->findAll();
        $data['pageTitle'] = 'News Index';
        $data['showLogo'] = true;
        $data['newssources'] = $news;
        $content = view('newssources/index', $data);
        return parent::renderTemplate($content, $data);
    }

    public function new()
    {
      $data['pageTitle'] = 'News Source Create';
      $data['showLogo'] = false;
      $content = view('newssources/new');
      return parent::renderTemplate($content, $data);
    }

    public function edit($id)
    {
    
        $newsModel = new \App\Models\NewsSource();
        $newsSource = $newsModel->find($id);

        $data['pageTitle'] = 'News Source Edit';
        $data['showLogo'] = false;
        $data['categories'] = [];
        $data['newssource'] = $newsSource;
        $content = view('newssources/edit', $data);
        return parent::renderTemplate($content, $data);
    }

    /**
     * Actualiza y inserta en la base de datos
     */
    public function save()
    {
        $newsModel = new \App\Models\NewsSource();
        $id = $this->request->getVar('id');
        if ($id) { //Condicion para  actulizar 
            $data = [
                'id' => $id,
                'title' => $this->request->getVar('title'),
                'url'    => $this->request->getVar('url')
            ];
        } else {
            $data = [
                'title' => $this->request->getVar('title'),
                'url'    => $this->request->getVar('url'),
            ];
        }
        $newsModel->save($data);
        return redirect()->to('/newssource');
    }
}