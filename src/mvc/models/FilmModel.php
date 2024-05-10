<?php
class FilmModel extends DB
{
    public function getAllFilms()
    {
        $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
        f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
        FROM film f
        INNER JOIN film_genre fg ON fg.film_id = f.film_id
        INNER JOIN genre g ON fg.genre_id = g.genre_id
        INNER JOIN studio s ON f.studio_id  = s.studio_id 
        INNER JOIN `language` l ON f.language_id  = l.language_id 
        GROUP BY f.film_id
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function getHotFilms()
    {
        $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
        f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
        FROM film f
        INNER JOIN film_genre fg ON fg.film_id = f.film_id
        INNER JOIN genre g ON fg.genre_id = g.genre_id
        INNER JOIN studio s ON f.studio_id  = s.studio_id 
        INNER JOIN `language` l ON f.language_id  = l.language_id 
        WHERE f.rating > 3
        GROUP BY f.film_id
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function getPremiereFilms()
    {
        $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
        f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
        FROM film f
        INNER JOIN film_genre fg ON fg.film_id = f.film_id
        INNER JOIN genre g ON fg.genre_id = g.genre_id
        INNER JOIN studio s ON f.studio_id  = s.studio_id 
        INNER JOIN `language` l ON f.language_id  = l.language_id 
        WHERE f.premiere < CURDATE()
        GROUP BY f.film_id
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function getUpComingFilms()
    {
        $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
        f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
        FROM film f
        INNER JOIN film_genre fg ON fg.film_id = f.film_id
        INNER JOIN genre g ON fg.genre_id = g.genre_id
        INNER JOIN studio s ON f.studio_id  = s.studio_id 
        INNER JOIN `language` l ON f.language_id  = l.language_id 
        WHERE f.premiere > CURDATE()
        GROUP BY f.film_id
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function getFilmsByCondition($genre, $studio, $language, $id)
    {
        if ($id != -1) {
            $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
            f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
            FROM film f
            INNER JOIN film_genre fg ON fg.film_id = f.film_id
            INNER JOIN genre g ON fg.genre_id = g.genre_id
            INNER JOIN studio s ON f.studio_id  = s.studio_id 
            INNER JOIN `language` l ON f.language_id  = l.language_id 
            WHERE f.film_id = $id
            GROUP BY f.film_id
            ";
        } else {
            $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
                    f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
                    FROM film f
                    INNER JOIN film_genre fg ON fg.film_id = f.film_id
                    INNER JOIN genre g ON fg.genre_id = g.genre_id
                    INNER JOIN studio s ON f.studio_id  = s.studio_id 
                    INNER JOIN `language` l ON f.language_id  = l.language_id ";
            $spaceTrim = -1;
            if (
                $genre != -1 ||
                $studio != -1 ||
                $language != -1
            ) {
                $sql .= " WHERE";
                $spaceTrim = -4;
            }

            if ($genre != -1) {
                $sql .= " fg.genre_id LIKE '%$genre%' AND";
            }

            if ($studio != -1) {
                $sql .= " f.studio_id LIKE '%$studio%' AND";
            }

            if ($language != -1) {
                $sql .= " f.language_id LIKE '%$language%' AND";
            }

            $sql = substr_replace($sql, "", $spaceTrim);

            $sql .= " GROUP BY f.film_id";
        }
        // echo $sql;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }


    public function getFilmById($id)
    {
        $sql = "SELECT f.film_id, f.name, f.time, f.publish_year, f.director, f.description, l.language_name,
        f.premiere, f.url_poster_vertical, f.url_trailer, GROUP_CONCAT(g.genre_name) as type
        FROM film f
        INNER JOIN film_genre fg ON fg.film_id = f.film_id
        INNER JOIN genre g ON fg.genre_id = g.genre_id
        INNER JOIN studio s ON f.studio_id  = s.studio_id 
        INNER JOIN `language` l ON f.language_id  = l.language_id 
        WHERE f.film_id = :id
        GROUP BY f.film_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public function addFilm(
        $name,
        $director,
        $year,
        $premiere,
        $urlTrailer,
        $time,
        $studioId,
        $languageId,
        $description,
        $age,
        $rating,
        $genres,
        $urlPosterVertical,
        $urlPosterHorizontal
    ) {
        $sql = "INSERT INTO film(`name`,`director`,`publish_year`,
        `premiere`,`url_trailer`,`url_poster_vertical`,`url_poster_horizontal`,
        `time`,`description`,`studio_id`,`language_id`,`rating`,`age`) VALUES
        (:name, :director, :publish_year, 
        :premiere, :url_trailer, :url_poster_vertical, :url_poster_horizontal,
        :time, :description, :studio_id, :language_id, :rating, :age)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('name', $name);
        $stmt->bindParam('director', $director);
        $stmt->bindParam('publish_year', $year);
        $stmt->bindParam('premiere', $premiere);
        $stmt->bindParam('url_trailer', $urlTrailer);
        $stmt->bindParam('url_poster_vertical', $urlPosterVertical);
        $stmt->bindParam('url_poster_horizontal', $urlPosterHorizontal);
        $stmt->bindParam('time', $time);
        $stmt->bindParam('description', $description);
        $stmt->bindParam('studio_id', $studioId);
        $stmt->bindParam('language_id', $languageId);
        $stmt->bindParam('rating', $rating);
        $stmt->bindParam('age', $age);
        if ($stmt->execute()) {
            $newId = $this->con->lastInsertId();
            foreach ($genres as $genre_id) {
                $sql = "INSERT INTO film_genre(`film_id`, `genre_id`) VALUES
            (:film_id, :genre_id)";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam('film_id', $newId);
                $stmt->bindParam('genre_id', $genre_id);
                $stmt->execute();
            }
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(array('status' => true, 'data' => $data));
        }
    }

    public function deleteFilmById($id)
    {
        $sql = "DELETE FROM film 
        WHERE film_id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
