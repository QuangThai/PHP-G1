<?php
    include_once("header.php");
    include_once("nav.php");
    include_once("../View/con.php");
    ?>
<?php     
      if($_SERVER["REQUEST_METHOD"] == "POST") {
          $maQuaTrinhHocTap = $_REQUEST["txtMaQuaTrinhHocTap"];
          $tuNam = $_REQUEST["txtTuNam"];
          $denNam = $_REQUEST["txtDenNam"];
          $tenTruong = $_REQUEST["txtTenTruong"];
          $diaChiTruong = $_REQUEST["txtDiaChiTruong"];
          $maSinhVien = $_REQUEST["txtMaSinhVien"];
          $content ="";
          $filename = '../model/resource/learninghistory.txt';
            $content = $maQuaTrinhHocTap."#".$tuNam."#".$denNam."#".$tenTruong."#".$diaChiTruong."#".$maSinhVien;
            if (is_writable($filename)) {
                if (!$file= fopen($filename, 'a')) {
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
              require("CreateStudent.php");
              exit;
            }
      }             
  ?>  

      <h1>Thông tin sinh viên</h1><hr>
      <form id="fr_form"  class="form-horizontal" action="CreateStudent.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-3" >Mã Quá Trình Học Tập</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="TuNam" name="txtMaQuaTrinhHocTap" placeholder="Từ Năm">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" >Từ Năm</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="TuNam" name="txtTuNam" placeholder="Từ Năm">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" >Đến Năm</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="DenNam" name="txtDenNam" placeholder="Đến Năm">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" >Tên Trường</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="TenTruong" name="txtTenTruong" placeholder="Tên Trường">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" >Địa chỉ trường</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="DCT" name="txtDiaChiTruong" placeholder="Địa chỉ trường">
            </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-2" >Mã sinh viên</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" value="101" name="txtMaSinhVien">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" id="btn_register" class="btn btn-success">Create</button>
              <button  class="btn btn-danger"><a href="CreateStudent.php">Cancel</a></button>
            </div>
          </div>
        </form>
<?php
   include_once("footer.php");
?>