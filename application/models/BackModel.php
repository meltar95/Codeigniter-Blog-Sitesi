<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackModel extends CI_Model
{
  public function icerikEkle_db($icerikData)
  {
    $result = $this->db->insert('blog_content', $icerikData);
    return $result;
  }

  public function icirek_listele()
  {
    $result = $this->db->get('blog_content');
    return $result->result();  
  }

}
