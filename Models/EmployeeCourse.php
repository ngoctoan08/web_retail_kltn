<?php
include_once './configs/Connect.php';
class EmployeeCourse extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showAllEmployeeCourse()
    {
        $sql = "SELECT employee_courses.id, employees.id as 'employee_id', employees.name as 'employee_name', courses.id as 'course_id' , courses.name as 'course_name', employee_courses.score, employee_courses.status FROM `employee_courses` JOIN employees ON employees.id = employee_courses.employee_id JOIN courses ON courses.id = employee_courses.course_id";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //SELECT employees.id as 'employee_id', employees.name as 'employee_name', courses.id as 'course_id' , courses.name as 'course_name', employee_courses.score, employee_courses.status FROM `employee_courses` JOIN employees ON employees.id = employee_courses.employee_id JOIN courses ON courses.id = employee_courses.course_id WHERE employee_courses.score IS NOT null;

    
    // show employee by id
    public function showCourseById($courseId)
    {
        $sql = "SELECT * FROM courses  WHERE courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $courseId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function addEmployeeCourse($employeeId, $courseId, $score)
    {   
        $sql = "INSERT INTO `employee_courses` (`id`, `employee_id`, `course_id`, `score`, `created_at`, `updated_at`) VALUES (NULL, :employee_id, :course_id, :score, current_timestamp(), current_timestamp())";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':employee_id', $employeeId);
        $pre->bindParam(':course_id', $courseId);
        $pre->bindParam(':score', $score);
        return $pre->execute();
    }

    public function updateEmployeeCourse($id, $score)
    {
        $sql = "UPDATE `employee_courses` SET employee_courses.score = :score WHERE employee_courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':score', $score);
        return $pre->execute();
    }
    
    
    public function deleteEmployeeCourse($id)
    {
        $sql = "DELETE FROM employee_courses WHERE employee_courses.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }
    
    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

   

}