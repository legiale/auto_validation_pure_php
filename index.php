<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>hello</title>
    </head>
    <body>
        <h1>lala</h1>
        <?php
        // put your code here
        $form_data = filter_input_array(INPUT_POST);
        if($form_data){
            print_r($form_data);
          
        }
        ?>
        <div style="text-align: center;" id="container">
            <div style="display: inline-block; width : 800px ; background-color: #8dc556; padding: 25px !important;">
                <form action="" name="test" method="post">
                    <p style="float: left">full_name:</p>
                    <p>
                        <input check_validate="on" class="form-control" type="text" name="full_name__Ak3K10R">
                    <p class="text-danger" id="full_name__Ak3K10R_error_place">{form_error("full_name__Ak3K10R")}</p>
                    </p>
                    <p style="float: left">address:</p>
                    <p>
                        <input check_validate="on" class="form-control" type="text" name="address__Rak5K10">
                    <p class="text-danger" id="address__Rak5K10_error_place">{form_error("address__Rak5K10")}</p>
                    </p>
                    <p style="float: left">birthday 3:</p>
                    <p>
                        <input check_validate="on" class="form-control" type="text" name="birthday__DR">
                    <p class="text-danger" id="birthday__DR_error_place">{form_error("birthday__DR")}</p>
                    </p>
                    <p style="float: left">phone_no:</p>
                    <p>
                        <input check_validate="on" class="form-control" type="text" name="phone_no__NR">
                    <p class="text-danger" id="phone_no__NR_error_place">{form_error("phone_no__NR")}</p>
                    </p>
                    <p>
                        <input type="submit" name="submit" value=" Submit ">
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>
