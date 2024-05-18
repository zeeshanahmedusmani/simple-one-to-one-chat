<?
class Model_chat extends MY_Model {
  
    /**
     * TKD chat MODEL
     *
     * @package     chat Model
     * 
     * @version     2.0
     * @since       2015 
     */

    protected $_table    = 'chat';
    protected $_field_prefix    = 'chat_';
    protected $_pk    = 'chat_id';
    protected $_status_field    = '';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "chat_id,chat_receiver_id,chat_sender_id,chat_status";
        parent::__construct();
    }

    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * attributes  HTML Field Attributes
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules*/
 

    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'chat_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'chat_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
              

              'chat_sender_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'chat_sender_id',
                     'label'   => 'Sender',
                     'type'   => 'text',
                     'type_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'js_rules'   => 'requied',
                     'rules'   => 'required|htmlentities'
                  ),
              'chat_receiver_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'chat_receiver_id',
                     'label'   => 'Receiver',
                     'type'   => 'text',
                     'type_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'js_rules'   => 'requied',
                     'rules'   => 'required|htmlentities'
                  ),
              

              'chat_msg' => array(
                     'table'   => $this->_table,
                     'name'   => 'chat_msg',
                     'label'   => 'Message',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim'
                  ),


       

			
             // 'chat_attachment' => array(
             //         'table'   => $this->_table,
             //         'name'   => 'chat_attachment',
             //         'label'   => 'Attachment',
             //         'name_path'   => 'chat_attachment_path',
             //         'upload_config'   => 'site_upload_chat',
             //         'type'   => 'fileupload',
             //         'type_dt'   => 'Attachment',
             //         'randomize' => true,
             //         'preview'   => 'true',
             //         'attributes'   => array(
             //        'image_size_recommended'=>'528px × 410px',
             //        'allow_ext'=>'png|jpeg|jpg',
             //    ),
             //         'dt_attributes'   => array("width"=>"10%"),
             //         'rules'   => 'trim|htmlentities'
             //      ),

   
              'chat_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'chat_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                 'list_data' => array( 
                                  
                                    ) ,
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),
              
            );

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;

    }

}
?>