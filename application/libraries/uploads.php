<?php

  class Uploads {
  
    
     var $gallery_path;
     
      
      public function do_upload($path, $namaFile)
      {
      
	 $CI =& get_instance();
	 $CI->load->library('session');
	 $this->gallery_path = realpath(APPPATH . '../'.$path);
	 $this->galleryThumbs= realpath(APPPATH . '../'.$path);
	 $name = $_FILES['userfile']['name'];
	 $file_name = $CI->session->userdata('nama_file');
	  $config = array(
	    'allowed_types'	=> 'jpg|jpeg|gif|png|bmp',
	    'upload_path'	=> $this->gallery_path,
	    'max_size'		=> 7000,
		'max_width'  => '6600',
		'max_height'  => '4200',
		'file_name'	=> $namaFile,
		'remove_spaces' => TRUE,
	);
	
	$CI->load->library('upload', $config);
	if ($CI->upload->do_upload())
	{
	
				//create thumbnail image with size 
				$image = $CI->upload->data();
				$newImage = $this->galleryThumbs.'/thumb_'.$image['file_name'];
				$configThumb = array(
					'image_library'	=> 'gd2',
					'source_image'	=> $image['full_path'],
					'maintain_ratio'=> TRUE,
					'width'			=> 600,
					'height'		=> 400,
					'new_image'		=> $newImage
				);
				$CI->load->library('image_lib', $configThumb);
				$CI->image_lib->resize();
				
	
			$filename = $CI->upload->file_name;
			return TRUE;
		
	}
	else
	{
	    return FALSE;
	}
	
	
	  
      }
  
  }

?>
