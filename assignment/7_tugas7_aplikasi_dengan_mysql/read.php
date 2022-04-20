<?php
    require("connection.php");

    $data = mysqli_query($connection, "SELECT * FROM tbl_resto");
    $check_data = mysqli_affected_rows($connection);

    if ($check_data > 0) {
        $res["Kode"] = 1;
        $res["Pesan"] = "Data tersedia";
        $res["Data"] = array();
        
        while ($resto = mysqli_fetch_object($data)) {
            $arr["id"] = $resto->id;
            $arr["nama"] = $resto->nama;
            $arr["alamat"] = $resto->alamat;
            $arr["telp"] = $resto->telp;
    
            array_push($res["Data"], $arr);
        };
    } else {
        $res["Kode"] = 0;
        $res["Pesan"] = "Data tidak tersedia";
    };

    echo json_encode($res);
    mysqli_close($connection);
?>