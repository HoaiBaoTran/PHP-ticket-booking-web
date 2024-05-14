<?php
class RoomModel extends DB
{
    public function getAllRooms()
    {
        $sql = "SELECT * FROM room";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getRoomById($id)
    {
        $sql = "SELECT * FROM room WHERE room_id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function addRoom($name, $price, $status, $image)
    {
        // $sql = "INSERT INTO `menu`
        // (`name`,`price`,`image_url`, `status`) 
        // VALUES
        // (:name, :price, :image_url, :status)";

        // $stmt = $this->con->prepare($sql);
        // $stmt->bindParam('name', $name);
        // $stmt->bindParam('price', $price);
        // $stmt->bindParam('image_url', $image);
        // $stmt->bindParam('status', $status);
        // $stmt->execute();
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode(array('status' => true, 'data' => $data));
    }

    public function updateRoomById($id, $name, $price, $status)
    {
        $sql = "UPDATE `menu`
        SET `name`=:name, `price`=:price, `status`=:status 
        WHERE item_id = :id";

        // $stmt = $this->con->prepare($sql);
        // $stmt->bindParam('id', $id);
        // $stmt->bindParam('name', $name);
        // $stmt->bindParam('price', $price);
        // $stmt->bindParam('status', $status);
        // $stmt->execute();
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode(array('status' => true, 'data' => $data));
    }

    public function deleteRoomById($id)
    {
        // $sql = "DELETE FROM menu WHERE item_id = :id";
        // $stmt = $this->con->prepare($sql);
        // $stmt->bindParam('id', $id);
        // $stmt->execute();
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode(array('status' => true, 'data' => $data));
    }
}
