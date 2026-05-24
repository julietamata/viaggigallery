<?php

namespace App\Controllers;

use App\Models\PublicationModel;

class Publication extends BaseController
{
    public function index()
    {
        $model = new PublicationModel();
        $data['posts'] = $model->show();

        echo view('header');
        echo view('publication/all', $data);
        echo view('footer');
    }

    
public function add()
{
    helper(['form']);

    $model = new PublicationModel();

    if ($this->request->getMethod(true) === 'POST') {

        if ($this->validate([
            'content' => 'required'
        ])) {

            $model->save([
                'content' => trim($this->request->getPost('content')),
                'user' => session()->get('user')
            ]);
        }
    }

    return redirect()->to(site_url('publication'));
}



public function edit($id)
{
    $model = new PublicationModel();

    if ($this->request->getMethod(true) === 'POST') {

        $model->save([
            'id' => $id,
            'content' => $this->request->getPost('content')
        ]);

        return redirect()->to(site_url('publication'));
    }
    else {
        $data['post'] = $model->get($id);
        echo view('header');
        echo view('publication/edit', $data);
        echo view('footer');
    }
}




    public function delete($id)
    {
        $model = new PublicationModel();
        $model->delete($id);

        return redirect()->to(site_url('publication'));
    }
}