<?php

namespace App\Controllers;

interface InterfaceController
{
    public function index();
    public function create();
    public function store();
    public function edit($id);
    public function update($id);
    public function destroy($id);
}
