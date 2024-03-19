<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration-Email</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        *{margin:0px; padding:0px;}
        .outer-div{border:1px solid #000; padding:20px; margin: 20px auto; max-width: 940px; font-size: 14px; line-height: 1.5; font-family: Poppins, sans-serif;}
        .d-flex {display: flex; align-items: center; justify-content: space-between;}
        .text-center {text-align: center;}
        .com-bg-format {background-color:#f5f1f1; padding: 20px; margin:20px 0;}

        .link{color:#ff000f; text-decoration: none;}
        .link:hover {color:#000;}
        h2,h3,h4{font-weight: 700; margin-bottom: 10px;}
    </style>
</head>
<body>
   <div class="outer-div">
        <div class="d-flex text-center">
            <div>
                <img src="https://new.bringyourbuddy.in/assets/images/byb_logo.png" alt="Bring Your Buddy" height="80px">
                <p><a href="https://bringyourbuddy.in" class="link">https://bringyourbuddy.in</a></p>
            </div>
            <div>
                <img src="/BYB-Project/registration-email/studyindia.png" alt="Study India" height="90px">
                <p><a href="https://studyindia.io" class="link">https://studyindia.io</a></p>
            </div>
        </div>
       <div class="com-bg-format">
            <h1>Dear {{ $e1_app_data['stu_name']}}</h1>
            <h2>Greetings !!! </h2>
            <p>Thank you for showing interest in {{ $e1_app_data['uni_name']}} <span style="font-weight: 800;">for</span> {{ $e1_app_data['crs_name']}} Program.</p>
        </div>
        <div class="com-bg-format">
            <!-- <h2><a href="#" class="link">Click here to complete Your Application Form</a></h4> -->
            <p>To help you explore more about the program, our Program Advisor will contact you at the earliest.</p>
            <p>For further any query, please contact us on +91{{ $e1_app_data['phone']}} or write us at query@bringyourbuddy.in</p>
        </div>
        <div>
            <h3>Director, International Admissions</h3>
            <ul style="margin-left: 0px; list-style: none;">
              <li><strong>Mobile & WhatsApp:</strong> <a href="tel:+91{{ $e1_app_data['phone']}}" class="link">+91{{ $e1_app_data['phone']}}</a></li>
              <li><strong>Official Email:</strong> <a href="mailto:query@bringyourbuddy.in" class="link">query@bringyourbuddy.in</a></li>
            </ul>
        </div>
    </div>
</body>
</html>