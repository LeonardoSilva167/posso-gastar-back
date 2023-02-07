<?php

namespace App\Repositories\SubgroupRepository;

use App\Repositories\BaseRepository;

class SubgroupRepository extends BaseRepository implements SubgroupRepositoryInterface
{
    public function getSubgroups($id){

        return $this->model::where('group_id', $id)
                            ->orderBy('created_at', 'asc')
                            ->get();

    }

}
