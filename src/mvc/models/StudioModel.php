<?php
class StudioModel extends DB
{
    public function getAllStudios()
    {
        $sql = "SELECT * FROM studio";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
