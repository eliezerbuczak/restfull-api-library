<?php

namespace App\Repositories\Interfaces;

interface LoanRepositoryInterface extends BaseRepositoryInterface
{
    public function return($id);
}
