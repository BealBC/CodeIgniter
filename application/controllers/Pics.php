<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pics_model');
        $this->load->helper('url_helper');
        $this->config->set_item('banner', 'Pics Section');
    }//end __construct
    public function index() 
    {//will show categories of pictures
        
      
        //$data['tags'] = $this->pics_model->get_pics();
        $data['tags'] = 'Picture Categories';
            
        $this->config->set_item('tags', 'Pics');
        $this->load->view('pics/index', $data);  
      
        
    }//end index
    public function view($tags = NULL)
    {//will show pictures for one category only
    //$data['tags'] = $this->news_model->get_pics($tags);
       
        $data['pics'] = $this->pics_model->get_pics($tags);
        $data['title'] = 'Picture Categories';
            
        $this->config->set_item('title', 'Pics');
        $this->load->view('pics/view', $data);   
        //$this->config->set_item('title', $data['news_item']['title']);
    }//end view
    
    
}//end Pics class
