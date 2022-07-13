<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class WorkModel extends Model{

    protected $table = 'work';
    protected $primaryKey = 'work_id';
    protected $allowedFields = [
        'work_name',
        'work_information',
        'work_phone',
        'work_address',
        'work_created_at',
        'work_status',
    ];

}