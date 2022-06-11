<?php

namespace App\Controllers\Consumer;

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
        $transactions = $this->transactionModel->where('consumer_id', session()->get('id'))->getTransaction();
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

        return view("user/reports/index", $data);
    }
}
