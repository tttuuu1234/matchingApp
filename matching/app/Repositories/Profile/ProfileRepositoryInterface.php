<?php

namespace App\Repositories\Profile;

interface ProfileRepositortInterface
{

    /**
     * profile取得
     * @param integer $id
     *
     * @return object
     */
    public function getProfile($id);

    /**
     * profile作成
     * @param array $inputs
     */
    public function create($inputs);

    /**
     * profile更新
     * @param array $inputs
     * @param integer $id
     */
    public function update($inputs, $id);

}