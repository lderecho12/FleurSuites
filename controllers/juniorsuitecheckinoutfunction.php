<?php
    session_start();

    if($_SESSION) {
        $checkindate = date("Y-m-d"); ////sample
        $checkoutdate = date("Y-m-d", strtotime('+1 day', time())); ////sample

        $time = isset($_REQUEST['juniorsuitechecktime'])? $_REQUEST["juniorsuitechecktime"]:NULL;
        $checkin = isset($_REQUEST['juniorsuitecheckin'])? $_REQUEST["juniorsuitecheckin"]:NULL;
        $checkout = isset($_REQUEST['juniorsuitecheckout'])? $_REQUEST["juniorsuitecheckout"]:NULL;

        $validcheckin = date_create($checkin);
        $validcheckout = date_create($checkout);
        $validdays = date_diff($validcheckout, $validcheckin)->format('%a');

        $diff = strtotime($checkin) - strtotime($checkout);

        $validcheckin = new \DateTime($checkin);
        $validcheckout = new \DateTime($checkout);

        $interval = $validcheckin->diff($validcheckout);
        $validinterval = $interval->format('%r%a');
        
        if(isset($_REQUEST['reservebutton']) && $_REQUEST['reservebutton'] == "Reserve Now"){

            //Validations 
            if (empty($checkin) && empty($checkout)){
                echo "
                    <script>
                        window.alert('Fill in check-in and check-out dates');
                    </script>";
                echo "
                <script>
				    window.location.href=\"juniorsuite.php\";
                </script>";
            } else { 
                if ($validinterval < 1) {
                    echo "
                        <script>
                            window.alert('Enter valid check-in and check-out dates');
                        </script>";
                } else {
                        $_SESSION['time'] = $time;
                        $_SESSION['checkin'] = $checkin;
                        $_SESSION['checkout'] = $checkout;
                        $_SESSION['numofdays'] = $validdays;
                        $_SESSION['datereserved'] = $checkindate;
                        /* echo $_SESSION['checkin'] ; */
                        
                        echo "
                        <script>
                            window.location.href=\"../transaction/reservationsummary.php\";
                        </script>";
                    
                }
            }
        }

    }


?>