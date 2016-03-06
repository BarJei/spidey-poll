<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IPAddress_model extends CI_Model 
{
    
    public function __construct() 
    {
        parent::__construct();
    }

    /**
     * Get specific ip-address
     *
     * @param string - $ipAddress
     *
     * @return array - @data(array - list of info) and count(int - row count)
     */

    public function getOne($ipAddress) 
    {   
        $count = null;

        $result = $this->db->select('*')
            ->from('tbl_voter_ip_address')
            ->where('ip_address', $ipAddress)
            ->get(); 

        return array(
            'data' => $result != null && $result->num_rows() > 0 ? $result->result_array() : null, 
            'count' => $result == null ? 0 : ($count != null ? $count : $result->num_rows())
        );
    }

     /**
     * Add an ip-address
     *
     * @param string - $ipAddress
     *
     * @return array - @success(boolean - success or not) and affected_rows(int - no of rows inserted)
     */

    public function insert($ipAddress) 
    {   
        $ipAddExist = $this->getOne($ipAddress)['count'] > 0;

        if ($ipAddExist) {
            throw new Exception('This IP Address already used!'); 
        }

        $result = $this->db->set( 'ip_address', $ipAddress)
            ->insert('tbl_voter_ip_address');

        return array('success' => $result, 'affected_rows' => $this->db->affected_rows());
    }

}