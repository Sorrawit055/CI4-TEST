<?php

namespace App\Controllers;

use App\Models\WorkModel;

class Admin extends BaseController
{
    public function index()
    {
        echo view('component/header');
        $WorkModel = new WorkModel();
        $status = ['1'];
        $data['work'] = $WorkModel->whereIn('work_status', $status, 'ASC')->findAll();

        return view('admin/dashboard',$data);
    }
    public function InsertWork()
    {
        $WorkModel = new WorkModel();
        $data = [
            'work_name' => $this->request->getVar('work_name'),
            'work_information' => $this->request->getVar('work_information'),
            'work_address' => $this->request->getVar('work_address'),
            'work_phone' => $this->request->getVar('work_phone'),
            'work_created_at' => $this->request->getVar('work_created_at'),
            'work_status' => $this->request->getVar('work_status'),
        ];
        $checkWorkid = $WorkModel->where('work_id ', $data['work_id'])->first();
        if ($checkWorkid === NULL) {
            $WorkModel->insert($data);
            return redirect()->to('/dashboard')->with('success', ' เพิ่มงานเสร็จสิ้น');
        } else {
            return redirect()->to('/dashboard')->with('fail', 'ไอดีงานซํ้ากรุณาลองใหม่');
        }
    }

    public function deleteWork($id = null)
    {
        $WorkModel = new WorkModel();
        $Accept = $WorkModel->set('work_status', '0')->where('work_id', $id)->update($id);
        if ($Accept === TRUE) {
            return redirect()->to('/dashboard')->with('success', 'ลบงานเรียบร้อย');
        }
    }

    public function editWork($id = null)
    {
        echo view('component/header');
        $WorkModel = new WorkModel();
        $data['work'] = $WorkModel->where('work_id', $id)->first();
        return view('admin/editwork', $data);
    }

    public function updateWork($id)
    {
        $WorkModel = new WorkModel();
        $data = [
            'work_name' => $this->request->getVar('work_name'),
            'work_information' => $this->request->getVar('work_information'),
            'work_address' => $this->request->getVar('work_address'),
            'work_phone' => $this->request->getVar('work_phone'),
            'work_created_at' => $this->request->getVar('work_created_at'),
            'work_status' => $this->request->getVar('work_status'),
        ];

        $WorkModel->update($id, $data);
        return redirect()->to('/dashboard')->with('success', 'แก้ไขข้อมูลเสร็จสิ้น');
    }

}
