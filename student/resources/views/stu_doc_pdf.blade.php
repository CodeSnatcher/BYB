<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel 10 pdf example </title>
    <!-- headerscript -->
    <style>
        th {text-align: left !important;}
        fieldset{margin-bottom: 25px !important;}
    </style>
</head>


<body>
<h1>Bring Your Buddy</h1>
  
  <fieldset>
      <legend>University Details</legend>
      <table class="table">

          <tbody>
              <tr>
                  <th>University Name</th>
                  <td>{{optional($object)->uni_name}}</td>
              </tr>
          </tbody>
      </table>
  </fieldset>

  <fieldset>
      <legend>Student Details</legend>
      <table class="table">

          <tbody>
              <tr>
                  <th>Student Name</th>
                  <td>{{optional($object)->stu_name}}</td>
              </tr>
              <tr>
                  <th>Student Contact</th>
                  <td>{{optional($object)->stu_phone}}</td>
              </tr>
              <tr>
                  <th>Student Email</th>
                  <td>{{optional($object)->stu_email}}</td>
              </tr>
          </tbody>
      </table>
  </fieldset>
  <fieldset>
      <legend>Course Details</legend>
      <table class="table">

          <tbody>
              <tr>
                  <th>Course Name</th>
                  <td>{{optional($object)->course_name}}</td>
              </tr>
              <tr>
                  <th>Course Annual Fee</th>
                  <td>{{optional($object)->anl_fee}}</td>
              </tr>
              <tr>
                  <th>Course Application Fee</th>
                  <td>{{optional($object)->reg_fees}}</td>
              </tr>
          </tbody>
      </table>
  </fieldset>
  <fieldset>
        <legend>Student Documents</legend>
        <table class="table">

            <tbody>
                <tr>
                    <th>10th Certificate</th>
                    <td>
                        
                        
                        <a href="{{ asset('uploads/student_document/certificate_10/'.optional($document)->certificate_10)}}" target="_blank">View 10th Certificate</a>
                    </td>    
                      
                </tr>
                <tr>
                    <th>12th Certificate</th>
                    <td><a href="{{ asset('uploads/student_document/certificate_12/'.optional($document)->certificate_12)}}" target="_blank"> View 12th Certificate</a></td>
                </tr>
                <tr>
                    <th>Other Certificates</th>
                    <td><a href="{{ asset('uploads/student_document/certificate_other/'.optional($document)->certificate_other)}}" target="_blank">  View Other Doc </a></td> 
                </tr>
            </tbody>
        </table>
    </fieldset>
    
</body>

</html>



