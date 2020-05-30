<?php
    function koneksidb(){
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "dbtodo";

        return new PDO("mysql:host={$host};dbname={$db}",$username,$password);
    }

    $dbconn = koneksidb();

    if(isset($_POST['simpan'])){        
        $query = $dbconn->prepare("insert into tbltodo(todo) values(:todo)");
        $query->bindParam(':todo',$_POST['todo']);
        $query->execute();

        header("location:index.php");     
    }else{
        if(isset($_GET['id']) || isset($_GET['mode'])){            
            if($_GET['mode']=="selesai"){
                $query = $dbconn->prepare('update tbltodo set status=1 where id=:id');
                $query->bindParam(":id",$_GET["id"]);                

                $query->execute();
            }elseif($_GET['mode']=="hapus"){
                $query = $dbconn->prepare('delete from tbltodo where id=:id');
                $query->bindParam(":id",$_GET["id"]);                

                $query->execute();
            }
            header("location:index.php");         
        }else{            
            $dbcon = koneksidb();

            $query = $dbcon->prepare("select * from tbltodo");
            $query->execute();
    
            $data = $query->fetchAll();
        }
    }    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Native Way</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .selesai {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="offset-md-3 col-md-6 mt-2">
            <h1>Todo List</h1>

            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="todo">                
                </div>
                <div class="form-group float-right">
                    <input type="submit" value="Simpan" class="btn btn-success" name="simpan">
                </div>
            </form>
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Todo</th>
                        <th colspan=2>Actions</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($data)){
                        $i=1;
                        foreach($data as $row){                            
                            echo "<tr>    
                                    <td>".$i++.".</td>
                                    <td class=".($row["status"]==1?"selesai":"").">{$row['todo']}</td>
                                    <td width='5%'><a href='index.php?id=".$row['id']."&mode=selesai' 
                                        class='btn btn-success btn-block ".($row['status']==1?'disabled':'')."'>Selesai</a></td>
                                    <td width='5%'><a href='index.php?id=".$row['id']."&mode=hapus' class='btn btn-danger btn-block'>Hapus</a></td>
                                </tr>";
                        }
                    }
                ?>                                    
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>