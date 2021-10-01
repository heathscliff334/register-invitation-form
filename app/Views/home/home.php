<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'><link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css');  ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .content-body{
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;

            -ms-flex-align: center;
            -webkit-align-items: center;
            -webkit-box-align: center;

            align-items: center;
            justify-content: center;
            min-height: calc(100% - 25px);
        }    
        .content-footer{
            color: #9c9c9c;
            border-top: 1px solid rgba(0,0,0,.1);
            margin-top: 30px;
            padding-top: 15px;
        }
        .content-footer2{
            color: #9c9c9c;
            border-top: 1px solid rgba(0,0,0,.1);
            padding-top: 15px;
        }
        @media only screen and (max-width: 40em) {
			.content-body{
                min-height: calc(100% - 60px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5" style="min-height: 500px;">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div id="formId" class="card-body" style="">
                        <h5 class="card-title text-center">Invitation Form</h5>
                        <hr>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="custId" class="form-control" placeholder="Customer ID" value="<?php echo $user['kode_cst'] ?>" disabled required>
                                <label for="custId">Customer ID</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="iposId" class="form-control" placeholder="Customer ID" value="<?php echo $user['id_ipos'] ?>" disabled required>
                                <label for="iposId">IPOS ID</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="fullName" class="form-control" placeholder="Fullname*" required autofocus>
                                <label for="fullName">Fullname<font style="color: red;">*</font></label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="phone" class="form-control" placeholder="Phone*" onkeypress="numberOnly(event)" required autofocus>
                                <label for="phone">Phone<font style="color: red;">*</font></label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="email" class="form-control" placeholder="Email Address" value="<?php echo $user['email'] ?>" disabled required>
                                <label for="email">Email Address</label>
                            </div>
                            <div class="form-label-group">
                                <input type="date" id="birthday" class="form-control" placeholder="Birthday*" required autofocus>
                                <label for="birthday">Birthday<font style="color: red;">*</font></label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="iposName" class="form-control" placeholder="IPOS Name" value="<?php echo $user['nama_ipos'] ?>" disabled required>
                                <label for="iposName">IPOS Name</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="city" class="form-control" placeholder="City" value="<?php echo $user['kota'] ?>" disabled required>
                                <label for="city">City</label>
                            </div>
                            <hr>
                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="Password*" required>
                                <label for="password">Password<font style="color: red;">*</font></label>
                            </div>
                            <p id='message' style="margin-bottom: 5px; margin-left: 10px;"></p>
                            <div class="form-label-group">
                                
                                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password*" onkeyup="check();" required>
                                <label for="confirmPassword">Confirm Password<font style="color: red;">*</font></label>
                            </div>
                            
                            <p id="errorMessage" style="color: red;"></p>
                            

                            <!-- <button class="btn btn-lg btn-primary btn-block text-uppercase" onclick="submitForm()">Submit</button> -->
                            <a id="btnSubmit" class="btn btn-lg btn-primary btn-block text-uppercase disabled text-white" onclick="submitForm()"><i class="fa fa-spinner fa-spin" id="spinner_id" style="display: none;"></i><i class="fa fa-check" id="check_id" style="display: none;"></i> Submit</a>
                        </form>
                        <div class="content-footer text-center">
                            <!-- <hr> -->
                            <label for="footer">Copyright © 2021 PT. IS Ing Silver.</label>
                        </div>
                    </div>
                    <div id="formSuccess" class="card-body" style="display: none;">
                        <div class="content-body">
                            <h5 class="card-title text-center">Success</h5>
                        </div>
                        <div class="content-footer2 text-center">
                            <!-- <hr> -->
                            <label for="footer">Copyright © 2021 PT. IS Ing Silver.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function numberOnly(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
        }    
        var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirmPassword').value) {
            document.getElementById('confirmPassword').style.color = '#4C84FF';
            document.getElementById('message').style.color = '#4C84FF';
            document.getElementById('message').innerHTML = 'Password match.';
            $('#btnSubmit').removeClass('disabled');
        } else {
            document.getElementById('confirmPassword').style.color = 'red';
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Password do not match!';
            $('#btnSubmit').addClass('disabled');
            }
        }
        function submitForm(){
            
            var custId = document.getElementById('custId').value;
            var fullName = document.getElementById('fullName').value;
            var phone = document.getElementById('phone').value;
            var birthday = document.getElementById('birthday').value;
            var password = document.getElementById('password').value;
            
            $("#spinner_id").show('slow');
            $.ajax({
                url : "<?php echo base_url('home/submitForm')?>",
                type: 'POST',
                data: {custId:custId, fullName:fullName, phone:phone, birthday:birthday, password:password},
                success : function(data){
                    var obj = jQuery.parseJSON(data);
                    console.log(obj);
                    if(obj.error == false){
                        console.log(obj.status);   
                        setTimeout(() => {
                            $("#spinner_id").css("display", "none");
                            $("#check_id").css("display", "");
                            $("#check_id").removeClass("fa-times");
                            $("#check_id").addClass("fa-check");
                            setTimeout(() => {
                                $("#check_id").hide('slow');
                            }, 2000);
                            $("#formId").slideUp('slow');
                            $("#formSuccess").slideDown('slow');
                        }, 2000);         
                    } else {
                        console.log(obj.status);
                        setTimeout(() => {
                            $("#spinner_id").css("display", "none");
                            $("#check_id").css("display", "");
                            $("#errorMessage").slideDown('slow');
                            $("#check_id").addClass("fa-times");
                            $("#check_id").removeClass("fa-check");
                            document.getElementById('errorMessage').innerHTML = obj.errorMessage;
                            setTimeout(() => {
                                $("#check_id").hide('slow');
                            }, 2000);
                        }, 2000);      
                    }
                },
                error: function(){
                alert("Server Error");
                }
            });  
        }        
    </script>
</body>
<!-- partial -->
</html>
