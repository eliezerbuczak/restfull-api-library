<?php

namespace App\Repositories\Eloquent;

use App\Models\Loan;
use App\Repositories\Interfaces\LoanRepositoryInterface;

class LoanRepository extends BaseRepository implements LoanRepositoryInterface
{

    public function __construct()
    {
        $this->model = new Loan();
    }

    public function create($data)
    {
        $data['status'] = 'pending';
        if(!$data['return_date']){
            $data['return_date'] = date('Y-m-d', strtotime('+7 days'));
        }
        return parent::create($data);
    }

    public function return($id)
    {
        try {
            $loan = $this->model->find($id);
            if ($loan) {
                $loan->status = 'returned';
                $loan->save();
                return $loan;
            }
            return [
                'message' => 'Loan not found',
            ];
        } catch (\Exception $e) {
            return [
                'message' => 'Error returning loan',
            ];
        }
    }
}
