<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = 'details';
    protected $allowedFields = ['saleId', 'productId', 'amount'];
}
