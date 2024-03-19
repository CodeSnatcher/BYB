<!DOCTYPE html>
<html lang="en">
<head>
    <title>Application-Submitted&Fee</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
         *{margin:0px; padding:0px;}
        .outer-div{border:1px solid #000; padding:20px; margin: 20px auto; max-width: 940px; font-size: 14px; line-height: 1.5; font-family: Poppins, sans-serif;}
        .link{color:#ff000f; text-decoration: none;}
        .link:hover {color:#000;} .font{font-size: medium; font-weight: 700; margin-top: -5px;}
        h1,h2,h3{font-weight: 700; margin-bottom: 10px;} p{margin-bottom: 13px;}
    
    </style>
</head>
<body>
    <div class="outer-div">
        <div>
            <h1>Dear {{ $app_sub_data['uni_name']}}</h1>
            <p>We wish to acknowledge your successful submission of a Provisional Application for admission to {{ $app_sub_data['uni_name']}} for {{ $app_sub_data['crs_name']}} program for the academic session of 2024-25. 
            </p>
            <p>We congratulate you for making the right choice for your career by opting for {{ $app_sub_data['uni_name']}}, which is among the top institutes in India.</p>
            <p>As you have deposited the registration fee you are advised to upload all your eligibility documents as mentioned in the portal: (<a href="https://bringyourbuddy.in/admin/public/offerLetter_upload/{{ $app_sub_data['stu_id']}}/{{ $app_sub_data['uni_id']}}/{{ $app_sub_data['course_id']}}" class="link">Upload Documents</a>) and submit your application on priority.</p>        
            <p>The final processing of your application and completion of the admission process will be subjected to the verification of supporting documents confirming your eligibility to undertake admission in the above said program. </p>
            <p>Your Learner ID for {{ $app_sub_data['uni_name']}} will be sent to you soon after the verification of your documents.  This Learner ID can be used for any future correspondence with the {{ $app_sub_data['uni_name']}} </p>
            <h3>On behalf of {{ $app_sub_data['uni_name']}}, I once again congratulate you and hope you will be able to fulfill your professional dreams.</h3>
            <p class="font">Best Wishes,</p>
            <p class="font">Director Admissions</p>
        </div>
    </div>
</body>
</html>