<?php namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model 

{
    protected $table = 'publication';
    protected $allowedFields = ['content', 'user', 'role'];

    public function get($id = false)
    {
        if($id === false)
            {
                return $this->findAll();
            }

            return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function show()
{
    $db = \Config\Database::connect();
    $builder = $db->table('publication');

    $builder->select('publication.*, user.name');
    $builder->join('user', 'user.id = publication.user');
    $builder->orderBy('publication.id', 'DESC');

    return $builder->get()->getResultArray();
}

}


