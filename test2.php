<?php 
// Output function 
function output($Return=array())
{
    /*Set response header*/

     @header('Cache-Control: no-cache, must-revalidate');
    @header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	@header("Access-Control-Allow-Origin: *");
	@header("Content-Type: application/json; charset=UTF-8");
    // /*Final JSON response*/
    
    exit(json_encode($Return));
    die;
}

if (isset($_REQUEST['tag']) && $_REQUEST['tag'] != '')
{
	require "db_functions.php";
	// creating db object 
	$db= new DB_Functions();
	
	//Getting The Request tag
	$tag=$_REQUEST['tag'];
	
	// Input Validator
	function safe_input($data) 
	{
	   $data=trim($data);
	   $data=stripslashes($data);
	   $data=htmlspecialchars($data);
	   return ucfirst($data);
	}
	
	// Output Array
	$response = array("tag" => $tag, "success" => 0, "error" => 0);
   
	/**
	 * Tag 1:
    * User addmanager
   **/
   
     //app banner _radio_images
	if($tag=="bannerimage")
  { 
       $newfilename = "appbanner.jpg";
       $imagepath="../images/shivaradio/".$newfilename;
       $banner_uploaded=move_uploaded_file($_FILES["bannerimage1"]["tmp_name"],$imagepath);
      
      //background_img
      
			if($banner_uploaded)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Banner Image Updated Successfully";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Updating Banner Image.";
				output($response);
			}
}
   
   //background_radio_images
	elseif($tag=="background_radio_images")
	{
       $newfilename = "app_background.jpg";
       $imagepath="../images/shivaradio/".$newfilename;
       $banner_uploaded=move_uploaded_file($_FILES["background_img"]["tmp_name"],$imagepath);
      
      //background_img
      
			if($banner_uploaded)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Background Image Updated Successfully";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Updating Image.";
				output($response);
			}
      
        
	}
  
