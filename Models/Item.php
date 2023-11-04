<?php
include_once './configs/Connect.php';
class Item extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showAllItem()
    {
        $sql = "SELECT * FROM item WHERE IsActive = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // show item by id
    public function showItemById($itemId)
    {
        $sql = "
        SELECT * FROM `item`  WHERE Id = :id AND IsActive = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $itemId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    // show itemcode
    public function showGiftItemCodes($itemCodes)
    {
        $sql = "SELECT * FROM item  WHERE Code IN (". $itemCodes .")  AND IsActive = 1";
        // return $sql;
        $pre = $this->pdo->prepare($sql);
        // $pre->bindParam(':id', $itemId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
      
    /**
     * @return array
     */
    public function showAllUnits()
    {
        $sql = "SELECT * FROM unit WHERE IsActive = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem($code, $name, $unit, $avatar, $price, $user)
    {   
        $sql = "INSERT INTO `item` (`Code`, `Name`, `Unit`, `Avatar`, `Price`, `CreatedBy`) VALUES (:Code, :Name, :Unit, :Avatar, :Price, :CreatedBy)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':Code', $code);
        $pre->bindParam(':Name', $name);
        $pre->bindParam(':Unit', $unit);
        $pre->bindParam(':Avatar', $avatar);
        $pre->bindParam(':Price', $price);
        $pre->bindParam(':CreatedBy', $user);
        return $pre->execute();
    }

    // Get path avatar to unlink it
    public function getAvatar($itemId) {
        $sql = "SELECT item.Avatar FROM item WHERE item.Id = :Id AND item.IsActive = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':Id', $itemId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteItem($id)
    {
        $sql = "UPDATE item SET IsActive = 0 WHERE item.Id = :Id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':Id', $id);
        return $pre->execute();
    }

    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

   

}