<?php 
/*
*	STEP 3
*   All database handling functions
*/

class DB_Functions
{


	private $db;
	
	function __construct()
	{
		// require db connection file
		require "DB_Connect.php";
		// creating obj;
		$this->db=new DB_CONNECT();
		$this->db->connect();
	}
	
	function __destruct(){
	}
	

	/**
     * Admin Login
    **/
	
    public function adminLogin($username,$password) 
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"SELECT * FROM admin_credential WHERE username='".$username."' and password='".$password."' ");
		if($result)
		{
			// check for result 
			$no_of_rows = mysqli_num_rows($result);
			if ($no_of_rows ==1) 
			{
				 // user authentication details are correct
				 $result = mysqli_fetch_array($result);
				 return $result;
			} else {
				// user not found
				return false;
			}
		}
		else
		{
			return false;
		}
    }
	
    
  	/**
     * Add chnnel
    **/
	
    public function addchannel($chn_name,$chn_url,$stream,$newfilename)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into br_pmtv(channel_name,channel_url,stream_type,icon_url) values('".$chn_name."','".$chn_url."','".$stream."','".$newfilename."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
	
	
	//add_peace_channel
		
    public function add_peace_channel($chn_name,$chn_url,$newfilename)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into br_pm(channel_name,channel_url,icon_url) values('".$chn_name."','".$chn_url."','".$newfilename."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
	
	
	 //getAllChannel  
 
    public function getAllChannel()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from br_pmtv order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				$result['edit']="<a href='edit_channel.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
			     $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_channel(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			  	
					$result['image']="<a href='images/shivaradio/".$result['icon_url']."' class='lightbox' ><img src='images/shivaradio/".$result['icon_url']."' class='img-media'></a>";
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   	 //getPeacehannel  
 
    public function getPeacehannel()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from br_pm order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				// $result['edit']="<a href='edit_channel.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
			     $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_peace_channel(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			  	
					$result['image']="<a href='images/shivaradio/".$result['icon_url']."' class='lightbox' ><img src='images/shivaradio/".$result['icon_url']."' class='img-media'></a>";
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   
   //remove_channel
  
    public function del_channel($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from br_pmtv where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
   
   
    //del_peace_channel
  
    public function del_peace_channel($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from br_pm where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
   
   
    //get_channel_by_id 
   public function get_channel_by_id($id)
   {
	    $array=array();
	    $query=mysqli_query($this->db->connect(),"select * from br_pmtv where id='".$id."' ");
		 $num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
			$result=mysqli_fetch_assoc($query);
			return $result;
			
		}
		else
		{
            return $array;
        }
   }
   
   	/**
     * Add chnnel
    **/
	
    public function edit_channel($chn_name,$chn_url,$stream,$newfilename,$id)
	{
	    $array=array("error"=>0,"success"=>0);
		$conn=$this->db->connect();
		
		if($newfilename!="" && $stream!=="")
		{
        $query = mysqli_query($conn,"update br_pmtv set channel_name='".$chn_name."',channel_url='".$chn_url."',stream_type='".$stream."',icon_url='".$newfilename."'  where id='".$id."' ");
		}
		elseif($newfilename!="" && $stream=="")
		{
		   $query = mysqli_query($conn,"update br_pmtv set channel_name='".$chn_name."',channel_url='".$chn_url."',icon_url='".$newfilename."'  where id='".$id."' ");
	   
		}
		elseif($newfilename=="" && $stream!=="")
		{
		      $query = mysqli_query($conn,"update br_pmtv set channel_name='".$chn_name."',channel_url='".$chn_url."',stream_type='".$stream."'  where id='".$id."' ");
	
		}
		elseif($newfilename=="" && $stream=="")
		{
		       $query = mysqli_query($conn,"update br_pmtv set channel_name='".$chn_name."',channel_url='".$chn_url."'  where id='".$id."' ");
	
		}
		
		if($query)
		{
				$array['success']=1;
			
		}
		else
		{
				$array['error']=1;
		} 
		return $array;
    }
   
   
   //getShopUrl
    
    public function getShopUrl()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from shopping");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				 $result['edit']="<a href='edit_shopping.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
			         
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
    //get_Shop_Url
    
    public function get_Shop_Url()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from shopping where id='1' ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
    //get_pay_Url
    
    public function get_pay_Url()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from shopping where id='2' ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   //get_shop_by_id
  
   public function get_shop_by_id($id)
   {
	    $array=array();
	    $query=mysqli_query($this->db->connect(),"select * from shopping where id='".$id."' ");
		 $num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
			$result=mysqli_fetch_assoc($query);
			return $result;
			
		}
		else
		{
            return $array;
        }
   }
   
   //edit_shopping
    public function  edit_shopping($chn_name,$chn_url,$id)
	{
	    $array=array("error"=>0,"success"=>0);
		$conn=$this->db->connect();
		
        $query = mysqli_query($conn,"update shopping set shop_name='".$chn_name."',shop_url='".$chn_url."'  where id='".$id."' ");
		if($query)
		{
		$array['success']=1;
		}
		else
		{
		$array['error']=1;
		} 
		return $array;
    }
    
    
     	/**
     * add_song
    **/
	
    public function add_song($type,$text,$url,$cat)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into bk_songs(type,text,url,cat) values('".$type."','".$text."','".$url."','".$cat."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
   
   
   	 //get_songs  
 
    public function get_songs()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from bk_songs order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				$result['edit']="<a href='edit_songs.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
			     $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_song(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			  	
					$result['image']="<a href='images/bk_songs/".$result['icon_url']."' class='lightbox' ><img src='images/bk_songs/".$result['icon_url']."' class='img-media'></a>";
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   
     //del_peace_channel
  
    public function del_song($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from bk_songs where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
   
   
     //get_song_by_id 
   public function get_song_by_id($id)
   {
	    $array=array();
	    $query=mysqli_query($this->db->connect(),"select * from bk_songs where id='".$id."' ");
		 $num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
			$result=mysqli_fetch_assoc($query);
			return $result;
			
		}
		else
		{
            return $array;
        }
   }
   
   
   //
      	/**
     * edit_song
    **/
	
    public function edit_song($text,$url,$type,$cat,$id)
	{
	    $array=array("error"=>0,"success"=>0);
		$conn=$this->db->connect();
		
		if($cat!="" && $type!="")
		{
        $query = mysqli_query($conn,"update bk_songs set text='".$text."',url='".$url."',type='".$type."',cat='".$cat."'  where id='".$id."' ");
		}
		elseif($cat!="" && $type=="")
		{
		   $query = mysqli_query($conn,"update bk_songs set text='".$text."',url='".$url."',cat='".$cat."'  where id='".$id."' ");
	   
		}
		elseif($cat=="" && $type!=="")
		{
		      $query = mysqli_query($conn,"update bk_songs set text='".$text."',url='".$url."',type='".$type."'  where id='".$id."' ");
	
		}
		elseif($cat=="" && $type=="")
		{
		       $query = mysqli_query($conn,"update bk_songs set text='".$text."',url='".$url."'  where id='".$id."' ");
	
		}
		
		if($query)
		{
				$array['success']=1;
			
		}
		else
		{
				$array['error']=1;
		} 
		return $array;
    }
    
    
   
   //add_category($cat)
   public function add_category($cat)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into bks_cat(cat) values('".$cat."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
    
    
//get_bk_songs_cat  
  public function get_bk_songs_cat()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from bks_cat order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				  $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_song_cat(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			      $result['edit']="<a href='edit_song_cat.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
		
				
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   
//del_song_cat
public function del_song_cat($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from bks_cat where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
   
   
    	 //get_songs  
 
    public function get_bksongs_category()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from bks_cat ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
						     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   
   //get_bksong_cat_by_id
   public function get_bksong_cat_by_id($id)
   {
	    $array=array();
	    $query=mysqli_query($this->db->connect(),"select * from bks_cat where id='".$id."' ");
		 $num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
			$result=mysqli_fetch_assoc($query);
			return $result;
			
		}
		else
		{
            return $array;
        }
   }
    
    
//edit_song_cat($cat,$id);    
   public function edit_song_cat($cat,$id)
   {
	    $array=array();
	    $query=mysqli_query($this->db->connect(),"update bks_cat set cat='".$cat."' where id='".$id."' ");
		if($query)
		{
				$array['success']=1;
			
		}
		else
		{
				$array['error']=1;
		} 
		return $array;
   }
   
   
  
     //get_songs_cat_in_jason 
 
    public function get_songs_cat_in_jason()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from bks_cat ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
     
     
     //  //getSondcatWiseInjason 
 
    public function getSondcatWiseInjason($cat)
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from bk_songs where cat='".$cat."' and type='audio' ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
    
    
  //getVideoSondcatWiseInjason 
    public function getVideoSondcatWiseInjason($cat)
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from bk_songs where cat='".$cat."' and type='video' ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
    
    //add_magazine 
      public function add_magazine($title,$newfilename,$language)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into magazine(title,image,language) values('".$title."','".$newfilename."','".$language."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
   
    //get_magazine
    
     public function get_magazine()
  {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine order by title asc");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{

					
					$result['imageview']="<a href='".$result['image']."' target='_blank' ><img style='height:50px;width:50px;' src='".$result['image']."' ></a>";
 			
                 $result['add_chapter']="<a href='add_chapter.php'><button type='button' class='btn btn-info'>Add Chapter</button></a>";
 				 $result['edit']="<a href='edit_magazine.php?id=".$result['id']." '><button type='button' class='btn btn-success'>Edit</button></a>";
			      $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_magazine(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			  
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
  }
     

   
   
  //del_magazine
  public function  del_magazine($id)
  {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from magazine where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
  }
   
   
   
 //get_magazine_by_id
  public function get_magazine_by_id($id)
  {
	    $array=array();
	    $query=mysqli_query($this->db->connect(),"select * from  magazine where id='".$id."' ");
		 $num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
			$result=mysqli_fetch_assoc($query);
			return $result;
			
		}
		else
		{
            return $array;
        }
  } 
   
   
  //edit_Magazine
  public function edit_Magazine($id,$title,$url,$newfilename,$language)
  {
	    $array=array("success"=>0,"error"=>0);
	    if($language!="")
	    {
	    $query=mysqli_query($this->db->connect(),"update magazine set title='".$title."',image='".$newfilename."',language='".$language."' where id='".$id."' ");
	    }
	    else
	    {
	   $query=mysqli_query($this->db->connect(),"update magazine set title='".$title."',image='".$newfilename."' where id='".$id."' ");
	    }
	
    	if($query)
		{
				$array['success']=1;
			
		}
		else
		{
				$array['error']=1;
		} 
		return $array;
  }
   
  
     //get_magazine_in_jason 
 
    public function get_magazine_in_jason($language)
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine where language='".$language."' order by title asc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   } 
   
   //get_magazine_lang_in_jason
      public function get_magazine_lang_in_jason()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from  magazine_languages ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   } 
      //add_magazine 
      public function add_language($lang)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into magazine_languages(language) values('".$lang."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
  
   
   
       //get_magazine
    
     public function get_magazin_lang()
  {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine_languages order by id desc");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{

				 $result['edit']="<a href='edit_magazine_lang.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
			      $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_magazine_lang(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			  
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
  }
   
   //del_magazine_lang
    public function  del_magazine_lang($id)
  {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from magazine_languages where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
  }
   
   
     	 //get_mag_lang  
 
    public function get_mag_lang()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine_languages ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
						     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   	//add_peace_channel
		
    public function add_pmtv_live_channel($chn_name,$chn_url)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into pmtv_live(title,url,status) values('".$chn_name."','".$chn_url."','1') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
	
	
	 //getAllChannel  
 
    public function getPmtvliveehannel()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from pmtv_live order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				// $result['edit']="<a href='edit_channel.php?id=".urlencode($result['id'])." '><button type='button' class='btn btn-success'>Edit</button></a>";
			     $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_pmtv_channel(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			 // 	
				// 	$result['image']="<a href='images/shivaradio/".$result['icon_url']."' class='lightbox' ><img src='images/shivaradio/".$result['icon_url']."' class='img-media'></a>";
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
//del_pmtv_channel   
     public function del_pmtv_channel($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from pmtv_live where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
  //get_pmtv_live_in_jason 
     public function get_pmtv_live_in_jason()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from pmtv_live order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   } 
   
   
   //add_magazine_chapter
    public function add_magazine_chapter($title,$audio_url,$icon_url,$id)
	{
		$conn=$this->db->connect();
        $result = mysqli_query($conn,"insert into magazine_chapter(title,image_url,audio_url,magzine_id,status) values('".$title."','".$icon_url."','".$audio_url."','".$id."','1') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
	
	
	//get_chapter
  public function get_chapter()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine_chapter order by magzine_id asc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				    $query2=mysqli_query($this->db->connect(),"select * from  magazine where id ='".$result['magzine_id']."' ");
	                $result2=mysqli_fetch_assoc($query2);
				    $result['magzine_name']=$result2['title']." (".$result2['language']." )" ;
			     $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_chapter(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
				     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   

	
	//get_umid_chapter
	public function get_umid_chapter($mid)
	{
		 $userRecord=array();
		 $query=mysqli_query($this->db->connect(),"select * from magazine_chapter where magzine_id='".$mid."' order by magzine_id asc ");
		 if($query)
		 {
			 $num_of_rows=mysqli_num_rows($query);
			 if($num_of_rows==0)
			 {
				 return $userRecord;
			 }
			 else{
				 while($result=mysqli_fetch_assoc($query))
				 {
					 $query2=mysqli_query($this->db->connect(),"select * from  magazine where id ='".$result['magzine_id']."' ");
					 $result2=mysqli_fetch_assoc($query2);
					 $result['magzine_name']=$result2['title']." (".$result2['language']." )" ;
				  $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_chapter(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
					  
					 array_push($userRecord,$result);
				 }
				 return $userRecord;
			 }
		 }
		 else
		 {
			  return $userRecord;
		 }
	}
	


   //del_chapter
   //del_chapter   
     public function del_chapter($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from magazine_chapter where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
   
   //get_magazine_chapter_in_jason
      public function get_magazine_chapter_in_jason($id)
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine_chapter where magzine_id='".$id."' order by id asc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   
   //get_chapter_data_in_jason($id);
   public function get_chapter_data_in_jason($id)
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from magazine_chapter where id='".$id."' ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   //add_pmtv_slider
   
     public function add_pmtv_slider($audio_url,$img_url)
	{
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into pmtv_slider(audio_url,file_url) values('".$audio_url."','".$img_url."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
    //getpmtvslider
	 public function getpmtvslider()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from  pmtv_slider order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
			
			     $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_slider(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
				     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   //del_slider
       public function del_slider($id)
   {
	     $array=array("error"=>0,"success"=>0);
        
	    $query=mysqli_query($this->db->connect(),"delete from pmtv_slider where id='".$id."' ");
		if($query)
		{
			$array['success']=1;
			
		} 
		else
		{
          	$array['error']=1; 
        }
         return $array;
   }
   
   
     //get_slider_audio_in_jason
	 public function get_slider_audio_in_jason()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select audio_url from pmtv_slider ");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
   }
     //get_slider_img_in_jason
	 public function get_slider_img_in_jason()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select file_url from pmtv_slider ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }
   
   //add_ss_img($img)
      public function add_ss_img($img)
	{
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"update magazine_ss set img='".$img."' where id='1' and type='mg_ss_img'  ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
    //get_ss_img
   	 public function get_ss_img()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select img from magazine_ss where id='1' and type='mg_ss_img' ");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
   }
   
   //add_main_banner_img($img);
      public function add_main_banner_img($img)
	{
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"update magazine_ss set img='".$img."' where id='2' and type='mg_main_img'  ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
   //get_main_bnr_img 
     	 public function get_main_bnr_img()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select img from magazine_ss where id='2'and type='mg_main_img'  ");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
   }
   
   
     //add_ss_img_bk($img)
      public function add_ss_img_bk($img)
	{
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"update magazine_ss set img='".$img."' where id='3' and type='bkss_img' " );
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
    //get_ss_img
   	 public function get_ss_img_bk()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select img from magazine_ss where id='3' and type='bkss_img'");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
   }
   
   //add_main_banner_img_bk
      public function add_main_banner_img_bk($img)
	{
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"update magazine_ss set img='".$img."' where id='4' and type='bk_main_img' ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
   //get_main_bnr_img_bk 
     	 public function get_main_bnr_img_bk()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select img from magazine_ss where id='4' and type='bk_main_img' ");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
   }
   
   //get_peace_music_studio_img
      public function get_peace_music_studio_img($id)
	{
	     $userRecord=array();
		$conn=$this->db->connect();
		$set_array=array();
        $query = mysqli_query($conn,"select img from magazine_ss where id='".$id."' " );
	    $result=mysqli_fetch_assoc($query);
		
		return $result;
				
			
		
    }
	
	  //add_youtube_url
     public function add_youtube_url($app_name,$title,$url,$status) 
	{
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into  youtube_url(app_name,title,url,status) values('".$app_name."','".$title."','".$url."','".$status."') ");
		if($result)
		{
				return true;
			
		}
		else
		{
			return false;
		}
    }
    
    
//getallyoutubeurls 
public function getallyoutubeurls()
{
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from youtube_url order by app_name asc ");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					  $result['delete']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_url(`'.$result['id'].'`)">Delete</a>';   
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
		
}

//get_youtube_url 
public function get_youtube_url($status)
{
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from youtube_url where status='".$status."' order by id desc ");
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows!=0)
			{
			
				while($result=mysqli_fetch_assoc($query))
				{
					     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		
		else
		{
			 return $userRecord;
		}
		
}

//delete_youtube_url
public function delete_youtube_url($id)
{
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"delete from youtube_url where id='".$id."' ");
			if($query)
			{
			
				
				return true;
			}
		
		else
		{
			 return false;
		}
		
}


/**
 * add_video
 */
public function add_video($title,$language,$newfilename) 
	{
		$array=array("error"=>0,"success"=>0);
        
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into va_app_lang(title,language,image,status) values('".$title."','".$language."','".$newfilename."','1') ");
		if($result)
		{
		 $array['success']=1;
			
		}
		else
		{
			$array['error']=1;
		}
		return $array;
    }

/**
 * get_video
 */
   
 public function get_video()
 {
	   $userRecord=array();
	   $query=mysqli_query($this->db->connect(),"select * from va_app_lang where status='1' order by language asc");
	   if($query)
	   {
		   $num_of_rows=mysqli_num_rows($query);
		   if($num_of_rows==0)
		   {
			   return $userRecord;
		   }
		   else{
			   while($result=mysqli_fetch_assoc($query))
			   {

				$result['img']="<a href='images/video_app/".$result['image']."' class='lightbox' ><img src='images/video_app/".$result['image']."' class='img-media'></a>";
				$result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_video_lang(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			 
				   array_push($userRecord,$result);
			   }
			   return $userRecord;
		   }
	   }
	   else
	   {
			return $userRecord;
	   }
 }
	
/**
 * del_video_lang
 */
public function del_video_lang($id)
{ 
	$array=array("error"=>0,"success"=>0);
       
	    $query=mysqli_query($this->db->connect(),"delete from va_app_lang where id='".$id."' and status='1' ");
			if($query)
			{
				$array['success']=1;
			}
		
		else
		{
			$array['error']=1;
		}
		return $array;
}



/**
 * add_video_channel
 */
public function add_video_channel($title,$language,$url) 
	{
		$array=array("error"=>0,"success"=>0);
        
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into va_apps_channel(title,language,url,status) values('".$title."','".$language."','".$url."','1') ");
		if($result)
		{
		 $array['success']=1;
			
		}
		else
		{
			$array['error']=1;
		}
		return $array;
    }

/**
 * get_video_cahnnel
 */
   
 public function get_video_cahnnel()
 {
	   $userRecord=array();
	   $query=mysqli_query($this->db->connect(),"select * from va_apps_channel where status='1' order by language asc");
	   if($query)
	   {
		   $num_of_rows=mysqli_num_rows($query);
		   if($num_of_rows==0)
		   {
			   return $userRecord;
		   }
		   else{
			   while($result=mysqli_fetch_assoc($query))
			   {

					$result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_video_channel(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			 
				   array_push($userRecord,$result);
			   }
			   return $userRecord;
		   }
	   }
	   else
	   {
			return $userRecord;
	   }
 }
	
/**
 * del_video_lang
 */
public function del_video_channel($id)
{ 
	$array=array("error"=>0,"success"=>0);
       
	    $query=mysqli_query($this->db->connect(),"delete from va_apps_channel where id='".$id."' and status='1' ");
			if($query)
			{
				$array['success']=1;
			}
		
		else
		{
			$array['error']=1;
		}
		return $array;
}




/**
 * add_audio
 */
public function add_audio($title,$language,$newfilename) 
	{
		$array=array("error"=>0,"success"=>0);
        
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into va_app_lang(title,language,image,status) values('".$title."','".$language."','".$newfilename."','2') ");
		if($result)
		{
		 $array['success']=1;
			
		}
		else
		{
			$array['error']=1;
		}
		return $array;
    }

/**
 * get_audio
 */
   
 public function get_audio()
 {
	   $userRecord=array();
	   $query=mysqli_query($this->db->connect(),"select * from va_app_lang where status='2' order by language asc");
	   if($query)
	   {
		   $num_of_rows=mysqli_num_rows($query);
		   if($num_of_rows==0)
		   {
			   return $userRecord;
		   }
		   else{
			   while($result=mysqli_fetch_assoc($query))
			   {

				$result['img']="<a href='images/video_app/".$result['image']."' class='lightbox' ><img src='images/video_app/".$result['image']."' class='img-media'></a>";
				$result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_audio_lang(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			 
				   array_push($userRecord,$result);
			   }
			   return $userRecord;
		   }
	   }
	   else
	   {
			return $userRecord;
	   }
 }
	
/**
 * del_audio_lang
 */
public function del_audio_lang($id)
{ 
	$array=array("error"=>0,"success"=>0);
       
	    $query=mysqli_query($this->db->connect(),"delete from va_app_lang where id='".$id."' and status='2' ");
			if($query)
			{
				$array['success']=1;
			}
		
		else
		{
			$array['error']=1;
		}
		return $array;
}



/**
 * add_audio_channel
 */
public function add_audio_channel($title,$language,$url) 
	{
		$array=array("error"=>0,"success"=>0);
        
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into va_apps_channel(title,language,url,status) values('".$title."','".$language."','".$url."','2') ");
		if($result)
		{
		 $array['success']=1;
			
		}
		else
		{
			$array['error']=1;
		}
		return $array;
    }

/**
 * get_audio_cahnnel
 */
   
 public function get_audio_cahnnel()
 {
	   $userRecord=array();
	   $query=mysqli_query($this->db->connect(),"select * from va_apps_channel where status='2' order by language asc");
	   if($query)
	   {
		   $num_of_rows=mysqli_num_rows($query);
		   if($num_of_rows==0)
		   {
			   return $userRecord;
		   }
		   else{
			   while($result=mysqli_fetch_assoc($query))
			   {

					$result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="del_audio_channel(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
			 
				   array_push($userRecord,$result);
			   }
			   return $userRecord;
		   }
	   }
	   else
	   {
			return $userRecord;
	   }
 }
	
/**
 * del_audio_channel
 */
public function del_audio_channel($id)
{ 
	$array=array("error"=>0,"success"=>0);
       
	    $query=mysqli_query($this->db->connect(),"delete from va_apps_channel where id='".$id."' and status='2' ");
			if($query)
			{
				$array['success']=1;
			}
		
		else
		{
			$array['error']=1;
		}
		return $array;
}

/**
 * videoapplanguage
 */
public function videoapplanguage()
{
	  $userRecord=array();
	  $query=mysqli_query($this->db->connect(),"select * from va_app_lang where status='1' ");
	  if($query)
	  {
		  $num_of_rows=mysqli_num_rows($query);
		  if($num_of_rows==0)
		  {
			  return $userRecord;
		  }
		  else{
			  while($result=mysqli_fetch_assoc($query))
			  {	
				$result['image']="http://shivaradio.primetelecast.com/images/video_app/".$result['image'];
				  array_push($userRecord,$result);
			  }
			  return $userRecord;
		  }
	  }
	  else
	  {
		   return $userRecord;
	  }
}

/**audioapplanguage */
public function audioapplanguage()
{
	  $userRecord=array();
	  $query=mysqli_query($this->db->connect(),"select * from va_app_lang where status='2' ");
	  if($query)
	  {
		  $num_of_rows=mysqli_num_rows($query);
		  if($num_of_rows==0)
		  {
			  return $userRecord;
		  }
		  else{
			  while($result=mysqli_fetch_assoc($query))
			  {	
				$result['image']="http://shivaradio.primetelecast.com/images/video_app/".$result['image'];
			
				  array_push($userRecord,$result);
			  }
			  return $userRecord;
		  }
	  }
	  else
	  {
		   return $userRecord;
	  }
}

/**
 * videoappchannel
 */

public function videoappchannel($lag)
{
	  $userRecord=array();
	  $query=mysqli_query($this->db->connect(),"select * from va_apps_channel where language='".$lag."' and status='1' ");
	  if($query)
	  {
		  $num_of_rows=mysqli_num_rows($query);
		  if($num_of_rows==0)
		  {
			  return $userRecord;
		  }
		  else{
			  while($result=mysqli_fetch_assoc($query))
			  {

				  array_push($userRecord,$result);
			  }
			  return $userRecord;
		  }
	  }
	  else
	  {
		   return $userRecord;
	  }
}
/**
 * audioappchannel
 */
public function audioappchannel($lag)
{
	  $userRecord=array();
	  $query=mysqli_query($this->db->connect(),"select * from va_apps_channel where language='".$lag."' and status='2' ");
	  if($query)
	  {
		  $num_of_rows=mysqli_num_rows($query);
		  if($num_of_rows==0)
		  {
			  return $userRecord;
		  }
		  else{
			  while($result=mysqli_fetch_assoc($query))
			  {

				  array_push($userRecord,$result);
			  }
			  return $userRecord;
		  }
	  }
	  else
	  {
		   return $userRecord;
	  }
}

/*add_live_audio_bk_db**/
public function add_live_audio_bk_db($title,$url,$img) 
	{
	    

		$array=array("error"=>0,"success"=>0);
        
		$conn=$this->db->connect();
		$set_array=array();
        $result = mysqli_query($conn,"insert into live_audio_channel(channel_name,channel_url,channel_icon) values('".$title."','".$url."','".$img."') ");
		if($result)
		{
		 $array['success']=1;
			
		}
		else
		{
			$array['error']=1;
		}
		return $array;
    }


/**
 * add_live_audio_bk_db
 */
  public function get_live_audio_bk_db()
   {
	    $userRecord=array();
	    $query=mysqli_query($this->db->connect(),"select * from live_audio_channel where type='1' order by id desc ");
		if($query)
		{
			$num_of_rows=mysqli_num_rows($query);
			if($num_of_rows==0)
			{
				return $userRecord;
			}
			else{
				while($result=mysqli_fetch_assoc($query))
				{
				    

			        $result['del']='<a href="javascript:null(0)"  class="btn btn-danger" onclick="delete_live_audio_bk_db(`'.$result['id'].'`)"><i class="icon-remove"></i> Delete</a>';
					$result['icon']="<a href='images/live_audio_channel/".$result['channel_icon']."' class='lightbox' ><img src='images/live_audio_channel/".$result['channel_icon']."' class='img-media'></a>";
			     
					array_push($userRecord,$result);
				}
				return $userRecord;
			}
		}
		else
		{
			 return $userRecord;
		}
   }

	
/**
 * delete_live_audio_bk_db
 */
public function delete_live_audio_bk_db($id)
{ 
	$array=array("error"=>0,"success"=>0);
       
	    $query=mysqli_query($this->db->connect(),"delete from live_audio_channel where id='".$id."' ");
			if($query)
			{
				$array['success']=1;
			}
		
		else
		{
			$array['error']=1;
		}
		return $array;
}



}
?>
