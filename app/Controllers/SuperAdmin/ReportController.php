<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\ItemTransactionModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class ReportController extends BaseController
{
    protected $userModel;
    protected $transactionModel;
    protected $itemTransactionModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->itemTransactionModel = new ItemTransactionModel();
    }

    public function index()
    {
        $transactions = $this->transactionModel->getTransaction();
        $users = $this->userModel->getUser();

        $transactionModel = $this->transactionModel;
        $itemTransactionModel = $this->itemTransactionModel;

        $data = [
            'title' => 'Reports Data',
            'transactions' => $transactions,
            'users' => $users,
            'transactionModel' => $transactionModel,
            'itemTransactionModel' => $itemTransactionModel,
        ];

        return view("super_admin/reports/index", $data);
    }
}
