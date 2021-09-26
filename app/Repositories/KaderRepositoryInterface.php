<?php

namespace App\Repositories;

interface KaderRepositoryInterface
{
    public function save(array $request);
    public function update(array $request, $id);
    public function delete($id);
}
