<?php
class Tbl_user_model extends CI_Model
{

	function verify_user($username,$password)
	{
		//verifica que este registrado un usuario en la base de datos tomando como parametros username 
		//y password regresando una respuesta V or F

		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$res=$this->db->get('tbl_user');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}

	function verify_rol($username,$password)

	//Se obtiene el tipo de rol para identificar el mismo y dar los permisos de 
	//acceso aL sistema
	{
		$this->db->select('id_tipo');
		$this->db->where('username',$username);
		$this->db->where('password',$password); 

		$tipo_r = $this->db->get('tbl_user');

		if ( $tipo_r->num_rows > 0 ) 
		{
			return $tipo_r->result();
		}
		else
		{
			return FALSE;
		}
	}   //Obtiene el tipo de rol          /////////////DARME DE ALTA EN TRELLO/////////////

} 

?>