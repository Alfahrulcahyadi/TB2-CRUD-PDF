<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "code_transaction",
        "photo",
        "payment",
        "consumer_id",
        "operator_id",
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTransaction()
    {
        return $this->findAll();
    }

    public function getCodeTrasaction()
    {
        $q = $this->select('MAX(code_transaction) as `kode`')->first();
        $kode      = (int) substr($q['kode'] ?? 0, 5, 5);
        $kode++;

        $kd_first  = "TR";
        $codeTransaction = $kd_first . sprintf("%05s", $kode);

        return $codeTransaction;
    }

    public function getUser($userId)
    {
        $users = new UserModel();
        return $users->where('id', $userId)->first()['username'];
    }

    public function getItemTransaction($codeTransaction)
    {
        $itemTrasactions = new ItemTransactionModel();
        return $itemTrasactions->where('code_transaction', $codeTransaction)->findAll();
    }

    public function getCountTransaction()
    {
        return $this->countAllResults();
    }

    public function getCountPayment($payment)
    {
        return $this->where('payment', $payment)->countAllResults();
    }
}
