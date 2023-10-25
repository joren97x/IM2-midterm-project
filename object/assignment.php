<?php
    require_once("./config/dbconfig.php");

    class Assignment{
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

        public function insertAssignment($name){
            $sql = "call sp_insertAssignment(:name)";
            echo $name;
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':name', $name);
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

        public function getAllAssignments(){
            $sql = "CAll getAllAssignments()";
            $stmt = $this->con->prepare($sql);
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
        public function deleteAssignment($id) {
            $sql = "CAll sp_deleteAssignment(:id)";
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
        public function getAssignmentById($id){
            $sql = "CAll sp_getAssignmentById(:id)";
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
        public function updateAssignment($stud) {
            $sql = "CAll sp_updateAssignment(:id, :name)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $stud['id']);
            $stmt->bindParam(':name', $stud['name']);
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