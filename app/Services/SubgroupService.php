<?php

namespace App\Services;

use App\Exceptions\Message;
use App\Models\Subgroup;
use App\Repositories\SubgroupRepository\SubgroupRepository;
use Illuminate\Http\Request;

class SubgroupService
{

    protected $subgroupRepository;

    public function __construct()
    {
        $this->subgroupRepository = (new SubgroupRepository(new Subgroup()));
    }


    /**
     * busca a lista de paginas de menu do sistema
     *
     * @return array
     */
    public function getAll()
    {
        $result = $this->subgroupRepository->get();

        if(is_null($result) || $result->count() == 0) {
            throw new \Exception(Message::MSG_NENHUM_REGISTRO_ENCONTRADO);
        }

        return $result;
    }

    public function create(Request $request)
    {
        $data['descricao'] = $request->descricao;
        $data['group_id'] = $request->group_id;

        $result = $this->subgroupRepository->create($data);

        if(!$result->id) {
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        return $result;
    }

    public function find($id){
        if(!$id){
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        $result =  $this->subgroupRepository->find($id);

        if(is_null($result) || $result->count() == 0) {
            throw new \Exception(Message::MSG_NENHUM_REGISTRO_ENCONTRADO);
        }

        return $result;
    }

    public function update(Request $request, $id){

        $data['descricao'] = $request->descricao;

        $result = $this->subgroupRepository->update($data, $id);

        if(!$result) {
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        return $result;

    }

    public function delete($id){
        if(!$id){
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        $result = $this->subgroupRepository->delete($id);

        return $result;

    }

}
