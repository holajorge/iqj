<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	//clase de usuarios no autenticados

	class UnauthenticatedUser	{
		//super objeto de codeigniter
		private $ci;

		// cotroladores que puede acceder un usuario cuando no a iniciado session
		private $allowed_controllers;

		// metodos que puede acceder un usuario cuando no a iniciado session
		private $allowed_methods;

		// metodos que no puede acceder un usuario cuando no a iniciado session
		private $disallowed_methods;

		//
		private $drivers_not_allowed;

		public function __construct()
		{
			// super objeto de codeigniter
			$this->ci =& get_instance();
			$this->allowed_controllers		= [''];
			$this->disallowed_controllers	= ['Admin_controller',
												'Aportaciones_ctrl',
												'Deducciones_ctrl',
												'Depto_ctrl',
												'Empleado_controller',
												'Login_ctrl',
												'Nomina_controller',
												'Percepciones_ctrl',
												'Puesto_ctrl',
												'User_ctrl'];
			$this->allowed_methods 			= ['index','autentificarUser'];
			$this->disallowed_methods 		= ['cerrar_sesion'];
			$this->ci->load->helper('url');
		}

		public function VerificarAccess()
		{
			//se obtiene el controlador en que se encuentra el usuario
			$class = $this->ci->router->class;

			//se obtiene el metodo en que se encuentra el usuario
			$method = $this->ci->router->method;

			//se guarda la sesion en una variable unica que este vacia
			$session = $this->ci->session->userdata('logged_in');



			if(empty($session) && !in_array($class, $this->allowed_controllers))
			{

				if(!in_array($method, $this->allowed_methods))
				{
					 redirect(base_url('Admin_controller'));
				}
			}

			if(empty($session) && in_array($class, $this->allowed_controllers))
			{

				if(in_array($method, $this->disallowed_methods))
				{
					 redirect(base_url('Admin_controller'));
				}
			}
		}
	}