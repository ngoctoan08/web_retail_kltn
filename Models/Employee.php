<?php
include_once './configs/Connect.php';
class Employee extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function updateUser($id , $name, $email, $role)
    {
        $sql = "UPDATE `users` SET users.name = :name, users.email = :email, users.role_id = :role WHERE users.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':role', $role);
        return $pre->execute();
    }

    public function updatePassUser($id , $name, $email, $password)
    {
        $sql = "UPDATE `users` SET users.name = :name, users.email = :email, users.password = :password WHERE users.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':password', $password);
        return $pre->execute();
    }

    /**
     * @return array
     */
    public function showAllEmployee()
    {
        $sql = "SELECT * FROM employees";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * @return array
     */
    public function showAllDepartment()
    {
        $sql = "SELECT * FROM departments";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showAllPosition()
    {
        $sql = "SELECT * FROM positions";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showAllContractType()
    {
        $sql = "SELECT * FROM contract_types";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function showPosition($departmentId)
    {
        $sql = "SELECT * FROM positions WHERE positions.department_id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $departmentId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function addEmployee($birthDate, $gender, $name, $avatar, $tel, $email, $description, $address)
    {
        $sql = "INSERT INTO `employees` (`name`, `birth_date`, `gender`, `address`, `tel`, `email`, `avatar`, `description`) VALUES (:name, :birth_date, :gender, :address, :tel, :email, :avatar, :description)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birth_date', $birthDate);
        $pre->bindParam(':gender', $gender);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':tel', $tel);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':description', $description);
        return $pre->execute();
    }

    public function addEmployeeDetail($employeeId, $educationName, $positionName, $departmentName)
    {
        $sql = "INSERT INTO `employee_details` (`employee_id`, `education_name`, `position_name`, `department_name`) VALUES (:employee_id, :education_name, :position_name, :department_name)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':employee_id', $employeeId);
        $pre->bindParam(':education_name', $educationName);
        $pre->bindParam(':position_name', $positionName);
        $pre->bindParam(':department_name', $departmentName);
        return $pre->execute();
    }

    public function addContract($name, $description, $salary, $start_date, $end_date, $employee_id, $contract_type_id)
    {
        $sql = "INSERT INTO `contracts` (`name`, `description`, `salary`, `start_date`, `end_date`, `employee_id`, `contract_type_id`) VALUES (:name, :description, :salary, :start_date, :end_date, :employee_id, :contract_type_id)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':salary', $salary);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':employee_id', $employee_id);
        $pre->bindParam(':contract_type_id', $contract_type_id);
        return $pre->execute();
    }

    

}