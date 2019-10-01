<?php
    include_once("header.php");
    include_once("nav.php");
    include_once("../model/entity/learninghistory.php");
    $rs = learninghistory::getList("1");
    $rsFromFile = learninghistory::getListFromFile("1");
   
    ?>

 <!-- Breadcrumbs-->

    
        <h2> QUÁ TRÌNH HỌC TẬP </h2>
       <h3 > <button type="button" class="btn btn-success"><a style='color:white ' href="CreateStudent.php">Create</a></button></h3>
   <table class="table">
   <hr>
        <thead class="thead-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Từ năm</th>
            <th scope="col">Đến Năm</th>
            <th scope="col">Tên Trường</th>
            <th scope="col">Địa chỉ trường</th>
            <th scope="col">sinh vien</th>
            <th scope="col">Thao tac</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($rsFromFile as $key => $value){
             echo "  <tr>";
             echo "  <th scope='row'>$value->id</th>";
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