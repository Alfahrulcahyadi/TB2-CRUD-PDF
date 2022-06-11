<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\ItemTransactionModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class ItemTransactionController extends BaseController
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

    public function store()
    {
        $typeTrash = $this->request->getPost('type_trash');
        $qtyTrash = $this->request->getPost('qty');
        $priceTrash = $this->request->getPost('price');

        $check = $this->itemTransactionModel->where([
            'type_trash' => $typeTrash,
            'status_item_transaction' => 0,
        ])->first();


        if ($check) {
            $qtyNow = $check['qty'] + $qtyTrash;

            $total = ($priceTrash * $qtyNow);

            $this->itemTransactionModel->update($check['id'], [
                'price' => $priceTrash,
                'qty' => $qtyNow,
                'total' => $total,
            ]);
        } else {
            $operatorId = session()->get('id');

            $total = ($priceTrash * $qtyTrash);

            $this->itemTransactionModel->insert([
                'price' => $priceTrash,
                'unit' => $this->request->getPost('unit'),
                'qty' => $qtyTrash,
                'total' => $total,
                'type_trash' => $typeTrash,
                'operator_id' => $operatorId,
            ]);
        }

        return redirect()->back();
    }

    public function delete()
    {
        $id = $this->request->getPost('id');

        $this->itemTransactionModel->delete($id);

        return redirect()->back();
    }
}
