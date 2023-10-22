<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserRepository
{
    /**
     * Cria um novo usuario
     * @param Request $request
     * @return User
     */
    public function save(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $roles = collect($request->input('tipo'))->map(function ($type) {
            });
        $user->assignRole($roles);

        return $user;
    }

    /**
     * Retorna todos os usuarios do banco de dados
     * @return Collection
     */
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return Builder
     */
    public function getAllAwaitingApproval(): Builder
    {
        return User::where('approved', false);  
     }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return User::findorfail($id);
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param array $arr
     */
    public function update(int $id, array $arr)
    {
        return User::findorfail($id)->update($arr);
    }

}