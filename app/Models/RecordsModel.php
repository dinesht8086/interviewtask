<?php
namespace App\Models;
use CodeIgniter\Model;

class RecordsModel extends Model {
    protected $table = 'records';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'file_path', 'created_at', 'updated_at'];
}