<?php include "../../models/Users.php"; ?>

<?php
    session_start();

	$loginemail = isset($_REQUEST['loginemail'])? $_REQUEST["loginemail"]:NULL;
    $loginpass = isset($_REQUEST['loginpass'])? $_REQUEST["loginpass"]:NULL;
    $loginadmin = isset($_REQUEST['loginadmin'])? $_REQUEST["loginadmin"]:NULL;
    $loginremember =  isset($_REQUEST['loginremember'])? $_REQUEST["loginremember"]:NULL;


    $users = new Users();
    
    $loggedin = false;
 
	if(isset($_REQUEST['loginbutton']) && $_REQUEST['loginbutton'] == "Login"){
        $rows = $users->select_all_user();
        $adminrows = $users->select_all_admin();

        if (isset($_REQUEST['loginadmin'])) {
            foreach($adminrows as $index => $values){
                $email = $values['adminemail'];
                $pass = $values['adminpassword'];
                if($email == $loginemail && $pass == $loginpass){
                    $loggedin = true;

                    //Sessions  
                    if ($_POST && !empty($_POST['adminemail']) && !empty($_POST['adminpassword'])){
                        $_SESSION['adminid'] = $values['adminid'];
                    }
                    if (!empty($values['adminfirstname'])){
                        $_SESSION['adminid'] = $values['adminid'];
                        $_SESSION['adminfirstname'] = $values['adminfirstname'];
                    }
                    if ($_POST && !empty($_POST['loginemail'])){
                        $_SESSION['adminid'] = $values['adminid'];
                        $_SESSION['loginemail'] = $_POST['loginemail'];
                    }
                    if ($_POST && !empty($_POST['adminpassword'])){
                        $_SESSION['adminid'] = $values['adminid'];
                        $_SESSION['adminpassword'] = $_POST['adminpassword'];
                    }

                    echo "
                    <script>
                        window.location.href=\"../admin/adminhome.php\";
                    </script>";
                }    
            }
        } else {
            foreach($rows as $index => $values){
                if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
                    $loggedin = true;
                    //Sessions  
                    if ($_POST && !empty($_POST['loginemail']) && !empty($_POST['loginpass'])){
                        $_SESSION['userid'] = $values['userid'];
                    }
                    if ($_POST && !empty($_POST['loginemail'])){
                        $_SESSION['loginemail'] = $_COOKIE['loginemail'];
                    }
                    if ($_POST && !empty($_POST['loginpass'])){
                        $_SESSION['loginpass'] = $_COOKIE['loginpass'];
                    }
                    if (!empty($values['userfirstname'])){
                        $_SESSION['userfirstname'] = $_COOKIE['userfirstname'];
                    }
                    if (!empty($values['userlastname'])){
                        $_SESSION['userlastname'] = $_COOKIE['userlastname'];
                    }
                    if (!empty($values['userphonenumber'])){
                        $_SESSION['userphonenumber'] = $_COOKIE['userphonenumber'];
                    }
                    if (!empty($values['usercountry'])){
                        $_SESSION['usercountry'] = $_COOKIE['usercountry'];
                    }
                    if (!empty($values['usercountrycode'])){
                        $_SESSION['usercountrycode'] = $_COOKIE['usercountrycode'];
                    }

                  /*   echo "
                    <script>
                        window.location.href=\"../index.php?select=yes\";
                    </script>"; */
                }
                
                $email = $values['useremail'];
                $pass = $values['userpassword'];
                if($email == $loginemail && $pass == $loginpass){
                    $loggedin = true;

                    if (isset($_REQUEST['loginremember'])) {
                        //Cookies
                        setcookie("userid" , $values['userid']);
                        setcookie("loginemail" , $email);
                        setcookie("loginpass" , $pass);
                        setcookie("userfirstname" , $values['userfirstname']);
                        setcookie("userlastname" , $values['userlastname']);
                        setcookie("userphonenumber" , $values['userphonenumber']);
                        setcookie("usercountry" , $values['usercountry']);
                        setcookie("usercountrycode" , $values['usercountrycode']);
                        
                    }

                    //Sessions  
                    if ($_POST && !empty($_POST['loginemail']) && !empty($_POST['loginpass'])){
                        $_SESSION['userid'] = $values['userid'];
                    }
                    if ($_POST && !empty($_POST['loginemail'])){
                        $_SESSION['loginemail'] = $_POST['loginemail'];
                    }
                    if ($_POST && !empty($_POST['loginpass'])){
                        $_SESSION['loginpass'] = $_POST['loginpass'];
                    }
                    if (!empty($values['userfirstname'])){
                        $_SESSION['userfirstname'] = $values['userfirstname'];
                    }
                    if (!empty($values['userlastname'])){
                        $_SESSION['userlastname'] = $values['userlastname'];
                    }
                    if (!empty($values['userphonenumber'])){
                        $_SESSION['userphonenumber'] = $values['userphonenumber'];
                    }
                    if (!empty($values['usercountry'])){
                        $_SESSION['usercountry'] = $values['usercountry'];
                    }
                    if (!empty($values['usercountrycode'])){
                        $_SESSION['usercountrycode'] = $values['usercountrycode'];
                    }

                    echo "
                    <script>
                        window.location.href=\"../index.php?select=yes\";
                    </script>";
                }    
            }
        }
        
        if($loggedin == false) {
            echo "
                <script>
                    window.alert('Invalid Username or Password!');
                </script>";
        }

	}

	$users->close();


?>