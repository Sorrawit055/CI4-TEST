<?php

namespace App\Controllers;

use App\Models\WorkModel;

class User extends BaseController
{
    public function index()
    {
        echo view('component/header');
        $WorkModel = new WorkModel();
        $request = service('request');
        $searchData = $request->getGet();

        $search = "";
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }
        if ($search == '') {
            $paginateData = $WorkModel->paginate(6);
        } else {
            $paginateData = $WorkModel->select('*')
                ->orLike('work_name', $search)
                ->orLike('work_information', $search)
                ->paginate(6);
        }
        $data = [
            'work' => $paginateData,
            'pager' => $WorkModel->pager,
            'search' => $search
        ];
        return view('user/home',$data);
    }
    public function searchDataWork($search = Null)
    {
        echo view('component/header');
        $WorkModel = new WorkModel();
        $request = service('request');
        $searchData = $request->getGet();

        $search = "";
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }
        if ($search == '') {
            $paginateData = $WorkModel->paginate(6);
        } else {
            $paginateData = $WorkModel->select('*')
                ->orLike('work_name', $search)
                ->paginate(6);
        }
        $data = [
            'workdata' => $paginateData,
            'pager' => $WorkModel->pager,
            'search' => $search
        ];
        return view('user/home', $data);
    }

    public function workDetail($id = null)
    {
        echo view('component/header');
        $WorkModel = new WorkModel();
        $data['work'] = $WorkModel->where('work_id', $id)->first();
        return view('user/workdetail', $data);
    }
}
