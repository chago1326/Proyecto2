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
        // $user = $_SESSION['user'];
        // if (!$user) {
        // header('Location: login.php');
        // }


        //     }
        // /** actualiza los datos de la tabla del id enviado */
        // if (isset($_POST["save"])){
        //     $id = $_GET["id"];
        //     $name = $_POST["nameNewsSource"];
        //     $category = $_POST["categoryNewsSource"];
        //     $query = "UPDATE newssources SET nameSource = \"$name\" ,  categorySource = \"$category\" WHERE id=$id";
        //     $result = mysqli_query(credentials(),$query);
        //     header('Location: newSources.php');
        // }


        // $query = "SELECT * FROM categories";
        // $excutingQuery = mysqli_query(credentials(),$query);
        // while ($row = mysqli_fetch_array($excutingQuery)){
        // $category = $row ["category"];
        //     echo "<option value=\"$category\">$category</option>";
        // }

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
     * Esta funcion guarda y actuliza.
     */
    public function save()
    {
        $newsModel = new \App\Models\NewsSource();
        $id = $this->request->getVar('id');
        if ($id) { //edit
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