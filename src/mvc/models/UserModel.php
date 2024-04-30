<?php
class UserModel extends DB
{
    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getAllManagers()
    {
        $sql = "SELECT * FROM user WHERE user_type = 1";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getFilmById($id)
    {
        $sql = "SELECT * FROM film WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function addFilm()
    {
        $sql = "SELECT * FROM film";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
