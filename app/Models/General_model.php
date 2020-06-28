<?php namespace App\Models;

use CodeIgniter\Model;

class General_model extends Model{
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    
    /**
     * ambilData
     *
     * @param  mixed $select
     * @param  mixed $from
     * @param  mixed $where
     * @return void
     */
    public function ambilData($select, $from, $where){
        $builder = $this->db->table($from);
        $builder->select($select);
        $builder->where($where);
        return $builder->get()->getResult();
    }
    
    /**
     * getJoin2Left
     *
     * @param  mixed $select
     * @param  mixed $from
     * @param  mixed $joinTable
     * @param  mixed $joinMyKey
     * @param  mixed $joinItsKey
     * @return void
     */
    public function getJoin2Left($select, $from, $joinTable, $joinMyKey, $joinItsKey){
        $builder = $this->db->table($from);
        $builder->select($select);
        $builder->join($joinTable, "$joinItsKey = $joinMyKey", "left");
        return $builder->get()->getResult();
    }

    public function hapusData($from, $where){
        $this->db->table($from)->delete($where);
    }
    
    /**
     * masukkanData
     *
     * @param  mixed $from
     * @param  mixed $data
     * @return void
     */
    public function masukkanData($from, $data = array()){
        $this->db->table($from)->insert($data);
    }
    
    /**
     * perbaruiData
     *
     * @param  mixed $from
     * @param  mixed $data
     * @param  mixed $where
     * @return void
     */
    public function perbaruiData($from, $data, $where){
        $this->db->table($from)->update($data, $where);
    }
}