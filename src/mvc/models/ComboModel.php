<?php
class ComboModel extends DB
{
    public function getAllCombos()
    {
        $sql = "SELECT * FROM menu";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getComboById($id)
    {
        $sql = "SELECT * FROM menu WHERE item_id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function addCombo($name, $price, $status, $image)
    {
        $sql = "INSERT INTO `menu`
        (`name`,`price`,`image_url`, `status`) 
        VALUES
        (:name, :price, :image_url, :status)";

        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('name', $name);
        $stmt->bindParam('price', $price);
        $stmt->bindParam('image_url', $image);
        $stmt->bindParam('status', $status);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function updateComboById($id, $name, $price, $status)
    {
        $sql = "UPDATE `menu`
        SET `name`=:name, `price`=:price, `status`=:status 
        WHERE item_id = :id";

        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('name', $name);
        $stmt->bindParam('price', $price);
        $stmt->bindParam('status', $status);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function deleteComboById($id)
    {
        $sql = "DELETE FROM menu WHERE item_id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }
}
