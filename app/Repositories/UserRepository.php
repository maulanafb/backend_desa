<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute = false
    ) {
        $query = User::where(function ($query) use ($search) {
            if ($search) {
                $query->search($search);
            }
        });

        if ($execute && $limit) {
            $query->take($limit);
        }

        return $execute ? $query->get() : $query;
    }


    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage = 10
    ) {
        $query = $this->getAll($search, $rowPerPage);
        return $query->paginate($rowPerPage);
    }

    public function create(array $data){
        DB::beginTransaction();

        try {
            $user = new User;
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = bcrypt($data["password"]);
            $user->save();

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function getById(string $id)
    {
        $query = User::where('id', $id);

        return $query->first();
    }

    public function update(string $id,array $data){
        DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->name = $data["name"];

            if(isset($data['password'])){
                $user->password = bcrypt($data["password"]);
            }
            $user->save();

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->delete();
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());

        }
    }
}
