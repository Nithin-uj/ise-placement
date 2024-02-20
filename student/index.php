<?php
include 'function.php';
if(!is_student_login()){
    //echo "<br>sesson usn is not set <br>Not Logged in";
    //print_r($_SESSION);
    echo "<script>location='../index.php'</script>";
}
else{
    //print_r($_SESSION);
    include '../bootstrap.php';
    include 'header.php';
    ?>
    <div class="m-3">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
The <b>Training & Placement department</b> of NIE plays a vital role and is becoming a key department of the Institute. From the very beginning the institute lays greater emphasis on Industrial Training and Practical Training for engineering students. NIE is one among the first engineering college to establish the Training and Placement Department. Employment of the students of the college is our major concern. The Placement Cell serves to merely bridge the gap between a job-aspirant and a prospective employer.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Placement Cell interacts with more than 200 reputed organizations for arranging campus interviews for the final year BE/Mtech/MCA/PhD students. We make efforts to organize technical seminars, workshops and corporate expectation sessions. Industry personnel are invited periodically to enrich the knowledge of our student community with the latest technological innovations and industry practices. We produce graduates who are well equipped to handle the working norms of the industry.
<div class="" style="display:flex;justify-content:center;"><img class="m-3" src="https://nie.ac.in/wp-content/uploads/2022/10/3-years-Placement-Statistics.jpeg" width="500px"/></div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
The Training and Placement Department is located in the first floor of the Admin block. The Training and Placement Department has fully furnished seminar hall named as Sarvepalli Radhakrishnan Seminar hall for company presentations, group discussion rooms and conferencing facilities, interview and discussion rooms.

    </div>
    <?php
    include '../footer.php';
}
?>