<?php
class ShowtimeModel extends DB
{
    public function getAllShowtime()
    {
        $sql = "SELECT * FROM showtime";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function getShowtimeById($id)
    {
        $sql = "SELECT * FROM showtime WHERE showtime_id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function addShowtime($filmId, $startTime, $endTime, $price, $formatId, $roomId)
    {
        $sql = "INSERT INTO `showtime`
        (`start_time`,`end_time`,`price`,`status`,`film_id`,`room_id`,`format_id`) 
        VALUES
        (:start_time,:end_time,:price,1,:film_id,:room_id,:format_id)";

        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('start_time', $startTime);
        $stmt->bindParam('end_time', $endTime);
        $stmt->bindParam('price', $price);
        $stmt->bindParam('film_id', $filmId);
        $stmt->bindParam('room_id', $roomId);
        $stmt->bindParam('format_id', $formatId);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('status' => true, 'data' => $data));
    }

    public function updateShowtimeById($id, $name, $price, $status)
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

    public function deleteShowtimeById($id)
    {
        // $sql = "DELETE FROM menu WHERE item_id = :id";
        // $stmt = $this->con->prepare($sql);
        // $stmt->bindParam('id', $id);
        // $stmt->execute();
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode(array('status' => true, 'data' => $data));
    }
}
