<?php

namespace App\Services;

use App\Exceptions\Message;
use App\Models\Group;
use App\Repositories\GroupRepository\GroupRepository;
use Illuminate\Http\Request;

class GroupService
{

    protected $groupRepository;
    protected $subgroupService;

    public function __construct(SubgroupService $subgroupService)
    {
        $this->groupRepository = (new GroupRepository(new Group()));
        $this->subgroupService = $subgroupService;
    }


    /**
     * busca a lista de paginas de menu do sistema
     *
     * @return array
     */
    public function getAll()
    {
        $result = $this->groupRepository->get();

        if(is_null($result) || $result->count() == 0) {
            throw new \Exception(Message::MSG_NENHUM_REGISTRO_ENCONTRADO);
        }

        return $result;
    }

    public function create(Request $request)
    {
        $data['descricao'] = $request->descricao;

        $result = $this->groupRepository->create($data);

        if(!$result->id) {
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        return $result;
    }

    public function find($id){
        if(!$id){
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        $result =  $this->groupRepository->find($id);

        if(is_null($result) || $result->count() == 0) {
            throw new \Exception(Message::MSG_NENHUM_REGISTRO_ENCONTRADO);
        }

        return $result;
    }

    public function update(Request $request, $id){

        $data['descricao'] = $request->descricao;

        $result = $this->groupRepository->update($data, $id);

        if(!$result) {
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        return $result;

    }

    public function delete($id){
        if(!$id){
            throw new \Exception(Message::MSG_ALGO_ERRADO);
        }

        $result = $this->groupRepository->delete($id);

        return $result;

    }

}
