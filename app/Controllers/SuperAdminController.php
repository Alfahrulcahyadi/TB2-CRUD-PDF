<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemTransactionModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class SuperAdminController extends BaseController
{
    protected $userModel;
    protected $transactionModel;
    protected $itemTransactionModel;

    public function __construct()
    {
        if (session()->get('role') != "super_admin") {
            echo view('access_denied');
            exit;
        }

        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->itemTransactionModel = new ItemTransactionModel();
    }

    public function index()
    {
        $userCount = $this->userModel->getCountUser();
        $adminCount = $this->userModel->getCountAdmin();
        $superAdminCount = $this->userModel->getCountSuperAdmin();
        $transactionCount = $this->transactionModel->getCountTransaction();
        $totalTransaction = $this->itemTransactionModel->getTrasaction();
        $paymentBalanceCount = $this->transactionModel->getCountPayment('balance');
        $paymentCashCount = $this->transactionModel->getCountPayment('cash');

        $incomeTransaction = 0;
        foreach ($totalTransaction as $d) {
            $totalItemTrasaction[] = $d['total'];
            $incomeTransaction = array_sum($totalItemTrasaction);
        }

        $data = [
            'userCount' => $userCount,
            'adminCount' => $adminCount,
            'superAdminCount' => $superAdminCount,
            'incomeTransaction' => $incomeTransaction,
            'transactionCount' => $transactionCount,
            'paymentBalanceCount' => $paymentBalanceCount,
            'paymentCashCount' => $paymentCashCount,
        ];

        return view("super_admin/dashboard", $data);
    }
}
