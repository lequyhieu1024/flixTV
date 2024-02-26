<?php
    function getConnect()
    {
        //set connect
       $pdo =  new PDO("mysql:host=" . DBHOST
            . ";dbname=" . DBNAME
            . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
       return $pdo;
    }
    function setQuery($sql) {
        return $sql;
    }
//
//    //Function execute the query
//    // hàm này sẽ làm hàm chạy câu truy vấn
     function execute($options=array(),$sql="") {
        $pdo = getConnect();
        $sta = $pdo->prepare($sql);
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $sta->bindParam($i+1,$options[$i]);
            }
        }
        $sta->execute();
        return $sta;
    }
//
//    //Funtion load datas on table
//    // lấy nhiều dữ liệu ở trong bảng
    function loadAllRows($options=array(),$sql="") {
        if(!$options) {
            if(!$result = execute($options,$sql))
                return false;
        }
        else {
            if(!$result = execute($options,$sql))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
//
//    //Funtion load 1 data on the table
//    //lay 1 du lieu thoi
     function loadRow($option=array(),$sql="") {
        if(!$option) {
            if(!$result = execute($option,$sql))
                return false;
        }
        else {
            if(!$result = execute($option,$sql))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }
//
//
//}
?>