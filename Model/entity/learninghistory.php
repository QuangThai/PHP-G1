
<?php
    class LearningHistory{
        var $id;
        var $yearFrom ;
        var $yearTo;
        var $schoolName;
        var $schoolAddress;
        var $idStudent;
        function __construct($id,$yearFrom,$yearTo,$schoolName,$schoolAddress,$idStudent){
            $this->id=$id;
            $this->yearFrom=$yearFrom;
            $this->yearTo = $yearTo;
            $this->schoolName=$schoolName;
            $this->schoolAddress=$schoolAddress;
            $this->idStudent=$idStudent;
        }
       static function getList($idStudent){
            $rs= array();

            for($i=0;$i<5;$i++){
                array_push($rs,new LearningHistory($i,2001,2002,"Phan Bội Châu","Huế",$idStudent));
            }
 
            return $rs;
           
        }
        static function getListFromFile($idStudent){
            $line = file("../model/resource/learninghistory.txt",FILE_IGNORE_NEW_LINES);
            $rs = array();
            foreach($line as $key=>$value){
                $arr = explode("#",$value);
                array_push($rs,new LearningHistory(
                     $arr[0],
                     $arr[1],
                     $arr[2],
                     $arr[3],
                     $arr[4],
                     $arr[5]
                )
            );
            }
            
            return $rs;
        }
        static function getListFromDB($idStudent) {
            // b1 : mở kết nối DB
            $con = new mysqli("localhost", "root", "","qlsv");
            $con->set_charset("utf8");
            if($con->connect_error)
                die("Kết nối thất bại.Chi tiết lỗi:" . $con->connect_error);
            //b2 : Thao tác tới DB : CRUD
            $query = "SELECT * FROM quatrinhhoctap WHERE masinhvien='$idStudent'" ;
            $result = $con->query($query);
            $rs = array();
            if($result->num_rows >0) {
                while($row = $result->fetch_assoc()) {
                    array_push($rs,new LearningHistory(
                        $row["ma"],
                        $row["tunam"],
                        $row["dennam"],
                        $row["tentruong"],
                        $row["diachitruong"],
                        $row["masinhvien"]
                    ));
                }
            }
            // b3 : đóng kết nối DB
            $con->close();
            return $rs;
        }
    } 
?>