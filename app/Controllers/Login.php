<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        echo view('component/header');
        return view('signin');
    }

    public function loginAuth()
    {
        $session = session();

        $userModel = new UserModel();

        $user_username = $this->request->getvar('user_username');
        $user_password = $this->request->getvar('user_password');

        $data = $userModel->where('user_username', $user_username)->first();

        if ($data) {
            $pass = $data['user_password'];
            if ($user_password == $pass) {
                $ses_data = [
                    'user_firstname' => $data['user_firstname'],
                    'user_lastname' => $data['user_lastname'],
                    'user_username' => $data['user_username'],
                    'user_role' => $data['user_role'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                $role = $_SESSION['user_role'];

                if ($role == "0") {
                    $session->setFlashdata('successLogin', 'เข้าสู่ระบบ');
                    return redirect()->to('/home');
                } else if ($role == "1") {
                    $session->setFlashdata('successLogin', 'เข้าสู่ระบบ');
                    return redirect()->to('/dashboard');
                } else {
                    $session->setFlashdata('fail', 'Username ปิดใช้งาน');
                    return redirect()->to('/signin');
                }
            } else {
                $session->setFlashdata('fail', 'Passwordไม่ถูกต้อง.');
                return redirect()->to('/signin');
            }
        } else {
            $session->setFlashdata('fail', 'Username ไม่ถูกต้อง.');
            return redirect()->to('/signin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        if ($session->destroy = TRUE) {
            $session = session();
            return redirect()->to('/logout_message');
        }
    }
    public function logout_message()
    {
        $session = session();
        $session->setFlashdata('success', 'ออกจากระบบ');
        return redirect()->to('/signin');
    }
}
