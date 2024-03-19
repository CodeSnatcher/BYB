<?php

/*
*	STEP 4
*   handling Request

*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



//Create an instance; passing `true` enables exceptions


// Output function 
function output($Return = array())
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

function sendmail()
{
	$mail = new PHPMailer(true);
	try {
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'h1324.mcl@gmail.com';
		$mail->Password   = 'yjbvuwkrkpadqbhh';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$mail->Port       = 465;
		$mail->setFrom('1324.mcl@gmail.com', 'Bringyourbuddy');
		$mail->addAddress('sharma.himanshu1324@gmail.com', 'Student');
		$mail->isHTML(true);
		$mail->Subject = 'byb';
		$mail->Body    = file_get_contents('../e1_reg_mail.html');

		$mail->send();
		$response['success'] = 1;
		$response['message'] = "email sent successfully";
		output($response);
	} catch (Exception $e) {
		$response['success'] = 0;
		$response['message'] = "email sent unsuccessful";
		output($response);
	}
}


// **********Student_login******************

if (isset($_POST['tag']) && $_POST['tag'] != '') {
	require "db_functions.php";
	// creating db object 
	$db = new DB_Functions();
	//Getting The Request tag
	$tag = $_POST['tag'];

	// Input Validator
	function safe_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return ucfirst($data);
	}

	// Output Array
	$response = array("tag" => $tag, "success" => 0, "error" => 0);

	// student_register
	if ($tag == "student_register") {
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$phone_code = $_POST['phone_code'];
		$phone_no = $_POST['phone_no'];
		$whtp_code = $_POST['whtp_code'];
		$whtp_number = $_POST['whtp_number'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$email = $_POST['email'];
		$ref_code = $_POST['ref_code'];
		if ($ref_code != "") {
			$check = $db->check_ref($ref_code);
			if ($check == false) {
				$response["success"] = 0;
				$response["message"] = "Invalid Referal Code";
				output($response);
			}
		}
		$agent_id = $check['id'];

		$password = password_hash($_POST['password'], PASSWORD_BCRYPT, [10]);
		$check_info = $db->get_row_data('email', $email, 'student');
		if ($check_info == true) {
			$response["success"] = 0;
			$response["message"] = "User Already Exist";
			output($response);
		} else {
			$insert_info = $db->student_register($name, $gender, $phone_code, $phone_no, $whtp_code, $whtp_number, $country, $state, $city, $email, $password, $agent_id);

			if ($insert_info) {

				$response["success"] = 1;
				$response["message"] = "Registered Successfully";
				output($response);
			} else {
				$response["success"] = 0;
				$response["message"] = "Something Went wrong";
				output($response);
			}
		}
	}

	// enquiry_form

	elseif ($tag == "enquiry") {
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$code = $_POST['code'];
		$phone = $_POST['phone'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$gender = $_POST['gender'];
		$courses = $_POST['courses'];

		$insert_info = $db->enquiry($full_name, $email, $code, $phone, $state, $city, $gender, $courses);
		if ($insert_info == true) {
			$response["success"] = 1;
			$response["message"] = "Data Submitted Successfuly";
			output($response);
		} else {
			$response["success"] = 0;
			$response["message"] = "Data Submission Failed";
			output($response);
		}
	}

	// step_enquiry

	elseif ($tag == "step_enquiry") {
		$course_cat = $_POST['course_cat'];
		$qualification = $_POST['qualification'];
		$gp_score = $_POST['gp_score'];
		$paid_internship = $_POST['paid_internship'];
		$budget = $_POST['budget'];
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$whatsapp = $_POST['whatsapp'];
		$gender = $_POST['gender'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];

		$insert_info = $db->step_enquiry($course_cat, $qualification, $gp_score, $paid_internship, $budget, $full_name, $email, $whatsapp, $gender, $city, $state, $country);
		if ($insert_info == true) {
			$response["success"] = 1;
			$response["message"] = "Data Submitted Successfuly";
			output($response);
		} else {
			$response["success"] = 0;
			$response["message"] = "Data Submission Failed";
			output($response);
		}
	}

	// contact_form

	elseif ($tag == "contact") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$insert_info = $db->contact($name, $email, $subject, $message);
		if ($insert_info == true) {
			$response["success"] = 1;
			$response["message"] = "Data Submitted Successfuly";
			output($response);
		} else {
			$response["success"] = 0;
			$response["message"] = "Data Submission Failed";
			output($response);
		}
	}


	// university_register
	elseif ($tag == "university_register") {
		$uni_code = $_POST['uni_code'];
		$uni_name = $_POST['uni_name'];
		$center_type = $_POST['center_type'];
		$source_country = $_POST['source_country'];
		$distt = $_POST['distt'];
		$city = $_POST['city'];
		$near_by = $_POST['near_by'];
		$est_year = $_POST['est_year'];
		$uni_website = $_POST['uni_website'];
		$uni_phone = $_POST['uni_phone'];
		$uni_email = $_POST['uni_email'];
		$uni_password = password_hash($_POST['uni_password'], PASSWORD_BCRYPT, [10]);


		$check_email = $db->get_row_data('uni_email', $uni_email, 'universities');
		$check_name = $db->get_row_data('uni_name', $uni_name, 'universities');
		$check_phone = $db->get_row_data('uni_phone', $uni_phone, 'universities');
		$check_website = $db->get_row_data('uni_website', $uni_website, 'universities');


		if ($check_email || $check_name || $check_phone || $check_website  == true) {
			$response["success"] = 0;
			$response["message"] = "University Already Exist";
			output($response);
		} else {
			$insert_info = $db->university_register($uni_code, $uni_name, $center_type, $source_country, $distt, $city, $near_by, $est_year, $uni_website, $uni_phone, $uni_email, $uni_password);
			if ($insert_info == true) {
				$response["success"] = 1;
				$response["message"] = "University Registered Successfully";
				output($response);
			} else {
				$response["success"] = 0;
				$response["message"] = "Something Went wrong";
				output($response);
			}
		}
	}

	// mail

	elseif ($tag == "email") {
		$bmail = sendmail();
		if ($bmail == true) {
			$response['success'] = 1;
			$response['message'] = "email sent successfully";
			output($response);
		} else {
			$response['success'] = 0;
			$response['message'] = "email sent Unsuccessful";
			output($response);
		}
	}

	// agent_register


	elseif ($tag == "agent_register") {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone_no'];
		$contact_method = $_POST['contact_method'];
		$find_out = $_POST['find_out'];
		$refrence = $_POST['refrence'];
		$recruiting_year = $_POST['recruiting_year'];
		$source_country = $_POST['source_country'];
		$services = $_POST['services'];

		$password = password_hash($_POST['password'], PASSWORD_BCRYPT, [10]);
		$check_info = $db->get_row_data('email', $email, 'agents');
		if ($check_info == true) {
			$response["success"] = 0;
			$response["message"] = "Agent Already Exist";
			output($response);
		} else {
			$insert_info = $db->agent_register($first_name, $last_name, $email, $phone_no, $contact_method, $find_out, $refrence, $recruiting_year, $source_country, $services);
			if ($insert_info == true) {
				$response["success"] = 1;
				$response["message"] = " Agent Registered Successfully";
				output($response);
			} else {
				$response["success"] = 0;
				$response["message"] = "Something Went wrong";
				output($response);
			}
		}
	} else {
		output($response);
	}
} else {
	$response["success"] = 0;
	$response["msg"] = "Invalid Tag.";
	output($response);
}
