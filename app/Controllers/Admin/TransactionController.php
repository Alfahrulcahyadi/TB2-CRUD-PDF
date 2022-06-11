<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ItemTransactionModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class TransactionController extends BaseController
{
    protected $userModel;
    protected $transactionModel;

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

        $data = [
            'title' => 'Transaksi Data',
            'transactions' => $transactions,
            'users' => $users,
            'transactionModel' => $transactionModel,
        ];

        return view("admin/transactions/index", $data);
    }

    public function create()
    {
        $itemTransactions = $this->itemTransactionModel->getItemTransaction(session()->get('id'));
        $codeTransaction = $this->transactionModel->getCodeTrasaction();

        $users = $this->userModel->getConsumer();

        $data = [
            'title' => 'Item Transaksi Data',
            'itemTransactions' => $itemTransactions,
            'codeTransaction' => $codeTransaction,
            'users' => $users,
        ];

        return view("admin/transactions/create", $data);
    }

    public function store()
    {
        $codeTransaction = $this->transactionModel->getCodeTrasaction();
        $operatorId = session()->get('id');
        $userId = $this->userModel->where('email', $this->request->getPost('email'))->first()['id'];

        if (!$this->validate([
            'image' => [
                'rules' => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]|max_size[image,5120]',
                'errors' => [
                    'uploaded' => 'There must be a file uploaded',
                    'mime_in' => 'File Extension Must Be jpg,jpeg,gif,png',
                    'max_size' => 'File Size Max 5 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataImage = $this->request->getFile('image');
        $fileName = $dataImage->getRandomName();

        $this->transactionModel->insert([
            'code_transaction' => $codeTransaction,
            'photo' => $fileName,
            'payment' => $this->request->getPost('payment'),
            'consumer_id' => $userId,
            'operator_id' => $operatorId,
        ]);

        $dataUpdate = [
            'status_item_transaction' => 1,
            'code_transaction' => $codeTransaction,
        ];

        $idItem = $this->itemTransactionModel->where([
            'operator_id' => $operatorId,
            'status_item_transaction' => 0
        ])->findAll();

        foreach ($idItem as $d) {
            $this->itemTransactionModel->update($d['id'], $dataUpdate);
        }

        $dataImage->move('uploads/images/', $fileName);

        return redirect('admin/transactions')->with('success', 'Data Added Successfully');
    }
}
