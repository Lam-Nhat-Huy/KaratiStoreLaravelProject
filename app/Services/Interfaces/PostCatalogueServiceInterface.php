<?php

namespace App\Services\Interfaces;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

/**
 * Interface PostCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface PostCatalogueServiceInterface
{
    public function paginate($request);
    public function create($request);
    public function update(UpdateUserRequest $request, $id);
    public function destroy($id);
    public function updateStatus(array $post = []);
}
