<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemTransactionModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class ConsumerController extends BaseController
{
    protected $userModel;
    protected $transactionModel;
    protected $itemTransactionModel;

    public function __construct()
    {
        if (session()->get('role') != "user") {
            echo view('access_denied');
            exit;
        }
        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->itemTransactionModel = new ItemTransactionModel();
    }

    public function index()
    {
        $transactionCount = $this->transactionModel->where('consumer_id', session()->get('id'))->getCountTransaction();
        $itemTransactionCount = $this->transactionModel->where('consumer_id', session()->get('id'))->getTransaction();
        $paymentBalanceCount = $this->transactionModel->where('consumer_id', session()->get('id'))->getCountPayment('balance');
        $paymentCashCount = $this->transactionModel->where('consumer_id', session()->get('id'))->getCountPayment('cash');

        $incomeTransaction = 0;
        foreach ($itemTransactionCount as $d) {
            $trasaction = $this->itemTransactionModel->where('code_transaction', $d['code_transaction'])->getTrasaction();
            foreach ($trasaction as $e) {
                $codeTrasaction[] = $e['total'];
                $incomeTransaction = array_sum($codeTrasaction);
            }
        }
        
        $type = [
            'status' => 'Platinum',
            'color' => 'text-black-700'
        ];
        if ($transactionCount < 5) {
            $type['status'] = 'Silver';
            $type['color'] = 'text-gray-300';
        } else if ($transactionCount >= 5 && $transactionCount < 10) {
            $type['status'] = 'Gold';
            $type['color'] = 'text-warning';
        }

        $data = [
            'incomeTransaction' => $incomeTransaction,
            'transactionCount' => $transactionCount,
            'type' => $type,
            'paymentBalanceCount' => $paymentBalanceCount,
            'paymentCashCount' => $paymentCashCount,
        ];

        return view("user/dashboard", $data);
    }
}
