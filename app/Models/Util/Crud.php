<?php
namespace App\Models\Util;


interface Crud
{
    public function create($object, $arguments = []);

    public function remove($object_id,$arguments = []);

    public function edit($object,$arguments = []);

    public function read($object_id,$arguments = []);

    public function read_all($arguments = []);

    public function filter($input = []);

    public function inputs($object);

    public function rules($id = 0);
}