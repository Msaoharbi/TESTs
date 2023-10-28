<?php
namespace Model;

use Conn\Connection;

class DeleteMovie {
    public static function deleteMovie($mid) {
        $conn = Connection::conn();
        $query = "DELETE FROM `item` WHERE ID = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
            return false;
        }

        $stmt->bind_param('s', $mid);
        if (!$stmt->execute()) {
            error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
            return false;
        }

        $stmt->close();
        $conn->close();
        return true;
    }
}
?>
