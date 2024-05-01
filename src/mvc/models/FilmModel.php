<?php
class FilmModel extends DB
{
    public function getAllFilms()
    {
        $sql = "SELECT f.film_id, f.name, f.runtime, f.publish_year, 
        f.director, f.description,  f.image, GROUP_CONCAT(t.name) as type
        FROM film f
        INNER JOIN film_type ft ON ft.film_id = f.film_id
        INNER JOIN type t ON ft.type_id = t.type_id
        GROUP BY f.film_id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function getFilmById($id)
    {
        $sql = "SELECT * FROM film JOIN 
        WHERE film_id = :id";
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
