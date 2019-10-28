<?php
    include_once("header.php");
    include_once("nav.php");
    include_once("../model/entity/learninghistory.php");
    $rs = learninghistory::getList("1");
    $rsFromFile = learninghistory::getListFromFile("1");
    $rsFromDB =  learninghistory::getListFromDB("105");
    //var_dump($rsFromDB);
    ?>
<h2>
    QUÁ TRÌNH HỌC TẬP
</h2>
<div class="d-flex align-content-center">
    <button type="button" class="btn btn-success mr-5">
        <a style='color:white ' href="CreateStudent.php">Create</a>
    </button> 
</div>
<table class="table table-bordered mt-4">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Từ Năm</th>
            <th scope="col">Đến Năm</th>
            <th scope="col">Tên Trường</th>
            <th scope="col">Địa Chỉ Trường</th>
            <th scope="col">Sinh Viên</th>
            <th scope="col">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php          
          foreach($rsFromDB as $key => $value){
             echo " <tr>";
             echo " <th scope='row'>$value->id</th>";
             echo " <td>$value->yearFrom</td>";
             echo " <td>$value->yearTo</td>";
             echo " <td>$value->schoolName</td>";
             echo " <td>$value->schoolAddress</td>";
             echo " <td>$value->idStudent</td>";
             echo " <td>";
             echo "  <button type='button' class='btn btn-primary'><a style='color:white 'href='EditStudent.php?m=$value->id'>Edit</a></button>";
             echo "  <button type='button' class='btn btn-danger'><a style='color:white 'href='DeleteStudent.php?m=$value->id'>Delete</a></button>";
             echo " </td>";
             echo " </tr>"; 
        }
          ?>
    </tbody>
</table>
<?php
   include_once("footer.php");
?>