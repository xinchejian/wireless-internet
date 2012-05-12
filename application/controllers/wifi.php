<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

class Wifi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    $this->load->helper(array('form', 'url'));
    $this->load->library('user_agent');
		$this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[32]|xss_clean|callback_username_check');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
      if (stristr($this->agent->platform(), "Windows")) {
        $data['windows'] ='<p style="color: red; font-color: #fff; ">Windows Users install this first! <a href="/assets/xinchejian.der">xinchejian.der</a></p>';
      } else {
        $data['windows'] =$this->agent->platform();
      }
      echo "fuclers";
      var_dump($this->agent->platform());
      echo "futters";
			$this->load->view('landing', $data);
		}
		else
		{
      
      /* select the data, update where needed
       * 
       * Insert new records for the 24 hours
       * Check the guest database to see if they have been here before
       * Abuse them?
       * 
       */

      $radcheck = array(
        'username' => $this->input->post('username'), 
        'attribute' => 'Cleartext-Password', 
        'op' => ':=', 
        'value' => $this->password($this->input->post('password'))
      );
      
      $this->db->insert('radcheck', $radcheck); 
      

      
      $user = array(
        'id' => $this->db->insert_id(), 
        'email' => $this->input->post('email'), 
        'created' => date( 'Y-m-d H:i:s', strtotime("now") ), 
        'expiry' => date( 'Y-m-d H:i:s', strtotime("+1 day") )
      );

      $this->db->insert('users', $user); 
      $data['expires'] = $user['expiry'];
			$this->load->view('thanks', $data);
		}
    
		
	}
  public function password($password) 
  {
    /* yes i know.. no encryption, PAP not workie correctly.. need more investigation */
    return $password;
  }

  public function username_check($str)
	{

    $query = $this->db->select('id')->from('radcheck')->where('username', $str)->get();

    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', 'Username already exists.');
      return FALSE;
    }	else {
			return TRUE;
		}
	}
  public function extend()
  {
    $this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[32]|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('extend');
		}
		else
		{
      
      $query = $this->db->select('users.id, users.expiry')
        ->from('users')
        ->join('radcheck', 'radcheck.id = users.id', 'left')
        ->where('radcheck.username', $this->input->post('username'))
        ->where('radcheck.value', $this->input->post('password'))
        ->limit(1,0) //just in case
        ->get();
      
      

      if ($query->num_rows() > 0) {
        
        
       foreach ($query->result() as $row) {
          $changes = array(
            'expiry' => date( 'Y-m-d H:i:s', strtotime("+1 day") )
          );
      
          $expires = $row->expiry;
          $id = $row->id;
       }
       
       if ($expires <= date( 'Y-m-d H:i:s', strtotime("now"))) {
          $this->db->update('users', $changes, array('id' => $id));
          $data['expires'] = $changes['expiry'];
          $this->load->view('thanks', $data);
       } else {
         $data['expires'] = $expires;
         $this->load->view('expires', $data);
       }
       
      } else {
        $this->session->set_flashdata('error', 'OOpps.. cant find your account');
        $this->load->view('extend');
      }
      
		}
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */