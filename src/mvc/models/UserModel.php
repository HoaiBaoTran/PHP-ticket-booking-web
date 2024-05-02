<?php
class UserModel extends DB
{
    public function getAllUsers()
    {
        $sql = "SELECT * FROM user WHERE user_type = :user_type";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue('user_type', 0);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getAllManagers()
    {
        $sql = "SELECT * FROM user WHERE user_type = :user_type";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue('user_type', 1);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('user_id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('username', $username);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('email', $email);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function addUser($username, $password, $firstName, $lastName, $email, $phoneNumber, $address, $userType)
    {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `user` 
        (`username`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `address`, `activated`, `activate_token`, `user_type`) 
        VALUES
        (:username, :first_name, :last_name, :email, :password, :phone_number, :address,  b'1', '123456', :user_type)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('first_name', $firstName);
        $stmt->bindParam('last_name', $lastName);
        $stmt->bindParam('password', $hashPassword);
        $stmt->bindParam('email', $email);
        $stmt->bindParam('phone_number', $phoneNumber);
        $stmt->bindParam('address', $address);
        $stmt->bindValue('user_type', (int)$userType, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function updateUser($id, $password, $firstName, $lastName, $phoneNumber, $address, $userType)
    {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE `user` 
        SET `first_name`=:first_name, `last_name`=:last_name, 
        `password`=:password, `phone_number`=:phone_number, 
        `address`=:address, `user_type`=:user_type
        WHERE user_id=:user_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('first_name', $firstName);
        $stmt->bindParam('last_name', $lastName);
        $stmt->bindParam('password', $hashPassword);
        $stmt->bindParam('phone_number', $phoneNumber);
        $stmt->bindParam('address', $address);
        $stmt->bindValue('user_type', (int)$userType, PDO::PARAM_INT);
        $stmt->bindValue('user_id', $id);
        $stmt->execute();
        return $this->getUserById($id);
    }

    public function deleteUserById($id)
    {
        $sql = "DELETE FROM user WHERE user_id = :user_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('user_id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }
}
