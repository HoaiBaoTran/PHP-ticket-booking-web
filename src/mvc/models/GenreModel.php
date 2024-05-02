<?php
class GenreModel extends DB
{
    public function getAllGenres()
    {
        $sql = "SELECT * FROM genre";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
