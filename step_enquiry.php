<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program-university</title>

    <?php include('includes/header_script.php'); ?>

    <style>
        #course_section {
            height: 600px !important;
            overflow: auto !important;
        }
    </style>
</head>

<body>
    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();
    $type_id = $_GET['id'];
    $cat_array = $db->cat_data($type_id);



    ?>

    <section id="course_cat" class="my-5">
        <div class="container">
            <h1 class="text-center my-5">Which would you like to pursue ?</h1>
            <div class="mt-5">
                <div class="row">
                    <?php
                    for ($i = 0; $i < count($cat_array); $i++) {
                    ?>
                        <div class="col-auto">
                            <div class="shadow border p-2 mb-3" style="border-radius: 20px !important;"><?php echo $cat_array[$i]['course_category']; ?> <i class="fa-solid fa-arrow-right ms-2 fs-5 mx-auto p-2 rounded-circle border"></i></div>
                        </div>
                    <?php

                    }

                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/light_footer.php'); ?>
    <?php include('includes/footer_script.php'); ?>

</body>



</html>