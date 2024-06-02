<?php

namespace App\Services\Interfaces;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function paginate();
    public function create($request);
    public function update(UpdateUserRequest $request, $id);
    public function destroy($id);
}
