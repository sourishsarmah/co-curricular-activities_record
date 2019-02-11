<!DOCTYPE html>
<html>

<style>
    body {
    background-image: url('background.jpg');
    /* background-color: #b3b1b1d5; */
    background-repeat: no-repeat;
	background-size: cover;
}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

#bth {
    background-color: #4CAF50;
    color: white;
    padding: 20px 35px;
    margin: 8px 0;
    font-size: 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    border-radius: 12px;
}


button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
.sc{
position:relative;
top:300px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

</style>

<body>
    <center>
        <h1 style="font-family: 'Georgia'; font-size: 50px;">Tezpur University</h1>
        <h1 style="font-family: 'Georgia'; font-size: 50px;">Extra Curricular Activities</h1>
    </center>

    <center>
        <button id="bth" class="sc" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">For New
            Entry</button>
    </center>
    <div id="id02" class="modal">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content animate" action="insert.php" method="post">
            <div class="container">
                <h1>Students Extra Curicular Activities</h1>
                <p>Please fill the form to insert a new record.</p>
                <hr>

                <label for="rn"><b>Roll Number</b></label>
                <input type="text" placeholder="Enter your roll number" name="rn" required>

                <label for="name"><b>Name</b></label>
                <table>
                    <tr>
                        <th width="400"><input type="text" placeholder="Enter Your First Name" name="fname" required></th>
                        <th width="400"><input type="text" placeholder="Enter Your Middle Name" name="mname" required></th>
                        <th width="400"><input type="text" placeholder="Enter Your Last Name" name="lname" required></th>
                    </tr>
                </table>

                <label for="sex"><b>SEX</b></label>
                <input type="radio" name="sex" value="M" checked> Male
                <input type="radio" name="sex" value="F"> Female</br></br></br>

                <label for="DOB"><b>Date of Birth</b></label>
                <input type="date" placeholder="Enter your Date of birth (FORMAT : DD-MM-YYYY)" name="DOB" required></br></br></br>

                <label for="sw"><b>Social Work</b></label>
                <select name="sw">
                    <option value='none'>None</option>
                    <?php
                    include("connection_str.php");

                    $query = "select * from social_work";
                    $query_str = oci_parse($con_str, $query);

                    if (!oci_execute($query_str)) {
                        print(oci_error($query_str));
                        exit;
                    }
                    while ($data = oci_fetch_array($query_str)) {
                        print("<option value='$data[0]'>$data[1]</option>");
                    }

                    ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="ca"><b>Cultural Activities</b></label>
                <select name="ca">
                    <option value='none'>None</option>
                    <?php
                    include("connection_str.php");

                    $query = "select * from cultural_activities";
                    $query_str = oci_parse($con_str, $query);

                    if (!oci_execute($query_str)) {
                        print(oci_error($query_str));
                        exit;
                    }
                    while ($data = oci_fetch_array($query_str)) {
                        print("<option value='$data[0]'>$data[1]</option>");
                    }

                    ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="sp"><b>Sports</b></label>
                <select name="sp">
                    <option value='none'>None</option>
                    <?php
                    include("connection_str.php");

                    $query = "select * from sports";
                    $query_str = oci_parse($con_str, $query);

                    if (!oci_execute($query_str)) {
                        print(oci_error($query_str));
                        exit;
                    }
                    while ($data = oci_fetch_array($query_str)) {
                        print("<option value='$data[0]'>$data[1]</option>");
                    }

                    ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="at"><b>Art</b></label>
                <select name="at">
                    <option value='none'>None</option>
                    <?php
                    include("connection_str.php");

                    $query = "select * from art";
                    $query_str = oci_parse($con_str, $query);

                    if (!oci_execute($query_str)) {
                        print(oci_error($query_str));
                        exit;
                    }
                    while ($data = oci_fetch_array($query_str)) {
                        print("<option value='$data[0]'>$data[1]</option>");
                    }

                    ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="lt"><b>Literary</b></label>
                <select name="lt">
                    <option value='none'>None</option>
                    <?php
                    include("connection_str.php");

                    $query = "select * from literary";
                    $query_str = oci_parse($con_str, $query);

                    if (!oci_execute($query_str)) {
                        print(oci_error($query_str));
                        exit;
                    }
                    while ($data = oci_fetch_array($query_str)) {
                        print("<option value='$data[0]'>$data[1]</option>");
                    }

                    ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br></br>


                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn" value="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <br><br>

    <center>
        <button id="bth" class="sc" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">&nbsp;&nbsp;For
            Retrival&nbsp;&nbsp;</button>
    </center>
    <div id="id03" class="modal">
        <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content animate" action="retrive.php" method="post">
            <div class="container">
                <h1>Students Extra Curicular Activities</h1>
                <p>Please fill any one of the part of your choice to retrive a record.</p>
                <hr>

                <table>
                    <tr>
                        <th width="600">
                            <center>
                                <table>
                                    <tr>
                                        <th>Search By Roll Number</th>
                                    </tr>
                                    <tr>
                                        <th><label for="roll_no"><b>Roll Number</b></label></th>
                                        <th width="25"></th>
                                        <th width="200"><input type="text" placeholder="Enter the roll number" name="roll_no"></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="clearfix">
                                                <button type="button" onclick="document.getElementById('id03').style.display='none'"
                                                    class="cancelbtn">Cancel</button>
                                                <button type="submit" class="signupbtn" value="searchbyroll" name="submit">Submit</button>
                                            </div>
                                        </th>
                                    </tr>

                                </table>

                        </th>
                        <th width="20"></th>
                        <th width="600">
                            <center>
                                <table>
                                    <tr>
                                        <th>Search By Category</br></th>
                                    </tr>
                                    <tr>
                                        <th><label for="cat"><b></br>Category</br></br></br></b></label></th>
                                        <th width="25"></th>
                                        <th><select name="cat">
                                                <option value="social_work">Social Work</option>
                                                <option value="cultural_activities">Cultural Activity</option>
                                                <option value="sports">Sport</option>
                                                <option value="art">Art</option>
                                                <option value="literary">Literary</option>
                                            </select></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="clearfix">
                                                <button type="button" onclick="document.getElementById('id03').style.display='none'"
                                                    class="cancelbtn">Cancel</button>
                                                <button type="submit" class="signupbtn" value="searchbycat" name="submit">Submit</button>
                                            </div>
                                        </th>
                                    </tr>
                                </table>

                        </th>

                    </tr>
                </table>

            </div>
        </form>
    </div>

    <br><br>

    <center>
        <button id="bth" class="sc" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
    </center>
    <div id="id01" class="modal">

        <form class="modal-content animate" action="login.php" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" name="submit">Login</button>

            </div>
        </form>
    </div>



    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Get the modal
        var modal = document.getElementById('id03');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>