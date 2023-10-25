<?php
        require_once("./config/dbconfig.php");

    class Student{
        private $con;
        private $state;
        private $errmsg;

        public function __construct(){
            try{
                $db = new Database();
                if($db->getState()){
                    $this->con = $db->getDb();
                }else{
                    $this->state = false;
                    $this->errmsg = $db->getErrorMsg();
                }
            }
            catch(Exception $e){
                $this->state = false;
                $this->errmsg = "Stude class : " . $e->getMessage();
            }
        }

        public function saveStudent($stud){
            $sql = "call sp_insertStudent(:fname, :lname,:gender)";

            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':fname',$stud['fname']);
            $stmt->bindParam(':lname',$stud['lname']);
            $stmt->bindParam(':gender',$stud['gender']);
            try{
                $stmt->execute();
                if($stmt){
                    return 1;
                }else{
                    return 0;
                }
            }catch(Exception $ex){
                return -1;
            }
        }

        public function getAllStudent(){
            $sql = "CAll getallstudent()";
            $stmt = $this->con->prepare($sql);
       //    $stmt->bindParam(':subject_id',$subjectno);
            try{
                $stmt->execute();
                if($stmt){
                  $rows = array();
                  while($rw = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $rows[] = $rw;
                  }
                  return $rows;
                }else{  
                    return array();
                }
            }catch(PDOException $ex){
                return $ex->getMessage();
            }
        }
        public function deleteStudent($id) {
            $sql = "CAll sp_deleteStudent(:id)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id);
            try{
                $stmt->execute();
                if($stmt){
                  $rows = array();
                  while($rw = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $rows[] = $rw;
                  }
                  return $rows;
                }else{  
                    return array();
                }
            }catch(PDOException $ex){
                return $ex->getMessage();
            }
        }
        public function getStudentById($id){
            $sql = "CAll sp_getStudentById(:id)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id',$id);
            try{
                $stmt->execute();
                if($stmt){
                  $rows = array();
                  while($rw = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $rows[] = $rw;
                  }
                  return $rows;
                }else{  
                    return array();
                }
            }catch(PDOException $ex){
                return $ex->getMessage();
            }
        }
        public function updateStudent($stud) {
            $sql = "CAll sp_updateStudent(:id, :fname, :lname, :gender)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $stud['id']);
            $stmt->bindParam(':fname', $stud['fname']);
            $stmt->bindParam(':lname', $stud['lname']);
            $stmt->bindParam(':gender', $stud['gender']);
            try{
                $stmt->execute();
                if($stmt){
                  $rows = array();
                  while($rw = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $rows[] = $rw;
                  }
                  return $rows;
                }else{  
                    return array();
                }
            }catch(PDOException $ex){
                return $ex->getMessage();
            }
        }
    }
?>