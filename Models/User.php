<?php
include_once './configs/Connect.php';
class User extends Connect
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
    public function showAllUser()
    {
        $sql = "SELECT * FROM users";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE users.email = :email";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function showUserById($id)
    {
        $sql = "SELECT * FROM users WHERE users.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function showRoles()
    {
        $sql = "SELECT * FROM roles";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addUser($email, $password, $name)
    {
        $sql = "INSERT INTO `users` (`email`, `password`, `name`) VALUES (:email, :password, :name)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':password', $password);
        $pre->bindParam(':name', $name);
        return $pre->execute();
    }

}