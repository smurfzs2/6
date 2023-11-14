<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Exercise 6</title>
    <?php
    
        include '../connection.php';

        if(isset($_POST['searchID']))
        {
            $idValue = $_POST['idValue'];    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE(`id`) LIKE '%".$idValue."%'";
            $search_result = filterTable($query);
            
        }
        else if(isset($_POST['searchFname']))
        {
            $fnameValue = $_POST['fnameValue'];    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE(`firstName`) LIKE '%".$fnameValue."%'";
            $search_result = filterTable($query);
            
        }
        else if(isset($_POST['searchLname']))
        {
            $lnameValue = $_POST['lnameValue'];    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE(`lastName`) LIKE '%".$lnameValue."%'";
            $search_result = filterTable($query);
            
        }
        else if(isset($_POST['searchBday']))
        {
            $bdayValue = $_POST['bdayValue'];    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE(`birthday`) LIKE '%".$bdayValue."%'";
            $search_result = filterTable($query);
            
        }
        else if(isset($_POST['searchAddress']))
        {
            $addressValue = $_POST['addressValue'];    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE (`address`) LIKE '%".$addressValue."%'";
            $search_result = filterTable($query);
            
        }
        else if(isset($_POST['searchGender']))
        {
            $genderValue = $_POST['genderValue'] ? '1':'0';    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE(`gender`) LIKE '%".$genderValue."%'";
            $search_result = filterTable($query);
            
        }
        else if(isset($_POST['searchDepartment']))
        {
            $departmentValue = $_POST['departmentValue'];    
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId WHERE(`departmentName`) LIKE '%".$departmentValue."%'";
            $search_result = filterTable($query);
            
        }
        
        else {
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId";;
            $search_result = filterTable($query);

        }

        function getData($db)
        {
            $query = "SELECT * FROM `tbl_jeramay` INNER JOIN `hr_department` ON tbl_jeramay.departmentId=hr_department.departmentId";
            return $result = mysqli_query($db, $query);
        }

        function getDepartment($db)
        {
            $query = "SELECT * FROM `hr_department`";
            return $result = mysqli_query($db, $query);
        }

        function filterTable($query)
        {
            $connect = mysqli_connect("localhost", "root", "arktechdb", "ojtDatabase");
            $filter_Result = mysqli_query($connect, $query);
            return $filter_Result;
        }
    ?>
</head>
<body>
    <div>        
    <div style="float: right">
            <h5><a href="jera_generateCSV.php" class="csv" ><i class="btn btn-info fas fa-file"></i> CSV</a></h5>
        </div>
        <div style="float: right">
            <h5><a href="jera_generatePDF.php" class="pdf" ><i class="btn btn-info fas fa-print"></i> PDF</a></h5>
        </div>
        <div style="float: right">
            <h5><a href="jera_inputForm.php" class="add" ><i class="fas fa-add"></i> Add</a></h5>  
        </div>
        
    </div>
    
    <div>
       
        <div></div>
        
    </div>

    <!-- filter -->
    <div>
        
        <ul class="nav">
            
            <li>
                <form action="jera_showTable.php" method="POST">
                    <input type="search" class="form-control rounded" placeholder="ID" name="idValue" value="<?php if(isset($_POST['idValue'])){echo $_POST['idValue'];} ?>"/>
                    <button type="submit" class="btn btn-outline-primary" name="searchID">Go!</button>
                </form>   
            </li>
            

            <li>
                <form action="jera_showTable.php" method="POST">
                    <input type="search" class="form-control rounded" placeholder="First Name" name="fnameValue" value="<?php if(isset($_POST['fnameValue'])){echo $_POST['fnameValue'];} ?>"/>
                    <button type="submit" class="btn btn-outline-primary" name="searchFname">Go!</button>
                </form>   
                
            </li>
            <li>
                <form action="jera_showTable.php" method="POST">
                    <input type="search" class="form-control rounded" placeholder="Last Name" name="lnameValue" value="<?php if(isset($_POST['lnameValue'])){echo $_POST['lnameValue'];} ?>" />
                    <button type="submit" class="btn btn-outline-primary" name="searchLname">Go!</button>
                </form>   
            </li>
            <li>
                <form action="jera_showTable.php" method="POST">
                    <input type="date" class="form-control rounded" placeholder="Birthday" name="bdayValue"  value="<?php if(isset($_POST['bdayValue'])){echo $_POST['bdayValue'];} ?>"/>
                    <button type="submit" class="btn btn-outline-primary" name="searchBday">Go!</button>
                </form>   
            </li>
            <li>
                <form action="jera_showTable.php" method="POST">
                    <input type="search" class="form-control rounded" placeholder="Address" name="addressValue"  value="<?php if(isset($_POST['addressValue'])){echo $_POST['addressValue'];} ?>"/>
                    <button type="submit" class="btn btn-outline-primary" name="searchAddress">Go!</button>
                </form> 
            </li>
            <li>
                <form action="jera_showTable.php" method="POST">
                        <select class="form-control rounded" style=" width:65%;" name="genderValue">
                            <option value="" disabled selected hidden>
                                <?php 
                                    if(isset($_POST['genderValue']))
                                    {
                                        echo $_POST['genderValue'] ? 'Female': 'Male';
                                    } 
                                    else
                                    {
                                        echo "Gender";
                                    }
                                ?>
                            </option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>    
                        <button type="submit"  class="btn btn-outline-primary" name="searchGender">Go!</button>
                </form> 
            </li>
            <li>
                <form action="jera_showTable.php" method="POST">
                            <select class="form-control rounded" style=" width:63%;" name="departmentValue">                            
                                <option value="" disabled selected hidden>
                                <?php 
                                    if(isset($_POST['departmentValue']))
                                    {
                                        echo $_POST['departmentValue'] ;
                                    } 
                                    else
                                    {
                                        echo "Department";
                                    }
                                ?>
                                </option>
                                <?php
                                    $department = getDepartment($db);
                                    
                                    if(mysqli_num_rows($department)> 0)
                                    {
                                        foreach($department as $item)
                                        {
                                            ?>
                                            <option> <?= $item['departmentName'];?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>    
                            <button type="submit"  class="btn btn-outline-primary" name="searchDepartment">Go!</button>

                            
                    </form> 
            </li>
        </ul>
        
    </div>

    

    <table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthday</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Department</th>
        <th>Action</th>
    </tr>

    <form action="jera_delete.php" method="POST">
        <tbody>
        <?php
                $idAI = 0;
                $data = getData($db,"tbl_jeramay");

                if(mysqli_num_rows($data) > 0)
                {   
                while($row = mysqli_fetch_assoc($search_result))
                {
                    foreach($search_result as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$idAI; ?></td>
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <td><?= $row['firstName'];?></td>
                            <td><?= $row['lastName'];?></td>
                            <td><?php echo date("F d, Y", strtotime($row['birthday'])) ;?></td>
                            <td><?= $row['address'];?></td>
                            <td><?= $row['gender'] == '0'? "Male":"Female";?></td>
                            <td value="<?= $row['departmentId'];?>"><?= $row['departmentName'];?></td>                            
                            <td>
                                <a class="edit" href="jera_updateForm.php?id=<?php echo $item['id'];?>"><i class="fas fa-edit"></i></a>   

                                <button name="delete" type="submit"><i class="delete fas fa-trash"></i></button>
                            </td>
                            
                        </tr>
                   <?php
                    }
                }
                
            }
            else
            {
                echo "No record found";
            }
            
                ?>
                   
        
        </tbody>
    </form>
    </table>

</body>
</html>


<!-- "F d, Y", strtotime -->