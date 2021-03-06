<?php
//application/models/Pics_model.php
class Pics_model extends CI_Model {
    
 
    public function get_pics($tags = FALSE)
    {
        //get tags from db
        if ($tags === FALSE)
        {
            $query = $this->db->get('ci_tags');
            return $query->result_array();
        }
        
        $api_key = 'b82a72ee50859bde1abec2d2e5bbe82f';
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $tags;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';
        $response = json_decode(file_get_contents($url));
        $pics = $response->photos->photo;
        
        return $pics;    
    }//end of get_pics
    
    public function set_pics()
    {
        $this->load->helper('url');
        $tags = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $tags,
            'text' => $this->input->post('text')
        );
        
        if($this->db->insert('ci_tags', $data))
        {   
         return $tags; 
        }else{//problem!
            return false;
        }
    }
        
}//end of class
