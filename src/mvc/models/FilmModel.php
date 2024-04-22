<?php
class FilmModel extends DB
{
    public function getAllFilms()
    {
        $sql = "SELECT * FROM film";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function getFilmById($id)
    {
        $sql = "SELECT * FROM film WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
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
