<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user',
        'file_name'
    ];

    public function getAllWithUsers()
    {
        return $this->db->table('images')
            ->select('images.*, user.name, user.login')
            ->join('user', 'user.id = images.user')
            ->orderBy('images.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}