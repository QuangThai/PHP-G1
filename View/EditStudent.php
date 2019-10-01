
<!-- 1#1990#1991#Phan Chu Trinh#Huế#101
2#1991#1992#Phan Bội Châu#Dà Nẵng#101
3#1995#1996#Phan Chu Trinh#Huế#102
4#1997#1998#Phan Bội Châu#Dà Nẵng#102
5#2019#2020#Khoa Học#Nguyễn Huệ#101 -->

<?php
    include_once("header.php");
    include_once("nav.php");
    include_once("../model/entity/learninghistory.php");
    $rsFromFile = learninghistory::getListFromFile("1"); 
    ?>
<?php 
           $id = $_REQUEST["m"];
          //  var_dump($_SERVER);
         
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $maQuaTrinhHocTap = $_REQUEST["txtMaQuaTrinhHocTap"];
                $tuNam = $_REQUEST["txtTuNam"];
                $denNam = $_REQUEST["txtDenNam"];
                $tenTruong = $_REQUEST["txtTenTruong"];
                $diaChiTruong = $_REQUEST["txtDiaChiTruong"];
                $maSinhVien = $_REQUEST["txtMaSinhVien"];

                $filename = '../model/resource/learninghistory.txt';
                 $line = file("../model/resource/learninghistory.txt",FILE_IGNORE_NEW_LINES);
                 $content ="";
                 foreach($line as $key=>$value)
                 {
                   $arr = explode("#",$value);
                    if($arr[0]==$id)
                    {
                      $content = $content.$maQuaTrinhHocTap."#".$tuNam."#".$denNam."#".$tenTruong."#".$diaChiTruong."#".$maSinhVien. "\r\n";
                    }
                    else{
                      $content = $content.$value."\r\n";
                    }
                 }
                  if (is_writable($filename)) {
                      if (!$file= fopen($filename, 'w')) {
                          echo "Cannot open file ($filename)";
                          exit;
                      }
                      if (fwrite($file, $content) === FALSE) {
                          echo "Không thể viết file ($filename)";
                          exit;
                      }
                     
                      fclose($file);
                      require("QTHT.php");
                      exit;
                  } else {
                    require("EditStudent.php");
                    exit;
                  }
        
            }

                  
        ?>  

        <h1>Thông tin sinh viên</h1><hr>
            <?php
              foreach($rsFromFile as $key => $value){
                if($value->id==$id)
                {    
                
             ?>
              <form  class="form-horizontal" action="EditStudent.php?m=<?php echo $id?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" >Mã Quá Trình Học Tập</label>
                    <div class="col-sm-5">
                      <input type="hidden" class="form-control" id="Ma" value="<?php echo $value->id ?>" name="txtMaQuaTrinhHocTap" placeholder="Mã Quá Trình Học Tập">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" >Từ Năm</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="TuNam" value="<?php echo $value->yearTo ?>" name="txtTuNam" placeholder="Từ Năm">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" >Đến Năm</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="DenNam" value="<?php echo $value->yearFrom ?>" name="txtDenNam" placeholder="Đến Năm">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" >Tên Trường</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="TenTruong" value="<?php echo $value->schoolName ?>"" name="txtTenTruong" placeholder="Tên Trường">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" >Địa chỉ trường</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="DCT" value=" <?php echo $value->schoolAddress ?>"" name="txtDiaChiTruong" placeholder="Địa chỉ trường">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5">
                      <input type="hidden" class="form-control"value=" <?php echo $value->idStudent ?> " name="txtMaSinhVien">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Edit</button>
                      <button  class="btn btn-danger"><a href="CreateStudent.php">Cancel</a></button>
                    </div>
                  </div>
              </form>
              <?php
                }}
              ?>
<?php
   include_once("footer.php");
?>