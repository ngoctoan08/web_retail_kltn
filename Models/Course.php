<?php
include_once './configs/Connect.php';
class Course extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showAllCourse()
    {
        $sql = "SELECT * FROM courses";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // show employee by id
    public function showCourseById($courseId)
    {
        $sql = "SELECT * FROM courses  WHERE courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $courseId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function getAvatar($courseId) {
        $sql = "SELECT courses.avatar FROM courses WHERE courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $courseId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
    
    public function addCourse($name, $start_date, $end_date, $avatar, $description, $course_duration)
    {   
        $sql = "INSERT INTO `courses` (`id`, `name`, `description`, `avatar`, `start_date`, `end_date`, `course_duration`, `created_at`, `updated_at`) VALUES (NULL, :name, :description, :avatar, :start_date, :end_date, :course_duration, current_timestamp(), current_timestamp())";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':course_duration', $course_duration);
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