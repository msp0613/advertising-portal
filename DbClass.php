<?php
class DbClass
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function select($tableName,$selectElem, $inputArray, $whereElem)
    {
        $querySelect = "";
        $queryWhere = "";
        for ($i = 0; $i < count($selectElem); $i++){
            if ($i == count($selectElem)-1){
                $querySelect.= $selectElem[$i];
            }
            else{
                $querySelect.= $selectElem[$i].",";
            }
        }
        for ($i = 0; $i < count($whereElem); $i++){
            if ($i == 0){
                $queryWhere.=" where ";
            }
            if ($i == count($whereElem)-1){
                $queryWhere.= $whereElem[$i].=" = ?";
            }
            else{
                $queryWhere.= $whereElem[$i]." = ? and ";
            }
        }
        if ($querySelect == ""){
            $querySelect.=" * ";
            $sql = "SELECT ".$querySelect." from ".$tableName." ".$queryWhere;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($inputArray);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $sql = "SELECT " . $querySelect . " from " . $tableName . " " . $queryWhere;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($inputArray);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function insert($tableName, $arrayColumName, $inputArray){
        $queryColumn = "";
        for ($i = 0; $i < count($arrayColumName); $i++){
            if ($i == count($arrayColumName)-1){
                $queryColumn.= $arrayColumName[$i].") VALUES (";
            }
            else{
                $queryColumn.= $arrayColumName[$i].",";
            }
        }
            for ($i = 0; $i < count($arrayColumName); $i++){
                if ($i == count($arrayColumName)-1){
                    $queryColumn.="?)";
                }
                else {
                    $queryColumn .= "?,";
                }
            }
        $sql = "INSERT INTO ".$tableName." ( ".$queryColumn." ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($inputArray);
    }
    public function delete($tableName, $whereArray, $valuesArray){
        $sqlQuery = "DELETE FROM ".$tableName." WHERE ";
            for ($i = 0; $i < count($whereArray); $i++){
                if ($i == count($whereArray)-1){
                    $sqlQuery.= $whereArray[$i]." =? ";
                }
                else{
                    $sqlQuery.= $whereArray[$i]."=? ,";
                }
            }
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute($valuesArray);
    }
    public function update($tableName, $setArray, $valuesArray, $whereArray, $whereValue){
        $sqlQuery = "UPDATE ".$tableName." SET ";
        for ($i = 0; $i < count($setArray); $i++){
            if ($i == count($setArray)-1){
                $sqlQuery.= $setArray[$i]." =? WHERE ";
            }
            else{
                $sqlQuery.= $setArray[$i]."=? ,";
            }
        }
        for ($i = 0; $i < count($whereArray); $i++){
            if ($i == count($whereArray)-1){
                $sqlQuery.= $whereArray[$i]." = ".$whereValue[$i];
            }
            else{
                $sqlQuery.= $whereArray[$i]."=,".$whereValue[$i];
            }
        }
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute($valuesArray);
    }
}

?>
