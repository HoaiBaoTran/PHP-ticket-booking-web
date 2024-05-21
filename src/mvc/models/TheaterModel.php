<?php
class TheaterModel extends DB
{
    public function getAllTheaters()
    {
        $sql = "SELECT * FROM theater";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
