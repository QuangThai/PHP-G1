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
              $content="";
                $filename = '../model/resource/learninghistory.txt';
                 $line = file("../model/resource/learninghistory.txt",FILE_IGNORE_NEW_LINES);
                 foreach($line as $key=>$value)
                 {
                   $arr = explode("#",$value);
                    if($arr[0]!=$id)
                    {
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
                    require("DeleteStudent.php");
                    exit;
                  }
                  
            }

                  
        ?>  
            <?php
              foreach($rsFromFile as $key => $value){
                if($value->id==$id)
                {    
                
             ?>
             <h3> Bạn có muốn xóa hay không</h3><hr>
              <form  class="form-horizontal" action="DeleteStudent.php?m=<?php echo $id?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" >Mã Quá Trình Học Tập</label>
                    <div class="col-sm-5">
                      <input type="hidden" class="form-control" id="Ma" value="<?php echo $value->id ?>" name="txtMaQuaTrinhHocTap" placeholder="Mã Quá Trình Học Tập">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Delete</button>
                      <button  class="btn btn-danger"><a href="QTHT.php">Cancel</a></button>
                    </div>
                  </div>
              </form>
              <?php
                }}
              ?>
<?php
   include_once("footer.php");
?>