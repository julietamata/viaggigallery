<?php

namespace App\Controllers;

use App\Models\ImageModel;

class ImageController extends BaseController
{
    public function index()
    {
        if(!session()->get('user')){
            return redirect()->to(base_url());
        }

        $model = new ImageModel();

        $user = session()->get('user');

        // $data['images'] = $model
        //     ->where('user', $user)
        //     ->orderBy('created_at', 'DESC')
        //     ->findAll();

        $order = $this->request->getGet('order');

        $query = $model->where('user', $user);

        switch($order){

            case 'old':
                $query->orderBy('created_at', 'ASC');
                break;

            case 'name_asc':
                $query->orderBy('file_name', 'ASC');
                break;

            case 'name_desc':
                $query->orderBy('file_name', 'DESC');
                break;

            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $data['images'] = $query->findAll();
        $data['order'] = $order;


        return view('gallery', $data);
    }

     public function upload()
    {
    if(!session()->get('user')){
        return redirect()->to(base_url());
    }

    helper(['form']);

    if ($this->request->getMethod(true) === 'POST') {

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();

            $file->move(FCPATH . 'uploads', $newName);

            $model = new ImageModel();

            $model->save([
                'user' => session()->get('user'),
                'file_name' => $newName
            ]);
        }
    }

    return redirect()->to(site_url('gallery'));
}


    public function delete($id)
    {
        $model = new ImageModel();

        $image = $model->find($id);

        if (!$image) {
            return redirect()->to(session()->get('role') === 'admin' 
            ? site_url('admin/gallery') 
            : site_url('gallery'));
        }
        if ($image['user'] != session()->get('user') && session()->get('role') !== 'admin') {
            return redirect()->to(session()->get('role') === 'admin' 
            ? site_url('admin/gallery') 
            : site_url('gallery'));
}

        $path = FCPATH . 'uploads/' . $image['file_name'];

        if (file_exists($path)) {
            unlink($path);
        }

        $model->delete($id);

            return redirect()->to(session()->get('role') === 'admin' 
            ? site_url('admin/gallery') 
            : site_url('gallery'));
    }


    public function admin()
        {
            if(session()->get('role') !== 'admin'){
                return redirect()->to(site_url('gallery'));
            }

            $model = new ImageModel();
            $data['images'] = $model->getAllWithUsers();

            return view('admin/gallery', $data);
        }



}