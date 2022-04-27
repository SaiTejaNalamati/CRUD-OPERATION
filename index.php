<?php
    include "config.php"
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USERS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
        </script>
        <link rel = "stylesheet" href = "https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <script src = "https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
        </script>
        <script src = "https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js">
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </head>
  <body>
  <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                    <div class="modal-body">
                    <div class="form-group">
                          
                            <input type="hidden" id="studentid" class="form control">
                        </div>
                        <div class="form-group">
                            <label for="">First Name</label><br>
                            <input type="text" id="studentfname" name="fname" class="form control" size=57 placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label><br>
                            <input type="text" id="studentlname" name="lname" class="form control" size=57 placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="">Department</label><br>
                            <input type="text" id="studentdept" name="dept" class="form control" size=57 placeholder="Enter your Department">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label><br>
                            <input type="text" id="studentemail" name="email" class="form control" size=57 placeholder="Enter your EmailID">
                        </div>
                        <div class="form-group">
                           <label for="">Status</label><br>
                        <select id="leave"  class="form-control">
                            <option value="Active">Active</option>
                            <option value="InActive">InActive</option>
                         </select>
                       </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
                    <button type="submit" name="save" class="btn btn-primary" id="save">Save</button>
                    <button type="submit" name="updates" class="btn btn-primary" id="updates">Update</button>
                 </div>
            </div>
        </div>
    </div>
    <script>
        $("#save").hide();
        $("#close").hide();
        $("#updates").hide();
    </script>
  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="viewdata">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="backend.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="deleteid" id="deleteid">
                        <h4>Are you sure you want to delete?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button"  class="btn btn-danger" id="dels">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                        <h4>USERS
                           
                        <button type="button" class="btn btn-primary"  style="margin-left:900px;" data-bs-toggle="modal" data-bs-target="#studentModal">
                            ADD
                        </button>
                        </h4>
                        <form method="post" action="index.php">
                        <div class="form-group row">
                        <div class="col-md-3">
                            <select id="leaves"  name="leaves"  class="form-control">
                            <option value="All">All</option>
                            <option value="Active">Active</option>
                            <option value="InActive">InActive</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                         <button type="submit" class="btn btn-primary">GET</button>
                         </div>
                         <div class="col-md-1" style="margin-left:426px;margin-top:5px;">
                            <select id="pag"  name="pag" onchange="leaveChange()" class="form-control">
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            </select>
                        </div>
                         </div>
                        </form>
                    </div>
                    <input type="hidden" id="lim" name="lim">
                    <form action="" method="POST">
                    <div class="card-body" id="mytables">
                        
                        <table class="table" id="mytable">
                            <thead class="table-dark">
                                <tr>
                                <th><a class="column_sort" id="fname" data-order="desc" href="#">First Name</a></th>
                                <th>Last Name</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $limit=3;
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $start = ($page - 1) * $limit;
                                $sql1="select * from studentss ORDER By fname desc limit $start,$limit";
                                $result=mysqli_query($con,$sql1);
                                $ex = $result->fetch_all(MYSQLI_ASSOC);
                               
                                $Previous = $page - 1;
                                $Next = $page + 1;
                            ?>
                                <?php
                                if(isset($_POST["leaves"]))
                                {
                                       $a=$_POST["leaves"];
                                        if($a!="All")
                                        {
                                        $sql1="select * from studentss  where Status='$a' limit $start,$limit";
                                        $result=mysqli_query($con,$sql1);
                                      
                                        while($row=mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['fname'];?></td>
                                                <td><?php echo $row['lname'];?></td>
                                                <td><?php echo $row['dept'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['Status'];?></td>
                                                <td>
                                                   
                                                    <a class ="btn btn-info" onclick="views('<?php echo $row['id'];?>')">View</a>&nbsp;
                                                    <a class="btn btn-warning" onclick="edits('<?php echo $row['id'];?>','<?php echo $row['fname'];?>','<?php echo $row['lname'];?>','<?php echo $row['dept'];?>','<?php echo $row['email'];?>')">Edit</a>
                                                    <a class ="btn btn-danger" onclick="deletes('<?php echo $row['id'];?>')">Delete</a>
                                                </td>
                                            </tr>                       
                                            <?php
                                        }
                                    }
                                    else{
                                         
                                        $sql2="select * from studentss  limit $start,$limit";
                                        $result2=mysqli_query($con,$sql2);
                                        while($row1=mysqli_fetch_array($result2)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row1['fname'];?></td>
                                                <td><?php echo $row1['lname'];?></td>
                                                <td><?php echo $row1['dept'];?></td>
                                                <td><?php echo $row1['email'];?></td>
                                                <td><?php echo $row1['Status'];?></td>
                                                <td>
                                                   
                                                    <a class ="btn btn-info" onclick="views('<?php echo $row1['id'];?>')">View</a>&nbsp;
                                                    <a class="btn btn-warning" onclick="edits('<?php echo $row1['id'];?>','<?php echo $row1['fname'];?>','<?php echo $row1['lname'];?>','<?php echo $row1['dept'];?>','<?php echo $row1['email'];?>')">Edit</a>
                                                    <a class ="btn btn-danger" onclick="deletes('<?php echo $row1['id'];?>')">Delete</a>
                                                </td>
                                            </tr> 
                                                                                        
                                            <?php
                                        }
                                    }
                                    }
                                    else{
                                         
                                        $sql2="select * from studentss  limit $start,$limit";
                                        $result2=mysqli_query($con,$sql2);
                                        while($row1=mysqli_fetch_array($result2)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row1['fname'];?></td>
                                                <td><?php echo $row1['lname'];?></td>
                                                <td><?php echo $row1['dept'];?></td>
                                                <td><?php echo $row1['email'];?></td>
                                                <td><?php echo $row1['Status'];?></td>
                                                <td>
                                                   
                                                    <a class ="btn btn-info" onclick="views('<?php echo $row1['id'];?>')">View</a>&nbsp;
                                                    <a class="btn btn-warning" onclick="edits('<?php echo $row1['id'];?>','<?php echo $row1['fname'];?>','<?php echo $row1['lname'];?>','<?php echo $row1['dept'];?>','<?php echo $row1['email'];?>')">Edit</a>
                                                    <a class ="btn btn-danger" onclick="deletes('<?php echo $row1['id'];?>')">Delete</a>
                                                </td>
                                            </tr> 
                                                                                        
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
             $sql2 = "select count(id) as id from studentss";
             $result2 = mysqli_query($con,$sql2);
             $excount = $result2->fetch_all(MYSQLI_ASSOC);
             $total = $excount[0]['id'];
             $pages = ceil( $total / $limit );
             
        ?>
        <nav aria-label="Page navigation example">
					<ul class="pagination">
				    <li  class="page-item">
				      <a  class="page-link"href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php for($page = 1; $page<= $pages; $page++) : ?>
				    	<li  class="page-item"><a  class="page-link"href="index.php?page=<?= $page ; ?>"><?= $page ; ?></a></li>
				    <?php endfor; ?>
				    <li  class="page-item">
				      <a  class="page-link"href="index.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true"> &raquo;</span>
				      </a>
				    </li>
				</ul>
		</nav>
    </div>
    
<script>
    const edits=(parameter,fname,lname,dept,email)=>{
        $("#updates").show();
        $("#close").show();
        $("#save").hide();
        $.ajax({
            url:"backend.php",
            method:"post",
            async:false,
            data:{
                "parameter":parameter,
                "fname":fname,
                "lname":lname,
                "dept":dept,
                "email":email
            },
            success:function(data)
            {
                var get_val=data.split(",");
                $("#studentid").val(get_val[0])
                $("#studentfname").val(get_val[1]);
                $("#studentlname").val(get_val[2]);
                $("#studentdept").val(get_val[3]);
                $("#studentemail").val(get_val[4]);
                $("#leave").val(get_val[5]);
                $('#studentModal').modal('show');
            }
        });
    }
</script>
<script>
    $("#updates").hide();
    $("#save").show();
    $("#close").show();
    $(document).ready(function(){
        $("#save").click(function(){
            var fname=$("#studentfname").val();
            var lname=$("#studentlname").val();
            var dept=$("#studentdept").val();
            var semail=$("#studentemail").val();
            var status=$("#leave").val();
            if(fname == "" || lname == "" || dept =="" || semail=="" || status=="")
            {
                alert("Complete All Fields");
            }
            else
            {
                $.ajax({
                    url:"backend.php",
                    method:"post",
                    async:false,
                    data:{
                        "ifname":fname,
                        "ilname":lname,
                        "idept":dept,
                        "iemail":semail,
                        "istatus":status
                    },
                    success:function(data)
                    {
                        
                            setTimeout(function(){
                                window.location.replace("index.php");
                            })
                         
                    }
                });
            }

        });
    });
</script>
<script>
           $(document).ready(function(){
            $("#updates").click(function(){

            var ufname=$("#studentfname").val();
            var ulname=$("#studentlname").val();
            var udept=$("#studentdept").val();
            var usemail=$("#studentemail").val();
            var status=$('#leave').val();
            var a=$("#studentid").val();

            if(ufname == "" || ulname == "" || udept =="" || usemail=="" ||status=="")
            {
                alert("Complete All Fields");
            }
            else
            {
                $.ajax({
                    url:"backend.php",
                    method:"post",
                    async:false,
                    data:{
                        "uparam":a,
                        "ufname":ufname,
                        "ulname":ulname,
                        "udept":udept,
                        "uemail":usemail,
                        "ustatus":status
                    },  
                    success:function(data)
                    {  setTimeout(function(){
                                window.location.replace("index.php");
                            })
                         
                    }
                });
            }
    });
});
</script>
<script>
    const deletes=(del_id)=>{
        $('#deleteModal').modal('show');
        $("#dels").click(function(){
            $.ajax({
                    url:"backend.php",
                    method:"post",
                    async:false,
                    data:{
                        "dparam":del_id,
                    },
                    success:function(data)
                    {
                        setTimeout(function(){
                                window.location.replace("index.php");
                        })
                   }
                });
        });
    }
</script>
<script>
    const views=(view_id)=>{
        $('#viewModal').modal('show');
        $.ajax({
                    url:"backend.php",
                    method:"post",
                    async:false,
                    data:{
                        "viewparam":view_id,
                    },
                    success:function(data)
                    {
                        $('.viewdata').html(data);
                    }
            });
    }
</script>
<input type="hidden" id="limits" value="<?php echo $limit;?>">
<script>
    $(document).ready(function () {
        $(document).on('click','.column_sort',function(){
            var column_name = $(this).attr("id");
            var order = $(this).data("order");
            var id=document.getElementById("pag").value;
            document.getElementById("lim").value=id;
            var res = document.getElementById("lim").value;
            var arrow ='';    
            $.ajax({
                url: "backend.php",
                method:"POST",
                data: {column_name:column_name,order:order,"limits":res},
                success: function (data) {
                    $('#mytables').html(data);
                    $('#'+column_name+'').append(arrow);
                }
            });
        });
    });
</script>
<script>
    function leaveChange()
    {
        var id=document.getElementById("pag").value;
        document.getElementById("lim").value=id;
        var res = document.getElementById("lim").value;
        var column_name = "fname";
        var order="desc";
        $.ajax({
            url:"backend.php",
            method:"post",
            async:false,
            data:{
                "pa":res,
                "column_names":column_name,
                "orders":order
            },
            success:function(data)
            {
                $("#mytables").html(data)
            }
        });
    }
</script>
</body>
</html>