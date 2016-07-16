<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		var $parent_page = "dashboard";
		private $path_callback;

	    function __construct() {
	        parent::__construct();
	        //$this->load->helper('url');
	        $this->load->library('session');
	    }
	
	    function index() {
	    	$code['data'] = $this->load->view($this->parent_page.'/'.'bootstrap-elements' , '' , true);
	    	$code['data'] .= $this->load->view($this->parent_page.'/'.'index_exp' , '' , true);
	        $this->_show( 'index' , $code);
	        
	    }

	    function _show($page = 'index' , $data = null , $key = 'a'){
	    	$link['link'] = $key;
	    	if (isset($data['title'])) {
	    		$T['title'] = $data['title'];
	    	}else{
	    		$T = null;
	    	}
	    	$this->load->view($this->parent_page.'/'.'header');	    	
	    	$this->load->view($this->parent_page.'/'.'navmenu' , $link);	    	
	    	$this->load->view($this->parent_page.'/'.'headTitle' , $T);
    		$this->load->view($this->parent_page.'/'.$page , $data);
    		$this->load->view($this->parent_page.'/'.'footer');
    	}

    	public function page($key)
    	{
    		//$arr = $this->input->get();

    		switch ($key) {
    			case 'a11':
    				//view news image;
    				$key = 'a1';
    				if ($this->input->get('pk') || $this->session->userdata('pk')) {
    					if ($this->input->get('pk')) {
    						$pk = $this->input->get('pk');    									
    						$this->session->set_userdata( 'pk' , $pk );
    					} else {
    						$pk = $this->session->userdata('pk');
    					}
    					//$pk = $this->input->get('pk');
    					$this->load->library('my_func');
    					$pk = $this->my_func->scpro_decrypt($pk);

    					$this->load->database();
						$this->_loadCrud();
						$crud = new grocery_CRUD();				
						$crud->set_table('picture');
						$crud->unset_edit();
						$crud->unset_read();
						$crud->unset_print();
						$crud->unset_export();
						//$crud->unset_jquery();
						$crud->set_subject('News Image');
						$crud->where('ne_id',$pk);
						$crud->columns('pi_title' ,'img_url', 'pi_timestamp');
						$crud->fields('pi_title' , 'img_url' , 'ne_id');
						$crud->field_type('ne_id', 'hidden', $pk);						
						$crud->display_as('pi_title','Title')
							->display_as('img_url' , 'Image')
							->display_as('pi_timestamp' , 'Uploads time');
						$crud->set_field_upload('img_url','assets/uploads/img');
						$crud->callback_before_delete(array($this,'callback_delete_image_news'));						
						$output = $crud->render();
    					$code = $this->load->view('crud' , $output , true);
    					$this->load->model("m_news");

    					$temp = $this->m_news->get($pk);

    					
    					$data2['news_title'] = $temp->ne_title;
    					$data2['msg'] = $temp->ne_msg;
    					$this->load->model('m_picture');
    					unset($temp);
    					$data2['image'] = $this->m_picture->getbyne_id($pk);
    					$data2['output'] = $code;
    					$data['title'] = '<a><i class="fa fa-fw fa-edit"></i> News</a>';
	    				$data['display'] = $this->load->view($this->parent_page.'/newsGallery' , $data2 , true);
	    				$this->_show('index' , $data , $key);
	    				
	    				break; 
    				}
    				
    				//break;
    			case 'a12':
    				// news crud
    				$key = 'a1';
    				if ($this->session->userdata('pk')) {
    					$this->session->unset_userdata('pk');
    				}
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> News</a>';
    				$data ['display'] = $this->load->view('crud' , $this->getAjaxNews() , true);    				
    				
    				$this->_show('index' , $data , $key);
    				break;
    			case 'a1':
    				// News
    				if ($this->session->userdata('pk')) {
    					$this->session->unset_userdata('pk');
    				}
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> Production</a>';
    				$data['display'] = $this->load->view($this->parent_page.'/news_menu' , '' , true);
    				$this->_show('index' , $data , $key);
    				break;
    			case 'a2':
    				# code...
    				break;
    			case 'a3':
    				//channel
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Channel';
    				$this->path_callback = 'channel';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('channel');
		    		$crud->set_subject('Linked Page');
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->required_fields('img_url','ch_link');
		    		$crud->display_as('ch_title' , 'Link Title')
		    			->display_as('img_url' , 'Page Logo')
		    			->display_as('ch_link' , 'Page Url')
		    			->display_as('ch_queue' , 'Queue Number');
		    		$crud->set_field_upload('img_url','assets/uploads/channel');
		    		$crud->callback_before_delete(array($this,'callback_delete_image_channel'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key); 
    				break;
    			case 'a4':
    				# code...
    				break;
    			case 'a5':
    				# code...
    				break;
    			case 'b1':
    				//Website Profile
    				$data['title'] = "<i class=\"fa fa-fw fa-desktop\"></i> Website Profile";
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('web_profile');
		    		$crud->set_subject('Website Profile');
		    		$crud->unset_add();
		    		$crud->unset_delete();
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_texteditor('wp_meta','full_text');
		    		$crud->set_field_upload('wp_logo','assets/cover');
		    		$crud->set_field_upload('wp_favicon','assets/cover');
		    		
					$output = $crud->render();
					$data['search_filter'] = false;
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key);    		
    				break;
    			case 'b2':
    				//Banner edit
    				$data['title'] = '<i class="fa fa-fw fa-bookmark-o"></i> Banner';
    				//$this->path_callback = 'banner';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();  		
		    		$crud->set_table('banner');
		    		$crud->set_subject('Banner');
		    		
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_fields('ba_timestamp');
		    		$crud->columns('ba_title','ba_msg', 'img_url' , 'ba_queue' , 'ba_active');
		    		//$crud->fields('ba_title','ba_msg', 'img_url' , 'ba_queue' , 'ba_active');
		    		$crud->set_field_upload('img_url','assets/uploads/banner');
		    		$crud->unset_jquery();
		    		$crud->display_as('ba_title' , 'Title')
		    			->display_as('ba_msg' , 'Message')
		    			->display_as('img_url' , 'Background Image')
		    			->display_as('ba_queue' , 'Banner Queue')
		    			->display_as('ba_active' , 'Active Banner');
					
					$crud->callback_before_delete(array($this,'callback_delete_image_banner'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key);
    				break;
    			case 'b3':
    				//Header
    				$data['title'] = '<i class="fa fa-fw fa-list-alt"></i> Header';
    				$this->path_callback = 'header';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('header');
		    		$crud->set_subject('Header');		    		
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_add();
		    		$crud->unset_delete();
		    		$crud->unset_fields('he_timestamp');
					$crud->columns('he_title','he_msg', 'img_url' , 'he_queue' , 'he_active');
					$crud->set_field_upload('img_url','assets/uploads/header');
		    		$crud->unset_jquery();
		    		$crud->display_as('he_title' , 'Title')
		    			->display_as('he_msg' , 'Message')
		    			->display_as('img_url' , 'Icon Image')
		    			->display_as('he_queue' , 'Header Queue')
		    			->display_as('he_active' , 'Active Header');

		    		$data['search_filter'] = false;
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key); 
    				break;
    			case 'b4':
    				$data['title'] = '<i class="fa fa-fw fa-tags"></i> Tag Announcement';
    				$data['display'] = "This function under development !!!";
    				$this->_show('index' , $data , $key);
    				break;    			
    			default:
    				$this->_show();
    				break;
    		}
    	}
    	private function _loadCrud()
    	{
    		$this->load->database();
    		$this->load->library('grocery_CRUD');
    	}
    	
    	public function uploadPic()
		{
			$this->load->helper('form');
			$this->load->view('upload_form', array('error' => ' ' ));
		}

		public function do_upload(){
			$this->load->library('my_func');

			$data = $this->my_func->do_upload();
			$this->load->helper('form');

			$this->load->view('upload_success', $data);
		}

		public function callback_delete_image_banner($primary_key)
		{
			$this->load->database();
			$this->load->model('m_banner');
			$obj = $this->m_banner->get($primary_key);
			$img = $obj->img_url;			
			if (unlink('./assets/uploads/banner/'.$img)) {
				return true;
			}else{
				return false;
			}			
		}

		public function callback_delete_image_channel($primary_key)
		{
			$this->load->database();
			$this->load->model('m_channel');
			$obj = $this->m_channel->get($primary_key);
			$img = $obj->img_url;			
			if (unlink('./assets/uploads/channel/'.$img)) {
				return true;
			}else{
				return false;
			}			
		}

		public function callback_delete_image_news($primary_key)
		{
			$this->load->database();
			$this->load->model('m_picture');
			$obj = $this->m_picture->get($primary_key);
			$imgnum = $this->m_picture->getbyne_id($obj->ne_id);
			//check number of image;
			$img = $obj->img_url;			
			if (unlink('./assets/uploads/img/'.$img)) {
				return true;
			}else{
				return false;
			}			
		}

		public function test()
		{
			$this->load->database();
			$this->load->model('m_banner');
			$obj = $this->m_banner->get(1);
			$img = $obj->img_url;
			echo "<pre>";
			echo base_url('assets/uploads/banner').'/'.$img;
			print_r($obj);
			echo "</pre>";

		}

		public function add_news()
		{
			$arr = $this->input->post();		
			$input = array(
					'ne_title' => $arr['title'],
					'ne_msg' => $arr['msg'] 
				);
			$this->load->database();
			$this->load->model('m_news');
			$this->load->model('m_picture');
			$ne_id = $this->m_news->insert($input);
			if ($ne_id !== false) {
				$this->load->library('my_func');
				$result = $this->my_func->do_upload('./assets/uploads/img/');
				$pi_id = null;
				$success = array();
				//$error = array();
				if (sizeof($result['success']) != 0) {
					foreach ($result['success'] as $filename => $detail) {					
						$id = $this->m_picture->insert(array(
								'pi_title' => $filename,
								'img_url' => $detail['file_name'],
								'ne_id' => $ne_id
							));
						if ($pi_id == null) {
							$pi_id = $id;
						}
						$success[] = $filename;
					}
					$this->m_news->update(array('pi_id' => $pi_id),$ne_id);
				}
				
				
				//$code = "<pre>";
				//$code .= print_r($success , true) . print_r($result['error'] , true) . "</pre>";
				//return $code;
				$i = sizeof($success);
				$e = sizeof($result['error']);
				if ($e == 0) {
					$this->session->set_flashdata('success' , '<b>Well done!</b> You successfully send the news.');
					//redirect(site_url('dashboard/page/a11?success='.$this->my_func->scpro_encrypt('1')),'refresh');
				}elseif ($i == 0) {
					$this->m_news->delete($ne_id);
					$code = "<ul>";
					foreach ($result['error'] as $filename => $errormsg) {
						$code .= "<li> ".$filename." : ".$errormsg."
						</li>";
					}
					$code = "<b>Oh snap!</b> Change a few things up and try submitting again.</br>" . $code;
					$this->session->set_flashdata('error' , $code);

					//redirect(site_url('dashboard/page/a11?fail='.$this->my_func->scpro_encrypt('3')),'refresh');
				}else{
					$code = "<ul>";
					foreach ($result['error'] as $filename => $errormsg) {
						$code .= "<li> ".$filename." : ".$errormsg."
						</li>";
					}
					$code = "<b>Warning!</b> You successfully send the news but <b>some your image not looking too good<b>.</br>".$code;
					$this->session->set_flashdata('warning' , $code);
					//redirect(site_url('dashboard/page/a11?success='.$this->my_func->scpro_encrypt('2')),'refresh');
				}
						
			}else{
				$this->session->set_flashdata('error' , "<b>Oh snap!</b> Unable to send the news, change a few things up and try submitting again.");
			}
			redirect('dashboard/page/a1','refresh');			
		}
		public function getAjaxNews()
		{
			$this->load->database();
			$this->_loadCrud();
			$crud = new grocery_CRUD();
			
			$crud->set_table('news');
			$crud->set_subject('News list');
			$crud->unset_add();
			$crud->unset_print();
			$crud->unset_export();
			$crud->unset_columns('pi_id');
			$crud->display_as('ne_title','News Title')
				->display_as('ne_msg' , 'Message')
				->display_as('ne_timestamp' , 'Time')
				->display_as('ne_active' , 'Active');
			$crud->add_action('Photo', '', '', 'fa fa-file-image-o',array($this,'callbackGalary'));
			$crud->callback_before_delete(array($this,'callback_before_delete_allimg_news'));
			$output = $crud->render();

			return $output;
		}

		function callbackGalary($pk , $row)
		{	
			$this->load->library('my_func');
			return site_url('dashboard/page/a11').'?pk='.$this->my_func->scpro_encrypt($pk);
		}

		function callback_before_delete_allimg_news($pk)
		{
			$this->load->database();
			$this->load->model('m_picture');
			//$arr = array('ne_id' => $pk );
			$obj = $this->m_picture->getbyne_id($pk);
			if ($obj === false) {
				$this->load->library('my_func');
				$msg = "<b>Error!</b> No image was found in database, please contact developer for this situation!<br>
						<ul><li>Msg Code : ".$this->my_func->erroMsgcrypt('image id'.$pk)."</li></ul>
				";
				$this->session->set_flashdata('error', $msg);
				return false;
			}
			foreach ($obj as $row) {
				$img = $row->img_url;
				if (unlink('./assets/uploads/img/'.$img)) {
					$this->m_picture->delete($row->pi_id);
				}else{
					$msg = "<b>Warning!</b> System unable to detect the picture location<br>
						<ul>
							<li>".$row->pi_title."</li></ul>";
					$this->session->set_flashdata('warning', 'value');
					return false;
				}
			}
			//$img = $obj->img_url;			
			return true;	
		}
	}
	        
?>