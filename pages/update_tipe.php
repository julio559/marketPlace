<?php

include("php/conexao.php");
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $unlock = isset($_POST['unlock']);

    $newTipeValue = $unlock ? 0 : 1;
    $sql = "UPDATE produto SET tipe = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ii", $newTipeValue, $id);
        if($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
        $stmt->close();
    } else {
        echo "error";
    }
    $mysqli->close();
}
?>
