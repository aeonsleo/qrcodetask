<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    /**
     * @param Array $attributes
     * 
     * @return Model
     */
    public function create(Array $attributes);
}