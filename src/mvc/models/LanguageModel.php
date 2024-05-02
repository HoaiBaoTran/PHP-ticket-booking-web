<?php
class LanguageModel extends DB
{
    public function getAllLanguages()
    {
        $sql = "SELECT * FROM `language`";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('status' => true, 'data' => $data));
    }
}
