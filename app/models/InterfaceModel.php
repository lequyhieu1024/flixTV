<?php

namespace App\Models;

interface InterfaceModel
{
    public function list();
    public function detail($id);
    public function add($data);
    public function edit($id, $data);
    public function delete($id);
}
