<?php
include_once './configs/Connect.php';
class Policy extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showAllCustomer()
    {
        $sql = "SELECT * FROM customers WHERE IsActive = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function showAllPolicy()
    {
        $sql = "SELECT p.*, c.Name as EmployeeName FROM policies AS p LEFT JOIN customers AS c ON p.EmployeeId = c.Id 
        WHERE p.IsActive = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }


    public function showPolicy($policyId)
    {
        $sql = "SELECT p.*, c.Name as EmployeeName FROM policies AS p LEFT JOIN customers AS c ON p.EmployeeId = c.Id 
        WHERE p.IsActive = 1 AND p.Id =:id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $policyId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    // show policy by id
    public function showPolicyDetail($policyId)
    {
        $sql = "
        SELECT tb1.*, tb2.Code AS GiftItemCode, tb2.Name AS GiftItemName 
        FROM
        (   
            SELECT pd.Id, pd.PolicyId, pd.Itemid, i.Code AS ItemCode, i.Name AS ItemName, pd.GiftItemId, pd.GiftQuantity, pd.GiftMaxQuantity
            FROM policydetails pd 
            LEFT JOIN policies p ON pd.PolicyId = p.Id
            LEFT JOIN item i ON pd.ItemId = i.Id
            WHERE p.Id = :id AND p.IsActive = 1
        ) AS tb1 
        LEFT JOIN item tb2 ON tb1.GiftItemId = tb2.Id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $policyId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addPolicy($doc_date, $doc_no, $description, $start_date, $end_date, $is_closed, $employee_id)
    {   
        $sql = "INSERT INTO `policies` (`DocDate`, `DocNo`, `Description`, `StartDate`, `EndDate`, `IsClosed`, `EmployeeId`) VALUES (:DocDate, :DocNo, :Description, :StartDate, :EndDate, :IsClosed, :EmployeeId)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':DocDate', $doc_date);
        $pre->bindParam(':DocNo', $doc_no);
        $pre->bindParam(':Description', $description);
        $pre->bindParam(':StartDate', $start_date);
        $pre->bindParam(':EndDate', $end_date);
        $pre->bindParam(':IsClosed', $is_closed);
        $pre->bindParam(':EmployeeId', $employee_id);
        return $pre->execute();
    }

    public function addPolicyDetail($policyId, $itemId, $itemName, $unit, $giftItemId, $giftQuantity, $giftMaxQuantity)
    {   
        $sql = "INSERT INTO `policydetails` (`PolicyId`, `ItemId`, `ItemName`, `Unit`, `GiftItemId`, `GiftQuantity`, `GiftMaxQuantity`) VALUES (:PolicyId, :ItemId, :ItemName, :Unit, :GiftItemId, :GiftQuantity, :GiftMaxQuantity)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':PolicyId', $policyId);
        $pre->bindParam(':ItemId', $itemId);
        $pre->bindParam(':ItemName', $itemName);
        $pre->bindParam(':Unit', $unit);
        $pre->bindParam(':GiftItemId', $giftItemId);
        $pre->bindParam(':GiftQuantity', $giftQuantity);
        $pre->bindParam(':GiftMaxQuantity', $giftMaxQuantity);
        return $pre->execute();
    }

    public function updateCourse($id, $name, $start_date, $end_date, $avatar, $description, $course_duration)
    {
        $sql = "UPDATE `courses` SET courses.name = :name, courses.start_date = :start_date, courses.end_date = :end_date, courses.avatar = :avatar, courses.description = :description, courses.course_duration = :course_duration WHERE courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':course_duration', $course_duration);
        return $pre->execute();
    }
    
    
    public function deleteCourse($id)
    {
        $sql = "DELETE FROM courses WHERE courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }
    
    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

   

}