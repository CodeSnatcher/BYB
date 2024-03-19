<?php
/*
*	STEP 3
*   All database handling functions
*/
date_default_timezone_set('Asia/Calcutta');
class DB_Functions
{
	private $db;

	function __construct()
	{
		// require db connection file
		require "DB_Connect.php";
		// creating obj;

		$this->db = new DB_CONNECT();
		$this->db->connect();
	}

	function __destruct()
	{
	}
	//safeescapedata
	public function safeescapedata($var)
	{
		$conn = $this->db->connect();
		$res = mysqli_real_escape_string($conn, $var);
		return $res;
	}


	//student_register
	public function student_register($name, $gender, $phone_code, $phone_no, $whtp_code, $whtp_number, $country, $state, $city, $email, $password, $agent_id)

	{
		$conn = $this->db->connect();
		$date = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "insert into  student
		(agent_id,name, gender, phone_code, phone_no, whtp_code, whtp_number, country, state, city, email, password) values
		('" . $agent_id . "','" . $this->safeescapedata($name) . "','" . $this->safeescapedata($gender) . "','" . $this->safeescapedata($phone_code) . "','" . $this->safeescapedata($phone_no) . "','" . $this->safeescapedata($whtp_code) . "','" . $this->safeescapedata($whtp_number) . "','" . $this->safeescapedata($country) . "','" . $this->safeescapedata($state) . "','" . $this->safeescapedata($city) . "','" . $this->safeescapedata($email) . "','" .  $this->safeescapedata($password) . "')");

		if ($query) {
			return true;
		} else {

			return false;
		}
	}

	// university_register


	public function university_register($uni_code, $uni_name, $center_type, $source_country, $distt, $city, $near_by, $est_year, $uni_website, $uni_phone, $uni_email, $uni_password)
	{
		$conn = $this->db->connect();
		$date = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "insert into  student
		(uni_code, uni_name, center_type, source_country, distt, city, near_by, est_year, uni_website, uni_phone, uni_email, uni_password) values
		('" . $this->safeescapedata($uni_code) . "','" . $this->safeescapedata($uni_name) . "','" . $this->safeescapedata($center_type) . "','" . $this->safeescapedata($source_country) . "','" . $this->safeescapedata($distt) . "','" . $this->safeescapedata($city) . "','" . $this->safeescapedata($near_by) . "','" . $this->safeescapedata($est_year) . "','" . $this->safeescapedata($uni_website) . "','" . $this->safeescapedata($uni_phone) . "','" . $this->safeescapedata($uni_email) . "','" . $this->safeescapedata($uni_password) . "')");

		if ($query) {
			return true;
		} else {

			return false;
		}
	}


	public function agent_register($first_name, $last_name, $email, $phone_no, $contact_method, $find_out, $refrence, $recruiting_year, $source_country, $services)
	{
		$conn = $this->db->connect();
		$date = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "insert into  student
		(uni_code, uni_name, center_type, source_country, distt, city, near_by, est_year, uni_website, uni_phone, uni_email, uni_password) values
		('" . $this->safeescapedata($first_name) . "','" . $this->safeescapedata($last_name) . "','" . $this->safeescapedata($email) . "','" . $this->safeescapedata($phone_no) . "','" . $this->safeescapedata($contact_method) . "','" . $this->safeescapedata($find_out) . "','" . $this->safeescapedata($refrence) . "','" . $this->safeescapedata($recruiting_year) . "','" . $this->safeescapedata($source_country) . "','" . $this->safeescapedata($services) . "')");

		if ($query) {
			return true;
		} else {

			return false;
		}
	}

	// get course data
	public function get_course_data($id)
	{
		$conn = $this->db->connect();

		$query = mysqli_query($conn, "SELECT universities.state, universities.city,universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos, university_courses.anul_fee_with_hos, university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility, courses.course_description,university_courses.course_id, courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE university_courses.course_id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0; ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			$result = mysqli_fetch_assoc($query);
			return $result;
		} else {

			return false;
		}
	}


	public function get_type_data($uni_id, $ct_id)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();

