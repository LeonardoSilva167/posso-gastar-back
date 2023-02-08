<?php

namespace App\Services;

use App\Exceptions\Message;
use App\Models\BoxComposition;
use App\Repositories\BoxCompositionRepository\BoxCompositionRepository;
use Illuminate\Http\Request;

class BoxCompositionService
{

    protected $groupRepository;

    public function __construct()
    {
        $this->groupRepository = (new BoxCompositionRepository(new BoxComposition()));
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
        $data['name'] = $request->name;
        $data['valor'] = $request->valor;
        $data['box_id'] = $request->box_id;

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

        $data['name'] = $request->name;
        $data['valor'] = $request->valor;
        // $data['box_id'] = $request->box_id;

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
