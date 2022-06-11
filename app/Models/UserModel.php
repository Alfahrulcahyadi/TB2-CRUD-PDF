<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "email",
        "code_member",
        "username",
        "password",
        "telephone",
        "address",
        "role",
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

    public function getUser()
    {
        return $this->findAll();
    }

    public function getCountUser()
    {
        return $this->where('role', 'user')->countAllResults();
    }

    public function getCountAdmin()
    {
        return $this->where('role', 'admin')->countAllResults();
    }

    public function getCountSuperAdmin()
    {
        return $this->where('role', 'super_admin')->countAllResults();
    }

    public function getCodeMember($role = 'user')
    {
        $q = $this->select('MAX(code_member) as `kode`')->first();
        $kode      = (int) str_replace($q['kode'], 5, 5);
        $kode++;

        $kd_first = "M";
        if ($role == 'admin') {
            $kd_first = "A";
        } else if ($role == 'super_admin') {
            $kd_first = "SA";
        }

        $codeMember = $kd_first . sprintf("%05s", $kode);

        return $codeMember;
    }

    public function getConsumer()
    {
        return $this->where('role', 'user')->findAll();
    }
}