		$query = mysqli_query($conn, "SELECT university_courses.course_id, universities.state, universities.city,universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos, university_courses.anul_fee_with_hos, university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility, courses.course_description, courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE university_courses.uni_id='" . $uni_id . "' and courses.course_type='" . $ct_id . "' and university_courses.status=1 and university_courses.del_status=0; ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return false;
		}
	}


	// get university course data
	public function get_universitycourse_data($id)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();

		$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type WHERE university_courses.uni_id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0 and courses.status=1 and courses.del_status=0 ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return false;
		}
	}

	public function typewisecourses($type)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();
		$query = mysqli_query($conn, "select * from courses where course_type='" . $type . "' ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return false;
		}
	}

	public function catwisecourse($cat_id, $duration, $price, $search)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();
		if ($price == "" && $duration == "" && $search == "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE courses.course_category='" . $cat_id . "' and university_courses.status=1 and university_courses.del_status=0 and courses.del_status=0;");
		} elseif ($price == "" && $duration == "" && $search != "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
			WHERE (courses.course_name like '%" . $search . "%' or universities.uni_name like '%" . $search . "%' or courses.course_eligibility like '%" . $search . "%' ) and university_courses.status=1 and university_courses.del_status=0 and courses.course_category='" . $cat_id . "' ");
		} elseif ($price != "" && $duration != "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0 and courses.course_category='" . $cat_id . "' and university_courses.anul_fee_without_hos<='" . $price . "' and courses.course_duration_year='" . $duration . "'  ; ");
		} elseif ($price != "" && $duration == "") {

			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1  and  university_courses.del_status=0 and university_courses.anul_fee_without_hos<='" . $price . "' and courses.course_category='" . $cat_id . "'; ");
		} elseif ($price == "" && $duration != "") {

			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and courses.course_category='" . $cat_id . "' and university_courses.del_status=0 and courses.course_duration_year='" . $duration . "'; ");
		} else {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE courses.course_category='" . $cat_id . "' and university_courses.status=1 and university_courses.del_status=0 and courses.del_status=0;");
		}
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return $return_array;
		}
	}


	public function compare_uni($course_id, $uni_1, $uni_2)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();
		if ($course_id == "" && $uni_1 == "" && $uni_2 == "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
			WHERE  university_courses.course_id='" . 99 . "' ");
			
		} elseif ($course_id != "" && $uni_1 != "" && $uni_2 != "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
			WHERE  university_courses.course_id='" . $course_id . "' ");
		}  else {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id,course_type.type, course_category.course_category, university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name, courses.id as course_id, courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
			WHERE  university_courses.course_id='" . 99 . "' ");
			
		}
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return $return_array;
		}
	}

	

	public function cat_data($type)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();
		$query = mysqli_query($conn, "select * from course_category where course_type='" . $type . "' ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return false;
		}
	}

	public function getallcourse()
	{
		$conn = $this->db->connect();
		$return_array = array();
		$value = 0;
		$result = array();
		$query = mysqli_query($conn, "select * from courses where del_status='" . $value . "' ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return false;
		}
	}

	public function getallcoursedata($price, $duration, $search, $cat_id)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();

		if ($price == "" && $duration == "" && $search == "" && $cat_id == "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN universities ON university_courses.uni_id=universities.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0  and universities.status=1 and universities.del_status=0");
		} elseif ($price == "" && $duration == "" && $cat_id == "" && $search != "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
			FROM `university_courses` 
			JOIN courses ON university_courses.course_id=courses.id 
			JOIN universities ON university_courses.uni_id=universities.id 
			JOIN course_category ON courses.course_category=course_category.id 
			JOIN course_type ON course_type.id=courses.course_type 
			WHERE (courses.course_name like '%" . $search . "%' or universities.uni_name like '%" . $search . "%' or courses.course_eligibility like '%" . $search . "%' ) and university_courses.status=1 and university_courses.del_status=0  and universities.status=1 and universities.del_status=0");
		} elseif ($price != "" && $duration != "" && $cat_id != "") {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0 and university_courses.anul_fee_without_hos<='" . $price . "' and courses.course_duration_year='" . $duration . "' and courses.course_category='" . $cat_id . "'  ; ");
		} elseif ($price != "" && $duration == "" && $cat_id == "") {

			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0  and universities.status=1 and universities.del_status=0 and university_courses.anul_fee_without_hos<='" . $price . "'; ");
		} elseif ($price == "" && $duration != "" && $cat_id == "") {

			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0 and courses.course_duration_year='" . $duration . "'; ");
		}elseif ($price == "" && $duration == "" && $cat_id != "") {

			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0  and universities.status=1 and universities.del_status=0 and courses.course_category='" . $cat_id . "'; ");
		}else {
			$query = mysqli_query($conn, "SELECT universities.uni_name, universities.uni_logo, courses.id as course_id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id
		Join universities ON university_courses.uni_id=universities.id  
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE  university_courses.status=1 and university_courses.del_status=0  and universities.status=1 and universities.del_status=0");
		}




		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return $return_array;
		}
	}

	public function get_catwisecourse_data($price, $duration, $id)
	{
		$conn = $this->db->connect();
		$return_array = array();
		$result = array();

		if ($price == "" && $duration == "") {
			$query = mysqli_query($conn, "SELECT courses.id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE course_category.id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0; ");
		} elseif ($price != "" && $duration != "") {
			$query = mysqli_query($conn, "SELECT courses.id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE course_category.id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0 and university_courses.anul_fee_without_hos<='" . $price . "' and courses.course_duration_year='" . $duration . "'  ; ");
		} elseif ($price != "" && $duration == "") {

			$query = mysqli_query($conn, "SELECT courses.id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE course_category.id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0 and university_courses.anul_fee_without_hos<='" . $price . "'; ");
		} elseif ($price == "" && $duration != "") {

			$query = mysqli_query($conn, "SELECT courses.id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE course_category.id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0; and courses.course_duration_year='" . $duration . "'; ");
		} else {
			$query = mysqli_query($conn, "SELECT courses.id,course_type.type,course_category.course_category,university_courses.anul_fee_without_hos,university_courses.reg_fees ,courses.course_name,courses.course_trade ,courses.course_eligibility,courses.course_duration_year,courses.course_duration_sem,courses.course_duration_month 
		FROM `university_courses` 
		JOIN courses ON university_courses.course_id=courses.id 
		JOIN course_category ON courses.course_category=course_category.id 
		JOIN course_type ON course_type.id=courses.course_type 
		WHERE course_category.id='" . $id . "' and university_courses.status=1 and university_courses.del_status=0; ");
		}




		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}
			return $return_array;
		} else {

			return false;
		}
	}


	// get row data

	public function get_row_data($key, $value, $tablename)
	{
		$conn = $this->db->connect();

		$query = mysqli_query($conn, "select * from $tablename where $key='" . $value . "' ");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {

			$result = mysqli_fetch_assoc($query);
			return $result;
		} else {

			return false;
		}
	}


	// get table data

	public function get_table_data($table_name)
	{
		$return_array = array();
		$conn = $this->db->connect();
		$query = mysqli_query($conn, "select * from $table_name where del_status='0'  ");
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}

			return  $return_array;
		} else {
			return  $return_array;
		}
	}

	public function top_uni()
	{
		$return_array = array();
		$conn = $this->db->connect();
		$query = mysqli_query($conn, "select * from universities where del_status='0'and status='1' ORDER BY uni_rank ASC LIMIT 10 ");
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}

			return  $return_array;
		} else {
			return  $return_array;
		}
	}

	public function get_uni_data($search)
	{
		$return_array = array();
		$conn = $this->db->connect();
		if($search == ""){

			$query = mysqli_query($conn, "select * from universities where del_status='0' and status='1' ORDER BY uni_rank ASC ");
		}
		elseif($search != ""){
			$query = mysqli_query($conn, "select * from universities where del_status='0' and status='1' and (uni_name like '%" . $search . "%') and del_status='0' ");
		}
		else{
			$query = mysqli_query($conn, "select * from universities where del_status='0' and status='1' ORDER BY uni_rank ASC ");

		}
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			while ($result = mysqli_fetch_assoc($query)) {
				array_push($return_array, $result);
			}

			return  $return_array;
		} else {
			return  $return_array;
		}
	}



	// get_course_distt_data
	public function get_course_catwise_data($cat_id)
	{
		$return_array = array();
		$conn = $this->db->connect();
		$query = mysqli_query($conn, "select DISTINCT(course_type) from courses where course_category='" . $cat_id . "' and del_status='0'  ");
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			while ($result = mysqli_fetch_assoc($query)) {

				$query2 = mysqli_query($conn, "select * from course_type where id='" . $result['course_type'] . "' and del_status='0' ");
				$result2 = mysqli_fetch_assoc($query2);


				array_push($return_array, $result2);
			}

			return  $return_array;
		} else {
			return  $return_array;
		}
	}



	// get_course_distt_data
	public function get_course_cat_type_wise_data($cat_id)
	{
		$return_array = array();
		$conn = $this->db->connect();
		$query = mysqli_query($conn, "select * from courses where course_category='" . $cat_id . "' and del_status='0'  ");
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			while ($result = mysqli_fetch_assoc($query)) {


				array_push($return_array, $result);
			}

			return  $return_array;
		} else {
			return  $return_array;
		}
	}

	//get_University_detail
	public function get_University_detail($id)
	{
		$result = array();
		$conn = $this->db->connect();
		$query = mysqli_query($conn, "select * from universities where id='" . $id . "' ");
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			$result = mysqli_fetch_assoc($query);
			return $result;
		} else {
			return  $result;
		}
	}


	//student_enquiry
	public function enquiry($full_name, $email, $code, $phone, $state, $city, $gender, $courses)
	{
		$conn = $this->db->connect();
		$date = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "insert into  student_enquiry(full_name, email, code, phone, state, city, gender, courses) values ('" . $this->safeescapedata($full_name) . "','" . $this->safeescapedata($email) . "','" . $this->safeescapedata($code) . "','" . $this->safeescapedata($phone) . "','" . $this->safeescapedata($state) . "','" . $this->safeescapedata($city) . "', '" . $this->safeescapedata($gender) . "' ,'" . $this->safeescapedata($courses) . "')");

		if ($query) {
			return true;
		} else {

			return false;
		}
	}

	public function step_enquiry($course_cat, $qualification, $gp_score, $paid_internship, $budget, $full_name, $email, $whatsapp, $gender, $city, $state, $country)
	{
		$conn = $this->db->connect();
		$date = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "insert into  step_enquiry(course_cat, qualification, gp_score, paid_internship, budget, full_name, email, whatsapp, gender, city, state, country) values ('" . $this->safeescapedata($course_cat) . $this->safeescapedata($qualification) . $this->safeescapedata($gp_score) . $this->safeescapedata($paid_internship) . $this->safeescapedata($budget) . "','" . $this->safeescapedata($full_name) . "','" . $this->safeescapedata($email) . "','" . $this->safeescapedata($whatsapp) . "','" . $this->safeescapedata($gender) . "','" . $this->safeescapedata($city) . "', '" . $this->safeescapedata($state) . "' ,'" . $this->safeescapedata($country) . "')");

		if ($query) {
			return true;
		} else {

			return false;
		}
	}

	public function check_ref($ref)
	{
		$conn = $this->db->connect();
		$query = mysqli_query($conn, "select id from agents where ref_code='" . $ref . "' ");
		$num_of_rows = mysqli_num_rows($query);
		if ($num_of_rows != 0) {
			$res = mysqli_fetch_assoc($query);
			return $res;
		} else {
			return  false;
		}
	}


	// contact  form
	public function contact($name, $email, $subject, $message)
	{
		$conn = $this->db->connect();
		$date = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "insert into  student_contact(name, email, subject, message) values ('" . $this->safeescapedata($name) . "','" . $this->safeescapedata($email) . "','" . $this->safeescapedata($subject) . "','" . $this->safeescapedata($message) . "')");

		if ($query) {
			return true;
		} else {

			return false;
		}
	}
}
