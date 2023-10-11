<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UmkmModel;
use CodeIgniter\RESTful\ResourceController;

class Umkms extends BaseController
{

    use \CodeIgniter\API\ResponseTrait;

    public function index()
    {
        //
        $umkms = new UmkmModel;

        $data = $umkms->findAll();

        return $this->respond($data);
    }

    public function show($id)
    {

        $umkms = new UmkmModel;
        $umkm = $umkms->find($id);

        return $this->respond($umkm);
    }

    public function create()
    {

        $data = $this->request->getPost();
        $umkm = new UmkmModel;
        $id = $umkm->insert($data);

        if ($umkm->errors()) {

            return $this->fail($umkm->errors());
        }

        if ($id === false) {

            return $this->failServerError();
        }

        $umkms = $umkm->getWhere(['id' => $id])->getResult();
        return $this->respondCreated($umkms);
    }

    public function update($id)
    {
        $data = $this->request->getRawInput();
        $umkm = new UmkmModel;
        $id = $umkm->update($id, $data);

        if ($umkm->errors()) {

            return $this->fail($umkm->errors());
        }

        if ($id === false) {

            return $this->failServerError();
        }

        $umkms = $umkm->getWhere(['id' => $id])->getResult();
        return $this->respondUpdated($umkms);
    }

    public function delete($id)
    {
        $umkm = new UmkmModel;
        $deleted = $umkm->delete($id);

        return $this->respondUpdated($deleted);
    }
}
