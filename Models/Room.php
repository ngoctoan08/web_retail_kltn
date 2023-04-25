<?php
include_once './configs/Connect.php';
class Room extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showAllRoom()
    {
        $sql = "SELECT * FROM rooms";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // show employee by id
    public function showRoomById($roomId)
    {
        $sql = "SELECT * FROM rooms  WHERE rooms.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $roomId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function getAvatar($roomId) {
        $sql = "SELECT rooms.avatar FROM rooms WHERE rooms.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $roomId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
    
    public function addroom($name, $start_date, $end_date, $avatar, $description, $room_duration)
    {   
        $sql = "INSERT INTO `rooms` (`id`, `name`, `description`, `avatar`, `start_date`, `end_date`, `room_duration`, `created_at`, `updated_at`) VALUES (NULL, :name, :description, :avatar, :start_date, :end_date, :room_duration, current_timestamp(), current_timestamp())";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':room_duration', $room_duration);
        return $pre->execute();
    }

    public function updateroom($id, $name, $start_date, $end_date, $avatar, $description, $room_duration)
    {
        $sql = "UPDATE `rooms` SET rooms.name = :name, rooms.start_date = :start_date, rooms.end_date = :end_date, rooms.avatar = :avatar, rooms.description = :description, rooms.room_duration = :room_duration WHERE rooms.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':room_duration', $room_duration);
        return $pre->execute();
    }
    
    
    public function deleteroom($id)
    {
        $sql = "DELETE FROM rooms WHERE rooms.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }
    
    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

   

}