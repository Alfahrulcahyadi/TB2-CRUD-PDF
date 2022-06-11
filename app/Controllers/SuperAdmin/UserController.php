<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use phpDocumentor\Reflection\Types\This;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->getUser();

        $data = [
            'title' => 'User Data',
            'users' => $users,
        ];

        return view("super_admin/users/index", $data);
    }

    public function create()
    {
        return view("super_admin/users/create");
    }

    public function store()
    {
        $role = $this->request->getPost('role');
        $this->userModel->insert([
            'email' => $this->request->getPost('email'),
            'code_member' => $this->userModel->getCodeMember($role),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'telephone' => $this->request->getPost('telephone'),
            'address' => $this->request->getPost('address'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect('super_admin/users')->with('success', 'Data Added Successfully');
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $this->userModel->update($id, [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'telephone' => $this->request->getPost('telephone'),
            'address' => $this->request->getPost('address'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect('super_admin/users')->with('success', 'Data Update Successfully');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');

        $this->userModel->delete($id);

        return redirect('super_admin/users')->with('success', 'Data Deleted Successfully');
    }
}
