<?php
    require("connection.php");

    $data = mysqli_query($connection, "SELECT * FROM orders");
    $check_data = mysqli_affected_rows($connection);

    if ($check_data > 0) {
        $res["Kode"] = 1;
        $res["Pesan"] = "Data tersedia";
        $res["Data"] = array();
        
        while ($order = mysqli_fetch_object($data)) {
            $arr["id"] = $order->id;
            $arr["name "] = $order->name;
            $arr["phone1"] = $order->phone1;
            $arr["phone2"] = $order->phone2;
            $arr["address"] = $order->address;
            $arr["description"] = $order->description;
            $arr["fnd_list"] = json_decode($order->fnd_list, true) ;
            $arr["total"] = $order->total;
            $arr["status"] = $order->status;
            $arr["created_at"] = $order->created_at;
            $arr["updated_at"] = $order->updated_at;
    
            array_push($res["Data"], $arr);
        };
    } else {
        $res["Kode"] = 0;
        $res["Pesan"] = "Data tidak tersedia";
    };

    echo json_encode($res);
    mysqli_close($connection);
?>