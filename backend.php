<?php
    include "config.php";

    if(isset($_POST['ifname']) || isset($_POST["ilname"]) || isset($_POST["idept"]) || isset($_POST["iemail"]) || isset($_POST["istatus"])){   
        $fname = $_POST['ifname'];
        $lname = $_POST['ilname'];
        $dept = $_POST['idept'];
        $email = $_POST['iemail'];
        $status =$_POST["istatus"];
        $sql="insert into studentss(fname,lname,dept,email,Status) values('$fname','$lname','$dept','$email','$status')";
        $ex=mysqli_query($con,$sql);

        if($ex){
           echo "Success";
        }
        else{
           echo "Failed";
        }
    }

if(isset($_POST['viewparam'])){
    $id = $_POST['viewparam'];
    
    $sql = "select * from studentss where id ='$id'";
    $ex = mysqli_query($con,$sql);

    if(mysqli_num_rows($ex)>0){
        foreach($ex as $row){
            echo $return ='
                <h5>First Name : '.$row['fname'].'</h5>
                <h5>Last Name : '.$row['lname'].'</h5>
                <h5>Department : '.$row['dept'].'</h5>
                <h5>Email : '.$row['email'].'</h5>
                <h5>Status : '.$row['Status'].'</h5>
            
            ';
        }
    }
}

if(isset($_POST['parameter'])){
    $id = $_POST['parameter'];
    $sql = "select * from studentss where id ='$id'";
    $ex = mysqli_query($con,$sql);
    @$fetch=mysqli_fetch_array($ex);
    echo $fetch['id'].",".$fetch['fname'].",".$fetch['lname'].",".$fetch['dept'].",".$fetch['email'].",".$fetch['Status'];
}
if(isset($_POST["uparam"]) ||isset($_POST['ufname']) || isset($_POST["ulname"]) || isset($_POST["udept"]) || isset($_POST["uemail"]) || isset($_POST["ustatus"])){   
    $uparam=$_POST["uparam"];
    $ufname = $_POST['ufname'];
    $ulname = $_POST['ulname'];
    $udept = $_POST['udept'];
    $usemail = $_POST['uemail'];
    $ustatus=$_POST["ustatus"];

    $sql="update studentss set fname='$ufname',lname='$ulname',dept='$udept',email='$usemail',Status='$ustatus' where id='$uparam'";
    $ex=mysqli_query($con,$sql);

    if($ex){
       echo "Success";
    }
    else{
       echo "Failed";
    }
}
if(isset($_POST['dparam'])){
    $id = $_POST['dparam'];

    $sql ="delete from studentss where id='$id'";
    $ex= mysqli_query($con,$sql);
    if($ex){
        echo "Success";
    }
    else{
        echo "Failed";
    }
}
if(isset($_POST["order"]) || isset($_POST["column_name"]) || isset($_POST["limits"])){
$output="";
$limit=$_POST["limits"];
@$order = $_POST["order"];
$col = $_POST['column_name'];
if($order == 'desc'){
    $order = 'asc';
}
else{
    $order = 'desc';
}

$query = "select * from studentss order by $col $order limit $limit";
$result = mysqli_query($con,$query);
$output.='<div class="card-body" id="mytables">
<table class="table" id="mytable">
    <thead class="table-dark">
        <tr>
            <th><a class="column_sort" id="fname" data-order="'.$order.'" href="#">First Name</a></th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
';
while($row = mysqli_fetch_array($result)){
    $output.='
    <tbody>
        <tr>
            <td>'.$row['fname'].'</td>
            <td>'.$row['lname'].'</td>
            <td>'.$row['dept'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['Status'].'</td>
            <td>
                <a class ="btn btn-info" onclick="views('.$row['id'].')">View</a>
                <a class="btn btn-warning" onclick="edits('.$row['id'].')">Edit</a>
                <a class ="btn btn-danger" onclick="deletes('.$row['id'].')">Delete</a>
                
            </td>
        </tr>    
    ';
}
$output.='</tbody></table></div>';
echo $output;
}
if(isset($_POST["pa"]) || isset($_POST["column_names"]) || isset($_POST["orders"]) ){
    $output="";
    $limit=$_POST["pa"];
    $order = $_POST["orders"];
    $col = $_POST['column_names'];
    $query = "select * from studentss order by $col $order  limit $limit";
    $result = mysqli_query($con,$query);
    $output.='<div class="card-body" id="mytables">
    <table class="table" id="mytable">
        <thead class="table-dark">
            <tr>
                <th><a class="column_sort" id="fname"  href="#">First Name</a></th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    ';
    while($row = mysqli_fetch_array($result)){
        $output.='
        <tbody>
            <tr>
                <td>'.$row['fname'].'</td>
                <td>'.$row['lname'].'</td>
                <td>'.$row['dept'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['Status'].'</td>
                <td>
                    <a class ="btn btn-info" onclick="views('.$row['id'].')">View</a>
                    <a class="btn btn-warning" onclick="edits('.$row['id'].')">Edit</a>
                    <a class ="btn btn-danger" onclick="deletes('.$row['id'].')">Delete</a>
                    
                </td>
            </tr>    
        ';
    }
    $output.='</tbody></table></div>';
    echo $output;
}
?>