<?php
    require_once("./config/dbconfig.php");

    class StudentAssignment{
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
                $this->errmsg = "Stude class : " . $$e->getMessage();
            }
        }

        public function insertStudentAssignment($studAss){
            $sql = "call sp_insertStudentAssignment(:student_id, :assignment1_id,:assignment2_id)";

            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':student_id',$studAss['student_id']);
            $stmt->bindParam(':assignment1_id',$studAss['assignment1_id']);
            $stmt->bindParam(':assignment2_id',$studAss['assignment2_id']);
            try{
                $stmt->execute();
                if($stmt){
                    return 1;
                }else{
                    return 0;
                }
            }catch(Exception $ex){
                return $ex->getMessage();
            }
        }

        public function getAllStudentAssignments(){
            $sql = "CAll getAllStudentAssignments()";
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
        public function deleteStudentAssignment($id) {
            $sql = "CAll sp_deleteStudentAssignment(:id)";
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
        public function getStudentAssignmentById($id){
            $sql = "CAll sp_getStudentAssignmentById(:id)";
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
        public function updateStudentAssignment($stud) {
            $sql = "CAll sp_updateStudentAssignment(:id, :assignment1_id, :assignment2_id)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $stud['id']);
            $stmt->bindParam(':assignment1_id', $stud['assignment1_id']);
            $stmt->bindParam(':assignment2_id', $stud['assignment2_id']);
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