<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemTransactionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'itemtransactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "price",
        "unit",
        "qty",
        "total",
        "type_trash",
        "status_item_transaction",
        "operator_id",
        "code_transaction",
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

    public function getItemTransaction($operatorId = false)
    {
        if ($operatorId == false) {
            return $this->findAll();
        }

        return $this->where([
            'operator_id' => $operatorId,
            'status_item_transaction' => 0,
        ])->findAll();
    }

    public function getTrasaction()
    {
        return $this->where([
            'status_item_transaction' => 1,
        ])->findAll();
    }
}
