<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
 

public function login()
{
    $model = new UserModel();

    if ($this->request->getMethod(true) === 'POST')
    {
        $user = $model
            ->where('login', $this->request->getPost('login'))
            ->first();

        if ($user && $user['password'] === md5($this->request->getPost('password')))
        {
            session()->set([
                'user' => $user['id'],
                'name' => $user['name'],
                'role' => $user['role']  
            ]);

            return redirect()->to(base_url('gallery'));
        }

        session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');
    }

    return redirect()->to(base_url());
}




    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }


    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod(true) === 'POST') {

            $model = new \App\Models\UserModel();

            $model->save([

                'name' => $this->request->getPost('name'),

                'login' => $this->request->getPost('login'),

                'password' => md5($this->request->getPost('password'))

            ]);

            return redirect()->to(base_url());
        }

        echo view('header');
        echo view('user/register');
        echo view('footer');
    }

        public function index()
{
    if(session()->get('role') !== 'admin'){
        return redirect()->to(site_url('gallery'));
    }

    $model = new UserModel();
    $data['users'] = $model->findAll();

    echo view('header');
    echo view('user/all', $data);
    echo view('footer');
}

public function edit($id)
{
    if(session()->get('role') !== 'admin'){
        return redirect()->to(site_url('gallery'));
    }

    $model = new UserModel();

    if($this->request->getMethod(true) === 'POST'){
        $model->save([
            'id'    => $id,
            'name'  => $this->request->getPost('name'),
            'login' => $this->request->getPost('login'),
        ]);
        return redirect()->to(site_url('user'));
    }

    $data['user'] = $model->find($id);
        echo view('header');
        echo view('user/edit', $data);
        echo view('footer');
    }

    public function delete($id)
    {
        if(session()->get('role') !== 'admin'){
            return redirect()->to(site_url('gallery'));
        }

        $model = new UserModel();
        $model->delete($id);

        return redirect()->to(site_url('user'));
}




}

















































// namespace App\Controllers;

// use App\Models\UserModel;

// class User extends BaseController
//
//     public function index()
//     {
//         $model = new UserModel();
//         $data['users'] = $model->get();

//         echo view('header');
//         echo view('user/all', $data);
//         echo view('footer');
//     }

//     public function delete($id)
//     {
//         $model = new UserModel();
//         $model->delete($id);

//         return redirect()->to(base_url() . '/user');
//     }

//     public function edit($id)
//     {
//         $model = new UserModel();

//         if ($this->request->getMethod(true) === 'POST') {

//             $model->save([
//                 'id' => $id,
//                 'name' => $this->request->getPost('name'),
//                 'login' => $this->request->getPost('login')
//             ]);

//             return redirect()->to(base_url() . '/user');
//         } else {
//             $data['user'] = $model->get($id);

//             echo view('header');
//             echo view('user/edit', $data);
//             echo view('footer');
//         }
//     }
