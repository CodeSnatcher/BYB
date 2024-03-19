<?php 
// include neccessary files and set session 
require_once "phpScripts/db_functions.php";
$db= new DB_Functions();
 /*
 * Check if session for admin is set or not
**/
if(!isset($_SESSION) || !isset($_SESSION["admin_session"]))
{
	header('Refresh:2;url=login.php');
	echo "Unauthorzed Access. Please Login.";
	die ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Times App : Index</title>
<?php 
require_once("includes/pageInitials.inc.php"); 
require_once("includes/pageScripts.inc.php"); 

?>

<style>
@keyframes placeHolderShimmer{
    0%{
        background-position: -468px 0
    }
    100%{
        background-position: 468px 0
    }
}

.animated-background {
    animation-duration: 1s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    background-size: 800px 104px;
    height: 96px;
    position: relative;
}
</style>
 <!--<script type="text/javascript">-->
 <!--     var verifyCallback = function(response) {-->
        
 <!--     };-->
 <!--     var widgetId1;-->
 <!--     var onloadCallback = function() {-->
 <!--     widgetId1 = grecaptcha.render('html_element', {-->
 <!--         'sitekey' : '6LdzFu0UAAAAAB4RQu5xwoT8k5Kd2CpC8igoNvET',-->
 <!--         'theme' : 'light',-->
          
 <!--       });-->
        
 <!--       };-->
             
 <!--   </script>-->
</head>

<body>

	<!-- Navbar -->
	<?php 
		require_once("includes/main_header.inc.php");
	?>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		<?php 
			require_once("includes/sidebar.inc.php");
		?>
		<!-- /sidebar -->


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Dashboard <small>Welcome <?php echo $_SESSION["admin_name"];?></small></h3>
				</div>
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Dashboard</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
		
		
		
		<!-- <div class="panel panel-default">
		    
		    
		   <form action="phpScripts/manage_app_images.php" method="post" role="form" id="add_ss_img_bk" name="add_ss_img_bk">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">Update BK Live splash screen image </span>
			</div>
			<div class="well">
			<div class="row">
			    <div class="col-md-6">
			        <div class="form-group">
                            <label>Update BK Live splash screen image : <span class="mandatory">*</span></label>
                            <input type="file" placeholder="splash screen image url" name="file" class="required form-control" required  />
                        </div>
                        <!--<span>OLD IMG URL:- </?php echo $sslimg['img'];?></span>-->
					    
					    
					<!-- <div class="form-group">
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
			
				</div>
				 <div class="col-md-6">	                  	
				 <div class="form-group">
				   <label>Current BK Live splash screen image :</label><br>
				  

				   
				   <img src="images/bk_live/bk_splash.jpg" style="height:150px;width:300px;" >
				  
				 </div>
			     </div>
				     
				</div>
				</div>
	</form>
                    </div> --> 
                        
    
    	<div class="panel panel-default">	
    	 <form action="phpScripts/manage_app_images.php" method="post" role="form" id="bkl_banner" name="bkl_banner">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">Update BK Live main screen banner image </span>
			</div>
			<div class="well">
				<div class="row">
			    <div class="col-md-6">
	                  	<div class="form-group">
                            <label>Update BK Live main screen banner image : <span class="mandatory">*</span></label>
                            <input type="file" placeholder="splash screen image url" name="file" class="required form-control" required  />
                        </div>
                        <!--<span>OLD IMG URL:- </?php echo $sslimg['img'];?></span>-->
					    	<div class="form-group">
			
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
				</div>
				
				 <div class="col-md-6">
	                  	<div class="form-group">
	                  	   <label>Current BK Live main screen banner Img:</label><br>
	                  	    
	                  	    <img src="images/bk_live/bk_main_banner.jpg" style="height:150px;width:300px;" >
                    </div></div>
                    
                    </div></div>
                        
    	</form>
	
		</div>
		<hr style="margin:7%">
			<!-- <div class="panel panel-default">
		    
		    
		   <form action="phpScripts/manage_app_images.php" method="post" role="form" id="bk_info" name="bk_info" enctype="multipart/form-data">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">Update BK Live Info image </span>
			</div>
			<div class="well">
			<div class="row">
			    <div class="col-md-6">
			        <div class="form-group">
                            <label>Update BK Info Image: <span class="mandatory">*</span></label>
                            <input type="file"  name="file" class="required form-control" required  />
                        </div>
						</div>
                        <!--<span>OLD IMG URL:- </?php echo $sslimg['img'];?></span>-->
					    <!-- <div class="col-md-6">
	                  	<div class="form-group">
	                  	   <label>Current BK Live main screen banner Img:</label><br>
	                  	    
	                  	    <img src="images/bk_live/bk_live_info_banner.jpg" style="height:150px;width:300px;" >
                    </div></div>
					    
					<div class="form-group">
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
			
				
				 
				     
				</div>
				</div>
	</form>
                    </div> --> 
		
		
		
			<form action="phpScripts/radio_manager.php" method="post" role="form" id="add_channel" name="add_channel" enctype="multipart/form-data">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">Channel Manager </span>
			</div>
			<div class="well">
			
		<div class="form-group">
                            <label>Channel Name: <span class="mandatory">*</span></label>
                            <input type="text" placeholder="CHANNEL NAME" name="chn_name" class="required form-control" required  />
                        </div>
                      
                        
                            
                        
                        	<div class="form-group">
                            <label>Channel URL</label>
                            <input type="text" placeholder="CHANNEL URL" name="chn_url" class="required form-control"   />
                        </div>
                        
                        	<div class="form-group">
                            <label>Stream Type</label>
                            <select   name="stream" class="required form-control"   >
                                <option value="http">HTTP</option>
                                <option value="hls">HLS</option>
                                <option value="rmtp">RMTP</option>
                                
                                </select>
                        </div>
                        
                        
                        
                          <div class="form-group">
                            <label>Channel Icon : </label>
                             <input type="file" name="banner_image" class="form-control file-3" /><br><br>
                            
					    </div>
					    
					    
				<div class="row form-actions">
				<div class="form-group has-feedback">
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
				</div>
            </div>
    	</form>
	
		<!-- View Users -->
		<div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-home2"></i> View </h6></div>
	                <div class="panel-body">
					
						<div class="block-inner text-danger">
							<h6 class="heading-hr"></h6>
						</div>
						<div class="animated-background"></div>
						<div style="display:none;" id="1_div">
							<table  id="1table" data-toggle="table" data-search="true" data-filter-control="false"  data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true" data-page-size="100"  data-escape="false" data-pagination-V-Align="both">
								<thead>
									<tr>
										<th data-formatter="runningFormatter">#</th>
										<th data-field="channel_name" data-sortable="true">Channel Name</th>
										<th data-field="channel_url" data-sortable="true" >Channel URL</th>
										<th data-field="stream_type" data-sortable="true" >Stream Type</th>
										<th data-field="image" data-sortable="true" >Icon URL</th>
									
									<th data-field="edit" data-sortable="true">Action</th>
									<th data-field="del" data-sortable="true">Delete</th>
									</tr>
								</thead>
							</table>
						</div>
					
					</div>
				</div>
	
	
			<hr style="margin:7%">
			<!-- Audio url-->
	
	<form action="phpScripts/radio_manager.php" method="post" role="form" id="add_live_audio_bk_new" name="add_live_audio_bk_new" enctype="multipart/form-data">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">Live Audio  </span>
			</div>
			<div class="well">
			
	                	<div class="form-group">
                            <label>Channel Name<span class="mandatory">*</span></label>
                            <input type="text" placeholder="Audio Url" name="channel_name" class="required form-control" required  />
                        </div>
                        
                        <div class="form-group">
                            <label>Channel Url <span class="mandatory">*</span></label>
                            <input type="text" placeholder="Channel Url" name="channel_url" class="required form-control" required  />
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Channel Image <span class="mandatory">*</span></label>
                            <input type="file"  name="channel_file" class="required form-control" required  />
                        </div>
                      
 
					    
				<div class="row form-actions">
				<div class="form-group has-feedback">
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
				</div>
                    </div>
				</form>
	
		<!-- View Users -->
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-home2"></i> View Audio </h6></div>
	                <div class="panel-body">
					
						<div class="block-inner text-danger">
							<h6 class="heading-hr"></h6>
						</div>
						<div class="animated-background"></div>
						<div style="display:none;" id="la_table_div">
							<table  id="la_table" data-toggle="table" data-search="true" data-filter-control="false"  data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true" data-page-size="100"  data-escape="false" data-pagination-V-Align="both">
								<thead>
									<tr>
										<th data-formatter="runningFormatter">#</th>
										<th data-field="icon" data-sortable="true">Channel Icon</th>
										<th data-field="channel_name" data-sortable="true" >Channel Name</th>
										<th data-field="channel_url" data-sortable="true" >Channel URL</th>
									    <th data-field="del" data-sortable="true">Delete</th>
									</tr>
								</thead>
							</table>
						</div>
					
					</div>
				</div>
			
			<hr style="margin:7%">
	
		<!-- View Users -->
	     <div class="panel panel-default">
	       <form action="phpScripts/manage_app_images.php" method="post" role="form" id="add_bk_slider_img" name="add_bk_slider_img">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">ADD BRAHMA KUMARIS LIVE DARSHAN SLIDER IMAGE</span>
			</div>
			<div class="well">
			<div class="row">
			    <div class="col-md-10">
			        <div class="form-group">
                            <label>Add Bk Slider Image</label>
                            <input type="file" placeholder="add slider image" name="file" class="required form-control" required  />
                        </div>
                        <!--<span>OLD IMG URL:- </?php echo $sslimg['img'];?></span>-->
					    
					    
					<div class="form-group">
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
			
				</div>
				</div>
				</div>
	         </form>
	         
	        <div class="panel-heading"><h6 class="panel-title"><i class="icon-home2"></i> View All BK Slider Images </h6></div>
	           <div class="panel-body">
                 <div class="row">
					
					<?php
					$dir_name = "images/bk_live_sliders/";
                    $images = glob($dir_name."*.jpg");
                    foreach($images as $image) 
                    {
                    echo '<div class="col-md-3" style="margin-top:2%"> <img src="'.$image.'" style="height:100px;width:100%;"/><a href="javascript:null(0)" onclick="del_slider_img(`'.$image.'`)" class="btn btn-danger form-control">Delete Image <i class="icon-remove" aria-hidden="true"></i></a> </div>';
                    }
					?>
					</div>
					</div>
				</div>
	
	
	
		<hr style="margin:7%">
	<form action="phpScripts/radio_manager.php" method="post" role="form" id="add_pmtv_slider" name="add_pmtv_slider" enctype="multipart/form-data">
			<div class="popup-header">
				<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
				<span class="text-semibold">Live Darshan Background Audio Manager </span>
			</div>
			<div class="well">
			
		<div class="form-group">
                            <label>Audio Url <span class="mandatory">*</span></label>
                            <input type="text" placeholder="Audio Url" name="audio_url" class="required form-control" required  />
                        </div>
                      
       <!--                 	<div class="form-group">-->
				   <!--         <label>Image File Url:</label>-->
				   <!--         	<input type="text" name="img_url" placeholder="Enter File url" class="required form-control" required >-->
							<!--<span style="color:red;">Add image Url then Press Enter for add next Image Url</span>-->
				   <!--     </div>-->
                       
                        
                    
					    
				<div class="row form-actions">
				<div class="form-group has-feedback">
				    
						<button type="submit" id="submitbutton" class="btn btn-success btn-lg ">Submit</button>
					</div>
				</div>
                    </div>
				</form>
	
		<!-- View Users -->
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-home2"></i> View Audio </h6></div>
	                <div class="panel-body">
					
						<div class="block-inner text-danger">
							<h6 class="heading-hr"></h6>
						</div>
						<div class="animated-background"></div>
						<div style="display:none;" id="2_div">
							<table  id="2table" data-toggle="table" data-search="true" data-filter-control="false"  data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true" data-page-size="100"  data-escape="false" data-pagination-V-Align="both">
								<thead>
									<tr>
										<th data-formatter="runningFormatter">#</th>
										<th data-field="audio_url" data-sortable="true">Audio URL</th>
										<th data-field="file_url" data-sortable="true" >File URL</th>
									<th data-field="del" data-sortable="true">Delete</th>
									</tr>
								</thead>
							</table>
						</div>
					
					</div>
				</div>
	
		
			<hr style="margin:7%">
	
			<!-- Footer -->
	        <?php 
				require_once("includes/footer.inc.php");
			?>
	        <!-- /footer -->



		</div>
		<!-- /page content -->


	</div>
	<!-- /page container -->

</body>
</html>

<script>
//To show the row counts in table
function runningFormatter(value, row, index) {
    return 1+index;
}



$(document).ready(function()
{
   
	
	// Get Users Record
	$.ajax
	({
	    
		url: 'phpScripts/radio_manager.php',
		data: {"tag":"getAllChannel"},
		type:'post',
		cache: false,
		success:function(response)
		{
		  //  alert("kjhgc");
		  //  alert(response);
			console.log(response);
			$("#1table").bootstrapTable('load', response);
			$(".animated-background").css("display","none");
			$("#1_div").css("display","block");
		}
	});
	
	
	
	
	
	//la_table
		// Get Users Record
	$.ajax
	({
	    
		url: 'phpScripts/radio_manager.php',
		data: {"tag":"get_live_audio_bk_db"},
		type:'post',
		cache: false,
		success:function(response)
		{
		  //  alert("kjhgc");
		  //  alert(response);
			console.log(response);
			$("#la_table").bootstrapTable('load', response);
			$(".animated-background").css("display","none");
			$("#la_table_div").css("display","block");
		}
	});
	
	
	
	
});




$(document).ready(function()
{
	
	// Get Users Record
	$.ajax
	({
		url: 'phpScripts/radio_manager.php',
		data: {"tag":"getpmtvslider"},
		type:'post',
		cache: false,
		success:function(response)
		{
			console.log(response);
			$("#2table").bootstrapTable('load', response);
			$(".animated-background").css("display","none");
			$("#2_div").css("display","block");
		}
	});
});



//slider images

$(document).ready(function()
{
	
	// Get Users Record
	$.ajax
	({
		url: 'phpScripts/manage_app_images.php',
		data: {"tag":"getbkappimageslider"},
		type:'post',
		cache: false,
		success:function(response)
		{
			console.log(response);
			$("#slider_table").bootstrapTable('load', response);
			$(".animated-background").css("display","none");
			$("#slider_div").css("display","block");
		}
	});
});

$(".file-3").fileinput({
	showUpload: false,
	allowedFileExtensions: ["jpg","jpeg","JPG","JPEG","png","PNG"],
	showCaption: false,
	browseClass: "btn btn-primary btn-lg btn_upload",
	fileType: "any",
	minImageWidth: 250,
	minImageHeight: 300,
	resizeImage: true,
	maxImageWidth: 500,
	maxImageHeight: 600,
	resizePreference: 'width',
	maxFileCount:5,
	previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});


        
// Submit Add addmanager Form
$("#add_channel").on("submit",function(e)
{
	e.preventDefault();
        
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		success: function (response) 
		{
		//	alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});





///
function del_channel(id)
{
    //alert(unique_id);
	$(".loader").css("display","block");
	$.ajax
	({
		type: "POST",
		url: "phpScripts/radio_manager.php",
		data: {"id":id,"tag":"del_channel"},
		cache: false,
		success: function (response) 
		{
			//alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
					message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
}
///

//add_pmtv_slider
$("#add_pmtv_slider").on("submit",function(e)
{
	e.preventDefault();
    // var tag=document.getElementById("tags2").value;
    // alert(tag);
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		success: function (response) 
		{
		//	alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});



///
function del_slider(id)
{
    //alert(unique_id);
	$(".loader").css("display","block");
	$.ajax
	({
		type: "POST",
		url: "phpScripts/radio_manager.php",
		data: {"id":id,"tag":"del_slider"},
		cache: false,
		success: function (response) 
		{
			//alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
					message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
}
///

//delete_live_audio_bk_db
function delete_live_audio_bk_db(id)
{
    //alert(unique_id);
	$(".loader").css("display","block");
	$.ajax
	({
		type: "POST",
		url: "phpScripts/radio_manager.php",
		data: {"id":id,"tag":"delete_live_audio_bk_db"},
		cache: false,
		success: function (response) 
		{
			//alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
					message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
}

//add_ss_img_bk
$("#add_ss_img_bk").on("submit",function(e)
{
	e.preventDefault();
    // var tag=document.getElementById("tags2").value;
    // alert(tag);
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		success: function (response) 
		{
		//	alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});



//bkl_banner
$("#bkl_banner").on("submit",function(e)
{
	e.preventDefault();
    // var tag=document.getElementById("tags2").value;
    // alert(tag);
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		success: function (response) 
		{
		//	alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});

//

//bk_info
$("#bk_info").on("submit",function(e)
{
	e.preventDefault();
    // var tag=document.getElementById("tags2").value;
    // alert(tag);
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		success: function (response) 
		{
		//	alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});

//add_bk_slider_img
$("#add_bk_slider_img").on("submit",function(e)
{
	e.preventDefault();
    // var tag=document.getElementById("tags2").value;
    // alert(tag);
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,

		success: function (response) 
		{
			// alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});

//del_slider_img
function del_slider_img(image)
{
    //alert(image);
	$(".loader").css("display","block");
	$.ajax
	({
		type: "POST",
		url: "phpScripts/manage_app_images.php",
		data: {"image":image,"tag":"del_slider_img"},
		cache: false,
		success: function (response) 
		{
			//alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
					message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
}






//add_live_audio_bk_new
$("#add_live_audio_bk_new").on("submit",function(e)
{
	e.preventDefault();
    // var tag=document.getElementById("tags2").value;
    // alert(tag);
	$(".loader").css("display","block");
	var obj = $(this), action_name = obj.attr('name'); 
	var form = $(this)[0];
	var data = new FormData(form);
	data.append("tag", action_name);
	$.ajax
	({
		type: "POST",
		enctype: 'multipart/form-data',
		url:  e.target.action,
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		success: function (response) 
		{
		//	alert(JSON.stringify(response));
			if (response.error =="1") 
			{
				$(".loader").css("display","none");
				iziToast.show({
					theme: 'light', // dark
					color: 'red', // blue, red, green, yellow
					title: '',
					message: response.error_msg
				});
			} 
			else 
			{
				iziToast.show({
					theme: 'light', // dark
					color: 'green', // blue, red, green, yellow
					title: '',
				 	message: response.success_msg
				});
				setTimeout(function() 
				{
					window.location.href="pmtv_editor.php";
				}, 2000);
			}
		}
	});
	
   
});
</script>
