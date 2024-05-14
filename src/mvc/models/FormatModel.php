<?php
class FormatModel extends DB
{
    public function getAllFormats()
    {
        $sql = "SELECT * FROM format";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getFormatById($id)
    {
        $sql = "SELECT * FROM format WHERE format_id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function addFormat($name, $price, $status, $image)
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

    public function updateFormatById($id, $name, $price, $status)
    {
        // $sql = "UPDATE `menu`
        // SET `name`=:name, `price`=:price, `status`=:status 
        // WHERE item_id = :id";

        // $stmt = $this->con->prepare($sql);
        // $stmt->bindParam('id', $id);
        // $stmt->bindParam('name', $name);
        // $stmt->bindParam('price', $price);
        // $stmt->bindParam('status', $status);
        // $stmt->execute();
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode(array('status' => true, 'data' => $data));
    }

    public function deleteFormatById($id)
    {
        // $sql = "DELETE FROM menu WHERE item_id = :id";
        // $stmt = $this->con->prepare($sql);
        // $stmt->bindParam('id', $id);
        // $stmt->execute();
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode(array('status' => true, 'data' => $data));
    }
}
