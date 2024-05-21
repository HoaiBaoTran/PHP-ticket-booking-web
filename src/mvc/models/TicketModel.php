<?php
class TicketModel extends DB
{
    public function getAllTicketsByShowTimeId($showtimeId)
    {
        $sql = "SELECT * FROM ticket WHERE showtime_id = :showtime_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("showtime_id", $showtimeId);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
