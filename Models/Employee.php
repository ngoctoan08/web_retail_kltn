<?php
include_once './configs/Connect.php';
class Employee extends Connect
{
    public function __construct()
    {
        parent::__construct();
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
    
    // show employee by id
    public function showEmployeeById($employeeId)
    {
        $sql = "
        SELECT employees.*, employee_details.education_name, employee_details.position_name, employee_details.department_name, contracts.name AS 'contract_name', contracts.salary, contracts.start_date, contracts.end_date 
        FROM `employees` 
            JOIN employee_details ON employees.id = employee_details.employee_id 
            JOIN contracts ON employees.id = contracts.employee_id 
        WHERE employees.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $employeeId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getAvatar($employeeId) {
        $sql = "SELECT employees.avatar FROM employees WHERE employees.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $employeeId);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
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

    // show employee by department name
    public function showEmployeeByDepartmentName($departmentName)
    {
        $sql = "SELECT employees.id, employees.name FROM employee_details JOIN employees ON employee_details.employee_id = employees.id WHERE employee_details.department_name like '%$departmentName'";
        $pre = $this->pdo->prepare($sql);
        // $pre->bindParam(':id', $departmentId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function addEmployee($birthDate, $gender, $name, $avatar, $tel, $email, $description, $address)
    {   
        $sql = "INSERT INTO `employees` (`id`, `name`, `birth_date`, `gender`, `address`, `tel`, `email`, `avatar`, `description`, `created_at`, `updated_at`) VALUES (NULL, :name, :birth_date, :gender, :address, :tel, :email, :avatar, :description, current_timestamp(), current_timestamp())";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birth_date', $birthDate);
        $pre->bindParam(':gender', $gender);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':tel', $tel);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':description', $description);
        return $pre->execute();
    }

    public function updateEmployee($id, $birthDate, $gender, $name, $avatar, $tel, $email, $description, $address)
    {
        $sql = "UPDATE `employees` SET employees.name = :name, employees.birth_date = :birth_date, employees.gender = :gender, employees.address = :address, employees.tel = :tel, employees.email = :email, employees.avatar = :avatar, employees.description = :description WHERE employees.id = :id";
        
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birth_date', $birthDate);
        $pre->bindParam(':gender', $gender);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':tel', $tel);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':description', $description);
        return $pre->execute();
    }

    public function updateDetail($employeeId, $educationName, $positionName, $departmentName)
    {
        $sql = "UPDATE `employee_details` SET employee_details.position_name = :position_name, employee_details.department_name = :department_name, employee_details.education_name = :education_name WHERE employee_details.employee_id = :employee_id";
        
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':employee_id', $employeeId);
        $pre->bindParam(':position_name', $positionName);
        $pre->bindParam(':department_name', $departmentName);
        $pre->bindParam(':education_name', $educationName);
        return $pre->execute();
    }

    public function updateContract($name, $description, $salary, $start_date, $end_date, $employee_id, $contract_type_id)
    {
        $sql = "UPDATE `contracts` SET contracts.name = :name, contracts.description = :description, contracts.salary = :salary, contracts.start_date = :start_date, contracts.end_date = :end_date, contracts.contract_type_id = :contract_type_id WHERE contracts.employee_id = :employee_id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':salary', $salary);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':employee_id', $employee_id);
        $pre->bindParam(':contract_type_id', $contract_type_id);
        return $pre->execute();
    }
    
    
    public function deleteEmployee($id)
    {
        $sql = "DELETE FROM employees WHERE employees.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }
    

    public function addEmployeeDetail($employeeId, $educationName, $positionName, $departmentName)
    {
        $sql = "INSERT INTO `employee_details` (`id`, `employee_id`, `education_name`, `position_name`, `department_name`, `created_at`, `updated_at`) VALUES (NULL, :employee_id, :education_name, :position_name, :department_name, current_timestamp(), current_timestamp())";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':employee_id', $employeeId);
        $pre->bindParam(':education_name', $educationName);
        $pre->bindParam(':position_name', $positionName);
        $pre->bindParam(':department_name', $departmentName);
        return $pre->execute();
    }

    public function addContract($name, $description, $salary, $start_date, $end_date, $employee_id, $contract_type_id)
    {
        $sql = "INSERT INTO `contracts` (`id`, `name`, `description`, `salary`, `start_date`, `end_date`, `employee_id`, `contract_type_id`, `created_at`, `updated_at`) VALUES (NULL, :name, :description, :salary, :start_date, :end_date, :employee_id, :contract_type_id, current_timestamp(), current_timestamp())";
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

    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

   

}