<?php
namespace DeleteMovieController;
require_once '../Model/DeleteMove.php';

use Model\DeleteMovie;

class DeleteMovieController {
    public function handleDeleteRequest() {
        if (isset($_POST['delete'])) {
            $mid = $_POST['mid'];
            if (DeleteMovie::deleteMovie($mid)) {
                echo "<center><p style='color: black;text-shadow: -2px 2px 3px whitesmoke; font-family: cursive; font-size: 40px; background-color: gray;'>Deleting Complete</p></center>";
            } else {
                echo "<center><p style='color: red;'>Error deleting movie.</p></center>";
            }
        }
    }
}
?>
