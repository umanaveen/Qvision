<?php

require '../../connect.php';
include("../../user.php"); 
$candidateid=$_REQUEST['id'];
$remarks_md=$_REQUEST['remarks_md'];
$md_recruiter=$_REQUEST['md_recruiter'];
$status=1;
$date=date('Y-m-d');
$userid=$_SESSION['userid'];
$query=$con->query("insert into md_commands(candidate_id, md_commands, md_status, status, created_by, created_on)values('$candidateid','$remarks_md','$md_recruiter','$status','$userid','$date')");


$sql2= $con->query("Update technical_team_details set head_status='$md_recruiter' where candidate_id='$candidateid'");
$sql1= $con->query("Update recruiter_details set status_recruiter='$md_recruiter' where candidate_id='$candidateid'");
$sql3= $con->query("Update candidate_form_details set status='$md_recruiter' where id='$candidateid'");
$sql4= $con->query("Update ctc_approval_table set status='$md_recruiter' where candidate_id='$candidateid'");

if($sql4)
{
    echo "<script>alert('Successfully Updated');</script>";
    header("location:/Qvision/index.php");
}
?>