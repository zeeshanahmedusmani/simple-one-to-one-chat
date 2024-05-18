<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;
        
        $param['where']['signup_id !='] =$this->userid;
        $data['profile'] = $this->model_signup->find_all_active($param);

        $data['profile'] = array_chunk($data['profile'], 4);
        //debug($data['about_us'],1);
            
        $this->load_view("index",$data);
    }
    public function detail($id="")
    {
        global $config;
         $param['where']['signup_id'] = $id;
        $data['detail'] = $this->model_signup->find_one($param);
        $r['where']['religion_id'] = $data['detail']['signup_religion'];
        $religion = $this->model_religion->find_one($r);
        $data['detail']['signup_religion'] = $religion['religion_name'];
        $pics['where']['signup_pic_userid'] =$data['detail']['signup_id'];
        $data['pics']= $this->model_signup_pic->find_all_active($pics);
        
      
        //debug($data['pics'],1);
            
        $this->load_view("detail",$data);
    }
    public function message($id="")
    {
        global $config;

        if($this->userid>0)
        {
            $new['where']['signup_id'] = $this->userid;
            $user= $this->model_signup->find_one($new);
            //                                                                                                                                                                                                                 debug($user,1);
            if($user['signup_is_paid'] == 1)
            {
                //Profile Details
                $param['where']['signup_id'] = $id;
                $data['detail'] = $this->model_signup->find_one($param);
                $r['where']['religion_id'] = $data['detail']['signup_religion'];
                $religion = $this->model_religion->find_one($r);
                $data['detail']['signup_religion'] = $religion['religion_name'];
                $param = array();


                 //For Updating Status

                $param = array();
                $param['where']['chat_sender_id'] = $data['detail']['signup_id'];
                $param['where']['chat_receiver_id'] = $this->userid;
                $update_params['chat_seen_status'] =1;
                $this->model_chat->update_model($param,$update_params);

                //For Messages
                $param =array();
                $param['where_string'] = '(chat_sender_id = '.$this->userid.' AND chat_receiver_id = '.$data['detail']['signup_id'].') OR (chat_receiver_id = '.$this->userid.' AND  chat_sender_id= '.$data['detail']['signup_id'].')';
                $data['chat'] = $this->model_chat->find_all_active($param);   
                $this->load_view("message",$data);
            }
            else
            {
               redirect(l('packages')); 
            }
        }
        else
        {
            redirect(l('packages'));
        }
    }
    public function search()
    {
        //debug($_POST,1);
        if(isset($_GET) and is_array($_GET) )
        {
            $que = $_GET['search'];
            if($que['signup_city'])
            {
                $param['where']['signup_city'] = $que['signup_city'];
            }
            if($que['signup_country'])
            {
                $param['where']['signup_country'] = $que['signup_country'];
            }
            if($que['signup_gender'])
            {
                $param['where']['signup_gender'] = $que['signup_gender'];
            }
            //debug($param,1);
            $data['profile'] = $this->model_signup->find_all_active($param);
            $data['profile'] = array_chunk($data['profile'], 4);
            $this->load_view('index',$data);
        }   
    }
    public function save_messages()
    {
        global $config;
        //debug($_POST,1);
        $insert_params['chat_sender_id'] = $this->userid;
        $insert_params['chat_receiver_id'] = $_POST['receiver'];
        $insert_params['chat_msg'] = $_POST['msg'];
        $insert_params['chat_seen_status'] = 0;
        $insert_params['chat_status'] =1;

        $insert_id = $this->model_chat->insert_record($insert_params);
        if($insert_id>0)
        {
            $this->json_param['txt'] = 'Message Send';
            $this->json_param['status'] =1;
            echo json_encode($this->json_param);
        }
    }



    
}
