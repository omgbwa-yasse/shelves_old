<?
require_once 'models/connexion.class.php';
class authorManager extends connexion{

    public function getAllAuthors() {
        $stmt = $this->getCnx()->prepare("SELECT author_name FROM author ORDER BY AS ASC"); 
        $stmt->execute();
        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $authors;
      }

}
?>