//homeradio_images  
  elseif($tag=="homeradio_images")
  {  
     
       $newfilename = "shivaradiobanner.jpg";
       $imagepath="../images/shivaradio/".$newfilename;
       $banner_uploaded=move_uploaded_file($_FILES["bannerimage2"]["tmp_name"],$imagepath);
      
      //background_img
      
			if($banner_uploaded)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Home Banner Image Updated Successfully";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Updating Image.";
				output($response);
			}
     }      
      //  add_peace_channel
          elseif($tag=="add_peace_channel")
	{
		$chn_name=$_REQUEST['chn_name'];
		$chn_url=$_REQUEST['chn_url'];
 

     if($_FILES['banner_image']['name']!=='')
     {
       $image_name=$_FILES['banner_image']['name'];
       $temp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
       $imagepath="../images/shivaradio/".$newfilename;
       move_uploaded_file($_FILES["banner_image"]["tmp_name"],$imagepath);

      
			$save_info=$db->add_peace_channel($chn_name,$chn_url,$newfilename);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Channel Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     else
     {
         $newfilename="";
         	$save_info=$db->add_peace_channel($chn_name,$chn_url,$newfilename);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Channel Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     
	}
	
	//add_channel
    elseif($tag=="add_channel")
	{
		$chn_name=$_REQUEST['chn_name'];
		$chn_url=$_REQUEST['chn_url'];
        $stream=$_REQUEST['stream'];

     if($_FILES['banner_image']['name']!=='')
     {
       $image_name=$_FILES['banner_image']['name'];
       $temp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
       $imagepath="../images/shivaradio/".$newfilename;
       move_uploaded_file($_FILES["banner_image"]["tmp_name"],$imagepath);

      
			$save_info=$db->addchannel($chn_name,$chn_url,$stream,$newfilename);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Channel Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     else
     {
         $newfilename="";
         	$save_info=$db->addchannel($chn_name,$chn_url,$stream,$newfilename);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Channel Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     
	}
	
	
	//getPeacehannel
	
	 elseif($tag=="getPeacehannel")
	{
		$user_info=$db->getPeacehannel();
		output($user_info);
	}
	
	//getAllChannel
  elseif($tag=="getAllChannel")
	{
		$user_info=$db->getAllChannel();
		output($user_info);
	}
	
	//get_songs
	elseif($tag=="get_songs")
	{
		$user_info=$db->get_songs();
		output($user_info);
	}
//get_songs_in_jason
	elseif($tag=="get_songs_cat_in_jason")
	{
		$user_info=$db->get_songs_cat_in_jason();
		output($user_info);
	}

//getSondcatWiseInjason($cat)
	elseif($tag=="getSondcatWiseInjason")
	{
	    $cat=$_REQUEST['cat'];
		$user_info=$db->getSondcatWiseInjason($cat);
		output($user_info);
	}
	
	
	
	//getSondcatWiseInjason($cat)
	elseif($tag=="getVideoSondcatWiseInjason")
	{
	    $cat=$_REQUEST['cat'];
		$user_info=$db->getVideoSondcatWiseInjason($cat);
		output($user_info);
	}
	
	
//get_magazine_in_jason
	elseif($tag=="get_magazine_in_jason")
	{
	     $language=$_REQUEST['language'];
		$user_info=$db->get_magazine_in_jason($language);
		output($user_info);
	}
	//get_magazine_lang_in_jason
	elseif($tag=="get_magazine_lang_in_jason")
	{
		$user_info=$db->get_magazine_lang_in_jason();
		output($user_info);
	}
	
	
	//get_pmtv_live_in_jason
	elseif($tag=="get_pmtv_live_in_jason")
	{
		$user_info=$db->get_pmtv_live_in_jason();
		output($user_info);
	}
	
	
//del_song
elseif($tag=="del_song")
	{
		$id=$_REQUEST['id'];
		$request_info=$db->del_song($id);
		if($request_info['success']!=0)
		{
			$response["success"] = 1;
			$response["success_msg"] = "Song Deleted Successfully ";
			output($response);
			
		}
		else
		{
			$response["error"] = 1;
			$response["error_msg"] = "Error ....";
			output($response);
		}
	}
//del_song_cat
elseif($tag=="del_song_cat")
	{
		$id=$_REQUEST['id'];
		$request_info=$db->del_song_cat($id);
		if($request_info['success']!=0)
		{
			$response["success"] = 1;
			$response["success_msg"] = "Category Deleted Successfully ";
			output($response);
			
		}
		else
		{
			$response["error"] = 1;
			$response["error_msg"] = "Error ....";
			output($response);
		}
	}
		//del_channel
 		elseif($tag=="del_channel")
	{
		$id=$_REQUEST['id'];
		$request_info=$db->del_channel($id);
		if($request_info['success']!=0)
		{
			$response["success"] = 1;
			$response["success_msg"] = "Channel Deleted Successfully ";
			output($response);
			
		}
		else
		{
			$response["error"] = 1;
			$response["error_msg"] = "Error ....";
			output($response);
		}
	}

//del_peace_channel	
		elseif($tag=="del_peace_channel")
	{
		$id=$_REQUEST['id'];
		$request_info=$db->del_peace_channel($id);
		if($request_info['success']!=0)
		{
			$response["success"] = 1;
			$response["success_msg"] = "Channel Deleted Successfully ";
			output($response);
			
		}
		else
		{
			$response["error"] = 1;
			$response["error_msg"] = "Error ....";
			output($response);
		}
	}

	
	//edit_channel
	
	elseif($tag=="edit_channel")
	{
		$chn_name=$_REQUEST['chn_name'];
		$chn_url=$_REQUEST['chn_url'];
        $id=$_REQUEST['id'];
        


if($_REQUEST['stream']!=='')
{
   $stream=$_REQUEST['stream'];
         
}
else
{
  $stream="";
   
}
     if($_FILES['banner_image']['name']!=='')
     {
       $image_name=$_FILES['banner_image']['name'];
       $temp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
       $imagepath="../images/shivaradio/".$newfilename;
       move_uploaded_file($_FILES["banner_image"]["tmp_name"],$imagepath);

      
			$save_info=$db->edit_channel($chn_name,$chn_url,$stream,$newfilename,$id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Channel edited Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     else
     {
         $newfilename="";
         	$save_info=$db->edit_channel($chn_name,$chn_url,$stream,$newfilename,$id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Channel Edited Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     
	}
		//getShopUrl
	  elseif($tag=="getShopUrl")
	{
		$user_info=$db->getShopUrl();
		output($user_info);
	}
	//get_Shop_Url
	  elseif($tag=="get_Shop_Url")
	{
		$user_info=$db->get_Shop_Url();
		output($user_info);
	}
	
	//get_Shop_Url
	  elseif($tag=="get_pay_Url")
	{
		$user_info=$db->get_pay_Url();
		output($user_info);
	}
	//get_bk_songs_cat
	 elseif($tag=="get_bk_songs_cat")
	{
		$user_info=$db->get_bk_songs_cat();
		output($user_info);
	}
	
	
	
	//edit_shopping
		elseif($tag=="edit_shopping")
	{
		$chn_name=$_REQUEST['name'];
		$chn_url=$_REQUEST['url'];
        $id=$_REQUEST['id'];
   
			$save_info=$db->edit_shopping($chn_name,$chn_url,$id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Shopping info edited Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error...";
				output($response);
			}
   
     
     
	}
	
	
	
//add_song
    elseif($tag=="add_song")
	{
		$type=$_REQUEST['type'];
		$text=$_REQUEST['text'];
        $url=$_REQUEST['url'];
        $cat=$_REQUEST['cat'];
 
			$save_info=$db->add_song($type,$text,$url,$cat);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Song Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     
     
     
     	
	
//add_category
    elseif($tag=="add_category")
	{
	
        $cat=$_REQUEST['cat'];
 
			$save_info=$db->add_category($cat);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Category Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     
	
	
	
		//edit_songs
	
	elseif($tag=="edit_song")
	{
		$text=$_REQUEST['text'];
		$url=$_REQUEST['url'];
        $id=$_REQUEST['id'];
        $type=$_REQUEST['type'];
         $cat=$_REQUEST['cat'];
      
			$save_info=$db->edit_song($text,$url,$type,$cat,$id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Song edited Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     
	}
	
	
	//edit_song_cat
	elseif($tag=="edit_song_cat")
	{
	
        $id=$_REQUEST['id'];
         $cat=$_REQUEST['cat'];
      
			$save_info=$db->edit_song_cat($cat,$id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Category edited Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     
	}
	
	
	
	

	elseif($tag=="add_magazine")
	{
	
         $title=$_REQUEST['title'];
        // $url=$_REQUEST['url'];
    $newfilename=$_REQUEST['banner_image'];
$language=$_REQUEST['language'];

      
			$save_info=$db->add_magazine($title,$newfilename,$language);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Magazine added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     
   
     
	}
	
	//get_magazine
	elseif($tag=="get_magazine")
	{
		$user_info=$db->get_magazine();
		output($user_info);
	}
	
	//del_magazine
		elseif($tag=="del_magazine")
	{
	
         
        $id=$_REQUEST['id'];
			$save_info=$db->del_magazine($id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " deleted Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}
	
	
// 	//edit_Magazine
	
		elseif($tag=="edit_Magazine")
	{
	
         
        $id=$_REQUEST['id'];
        $title=$_REQUEST['title'];
        $url=$_REQUEST['url'];
        $newfilename=$_REQUEST['banner_image'];
         $language=$_REQUEST['language'];

      
			$save_info=$db->edit_Magazine($id,$title,$url,$newfilename,$language);
			if($save_info["success"]==1)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Magazine Updates Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     
     
	}
	
	//add_language
	elseif($tag=="add_language")
	{
	
         $lang=$_REQUEST['lang'];
      
      
			$save_info=$db->add_language($lang);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Language added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error ......";
				output($response);
			}
     
   
     
	}
	
	
	//get_magazin_lang
	
	elseif($tag=="get_magazin_lang")
	{
		$user_info=$db->get_magazin_lang();
		output($user_info);
	}
	
	//del_magazine_lang
			elseif($tag=="del_magazine_lang")
	{
	
         
        $id=$_REQUEST['id'];
			$save_info=$db->del_magazine_lang($id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " deleted Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}
	
	//add_pmtv_live_channel

    elseif($tag=="add_pmtv_live_channel")
	{
		$chn_name=$_REQUEST['chn_name'];
		$chn_url=$_REQUEST['chn_url'];
     
			$save_info=$db->add_pmtv_live_channel($chn_name,$chn_url);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Added  Channel Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
     
     
     //	//getPmtvliveehannel
	 elseif($tag=="getPmtvliveehannel")
	{
		$user_info=$db->getPmtvliveehannel();
		output($user_info);
	}
	
  	//del_pmtv_channel
			elseif($tag=="del_pmtv_channel")
	{
	
         
        $id=$_REQUEST['id'];
			$save_info=$db->del_pmtv_channel($id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " deleted Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}   
//add_pmtv_slider
  elseif($tag=="add_pmtv_slider")
	{
		$audio_url=$_REQUEST['audio_url'];
		$img_url=$_REQUEST['img_url'];
     
			$save_info=$db->add_pmtv_slider($audio_url,$img_url);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Slider Added Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Adding Channel.";
				output($response);
			}
     }
	//getpmtvslider
		
	elseif($tag=="getpmtvslider")
	{
		$user_info=$db->getpmtvslider();
		output($user_info);
	}
	
	//del_slider
	elseif($tag=="del_slider")
	{
        $id=$_REQUEST['id'];
			$save_info=$db->del_slider($id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " deleted Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}   
	//get_slider_audio_in_jason
	elseif($tag=="get_slider_audio_in_jason")
	{
		$user_info=$db->get_slider_audio_in_jason();
		output($user_info);
	}

//get_slider_img_in_jason
	elseif($tag=="get_slider_img_in_jason")
	{
	    
		$user_info=$db->get_slider_img_in_jason();
		output($user_info);
	}
	

	//add_ss_img
	elseif($tag=="add_ss_img")
	{
        $img=$_REQUEST['img'];
			$save_info=$db->add_ss_img($img);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Updated Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}  
		//get_ss_img
		elseif($tag=="get_ss_img")
	{
		$user_info=$db->get_ss_img();
		output($user_info);
	}
	
	//add_main_banner_img
		elseif($tag=="add_main_banner_img")
	{
        $img=$_REQUEST['banner_img'];
			$save_info=$db->add_main_banner_img($img);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Updated Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}  
		//get_main_bnr_img
		elseif($tag=="get_main_bnr_img")
	{
		$user_info=$db->get_main_bnr_img();
		output($user_info);
	}
	
	
	
		//add_ss_img_bk
	elseif($tag=="add_ss_img_bk")
	{
        $img=$_REQUEST['img'];
			$save_info=$db->add_ss_img_bk($img);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Updated Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}  
		//get_ss_img_bk
		elseif($tag=="get_ss_img_bk")
	{
		$user_info=$db->get_ss_img_bk();
		output($user_info);
	}
	
	//add_main_banner_img_bk
		elseif($tag=="add_main_banner_img_bk")
	{
	    
        $img=$_REQUEST['banner_img'];
			$save_info=$db->add_main_banner_img_bk($img);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Updated Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}  
		//get_main_bnr_img_bk
		elseif($tag=="get_main_bnr_img_bk")
	{
		$user_info=$db->get_main_bnr_img_bk();
		output($user_info);
	}
	
		//add_player_img
	elseif($tag=="add_player_img")
	{
	
       $newfilename = "player_img.jpg";
       $imagepath="../images/magazine/".$newfilename;
       $banner_uploaded=move_uploaded_file($_FILES["file"]["tmp_name"],$imagepath);
      
      //background_img
      
			if($banner_uploaded)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Player Image Updated Successfully";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Updating Image.";
				output($response);
			}
        
       
	}
	
	//diya gyan player_img
    elseif($tag=="divya_player_img")
	{
	if($_FILES['file']['name']!='')
	   {
       $newfilename = "dvplayerimg.jpg";
       $imagepath="../images/".$newfilename;
       $banner_uploaded=move_uploaded_file($_FILES["file"]["tmp_name"],$imagepath);
      
      //background_img
      
			if($banner_uploaded)
			{
				$response["success"] = 1;
				$response["success_msg"] = "Player Image Updated Successfully";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error in Updating Image.";
				output($response);
			}
        }
       else
			{
				$response["error"] = 1;
				$response["error_msg"] = "file not exist.";
				output($response);
			}
        
        
	}
	
	
	
//add_youtube_url
		elseif($tag=="add_youtube_url")
	{
	    
        $app_name=$_REQUEST['app_name'];
        $title=$_REQUEST['title'];
        $url=$_REQUEST['url'];
        if($_REQUEST['app_name']=='SHIVA RADIO')
        {
         $status=1;
        }
        if($_REQUEST['app_name']=='BRAHMA KUMARIS LIVE')
        {
         $status=2;
        }
        elseif($_REQUEST['app_name']=='PEACE MUSIC')
        {
          $status=3;  
        }
         elseif($_REQUEST['app_name']=='PRIME TV SHOPPING')
        {
          $status=4;  
        }
         elseif($_REQUEST['app_name']=='PEACE MUSIC STUDIO')
        {
          $status=5;  
        }
         elseif($_REQUEST['app_name']=='DIVYA GYAN')
        {
          $status=6;  
        }
         elseif($_REQUEST['app_name']=='PMTV LIVE APP')
        {
          $status=7;  
        }
        
    
			$save_info=$db->add_youtube_url($app_name,$title,$url,$status);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Updated Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}  
	
	
	//add_youtube_url
	elseif($tag=="getyoutubeurls")
	{
	    $status=$_REQUEST['status'];
		$user_info=$db->get_youtube_url($status);
		output($user_info);
	}
	
		//add_youtube_url
	elseif($tag=="getallyoutubeurls")
	{
		$user_info=$db->getallyoutubeurls();
		output($user_info);
	}
	//delete_youtube_url
	
	elseif($tag=="delete_youtube_url")
	{
	        $id=$_REQUEST['id'];
			$save_info=$db->delete_youtube_url($id);
			if($save_info)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Deleted Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}
	
	

		
//add_live_audio_bk_new
	elseif($tag=="add_live_audio_bk_new")
	{
        $channel_name=$_REQUEST['channel_name'];
        $channel_url=$_REQUEST['channel_url'];
        $channel_file=$_REQUEST['channel_file'];
	


       $newfilename = date('dmYHis').rand().".jpg";
       $imagepath="../images/live_audio_channel/".$newfilename;
       $banner_uploaded=move_uploaded_file($_FILES["channel_file"]["tmp_name"],$imagepath);
     
        $user_info=$db->add_live_audio_bk_db($channel_name,$channel_url,$newfilename);
     	if($user_info['success']==1)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Updated Successfully";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error .";
				output($response);
			}
 		
       
	}
	
	
	//get_live_audio_bk_db
	elseif($tag=="get_live_audio_bk_db")
	{
		$user_info=$db->get_live_audio_bk_db();
		output($user_info);
	}
	
	
		elseif($tag=="delete_live_audio_bk_db")
	{
	        $id=$_REQUEST['id'];
			$save_info=$db->delete_live_audio_bk_db($id);
			if($save_info['success']==1)
			{
				$response["success"] = 1;
				$response["success_msg"] = " Deleted Successfully ";
				output($response);
			}
			else
			{
				$response["error"] = 1;
				$response["error_msg"] = "Error.";
				output($response);
			}
     
	}
	
	
	else
	{
		output($response);
	}
}
else
{
	echo "Unauthorized Access.";
}
?>
