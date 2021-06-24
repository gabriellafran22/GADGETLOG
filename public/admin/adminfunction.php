<?php
    $koneksi = mysqli_connect("127.0.0.1:3307", "gadgetlog", "Gadgetlog.1", "gadgetlog");
    session_start();

    function admin_regis($data){
        global $koneksi;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $pass_conf = mysqli_real_escape_string($koneksi, $data["pass_conf"]);
        $email = htmlspecialchars($data["email"]);

        $result = mysqli_query($koneksi, "SELECT username FROM account WHERE username='$username' AND type='admin'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>
                        alert('username already exist');
                  </script>";
            return false;
        }

        if($password !== $pass_conf){
            echo "<script>
                    alert('confirm password must be same as password');
                  </script>";
            return false;
        }

        //password_hash encription
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($koneksi, "INSERT INTO account VALUES('', '$username', '$password', '$email', 'admin')");

        return mysqli_affected_rows($koneksi);
    }

    function admin_login($username, $password)
    {
        global $koneksi;

        $username = mysqli_escape_string($koneksi, $username);
        $password = mysqli_escape_string($koneksi, $password);

        $queryString = sprintf("SELECT `userid` FROM account WHERE `username`='%s' AND `type`='admin'", $username);
        $result = mysqli_query($koneksi, $queryString);
        $num_rows = mysqli_num_rows($result);

        // return cepat untuk mengetahui bahwa tidak ada
        // user terkait
        // if ($num_rows == 0 || $num_rows > 1) return false;

        // username ada, cek password
        // ambil userid
        $userid = mysqli_fetch_assoc($result)['userid'];
        $queryString = sprintf("SELECT `password` FROM account WHERE `userid`=%d  AND `type`='admin'", $userid);
        $result = mysqli_query($koneksi, $queryString);
        // nggak perlu tau berapa number of rows
        $hash_password = mysqli_fetch_assoc($result)['password'];

        // $password = hash('sha256',$password);
        // var_dump($password);
        if (password_verify($password, $hash_password)) {
        // cara bego :))
        // if($password == mysqli_fetch_assoc($result)['password']){
            
            $_SESSION['admin_name'] = $username;

            return true;
        } else return false;
    }

    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ( $row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function unread($data){
        global $koneksi;

        $cid = $data['cid'];
        mysqli_query($koneksi, "UPDATE contactus SET `isread` = true WHERE `contactusid` = $cid");

        return mysqli_affected_rows($koneksi);
    }

    function deleteGadget($data){
        global $koneksi;

        $pid = $data['phoneID'];
        mysqli_query($koneksi, "DELETE FROM phone WHERE `phoneid` = $pid");

        return mysqli_affected_rows($koneksi);
    }

    function uploadImg($namaBrands){
        $namaFiles = $_FILES["phoneimg"]["name"];
        $ukuranFile = $_FILES["phoneimg"]["size"];
        $error =  $_FILES["phoneimg"]["error"];
        $tmpName = $_FILES["phoneimg"]["tmp_name"];

        $ekstensiGambarValid = ["jpg", "jpeg", "png"];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                      alert('Uploaded file is not a picture!');
                  </script>";
            return false;
        }

        
        if( $ukuranFile > (5*1024*1024)){
            echo "<script>
                      alert('Picture size must be under 5mb!');
                  </script>";
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        //move_uploaded_file(filename, destination)
        move_uploaded_file($tmpName, "../images/phones/$namaBrands/" . $namaFilesBaru);

        return $namaFilesBaru;
    }

    function addGadget($data){
        global $koneksi;

        $phoneName = $data['phonename'];
        $brand = $data['brand'];
        $rating = $data['rating'];

        $result = mysqli_query($koneksi, "SELECT phonename FROM phone WHERE phonename='$phoneName'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('Phone already exist');
                  </script>";
            return false;
        }

        $phoneImg = uploadImg($brand);
       
        $tmp = mysqli_query($koneksi, "SELECT phonebrandid FROM phonebrand WHERE name='$brand'");
        $brandid= $tmp->fetch_array()[0];

        mysqli_query($koneksi, "INSERT INTO phone VALUES ('', '$phoneName', $brandid, $rating, '$phoneImg')");

        $temp = mysqli_query($koneksi, "SELECT phoneid FROM phone WHERE phonename='$phoneName'");
        $phoneId = $temp->fetch_array()[0];

        $technology = $data['technology'];
        $status = $data['status'];
        $dimension = $data['dimension'];
        $weight = $data['weight'];
        $build = $data['build'];
        $sim = $data['SIM'];
        $displayType = $data['displaytype'];
        $size = $data['size'];
        $resolution = $data['resolution'];
        $protection = $data['protection'];
        $os = $data['OS'];
        $chipset = $data['chipset'];
        $cpu = $data['CPU'];
        $gpu = $data['GPU'];
        $cardSlot = $data['cardslot'];
        $internal = $data['internal'];
        $mainModules = $data['mainmodules'];
        $mainFeatures = $data['mainfeatures'];
        $mainVideo = $data['mainvideo'];
        $selfieModules = $data["selfiemodules"];
        $selfieFeatures = $data["selfiefeatures"];
        $selfieVideo = $data["selfievideo"];
        $loudspeaker = $data["loudspeaker"];
        $mmjack = $data["mmjack"];
        $wlan = $data["WLAN"];
        $bluetooth = $data["bluetooth"];
        $gps = $data["GPS"];
        $nfc = $data["NFC"];
        $radio = $data["radio"];
        $usb = $data["USB"];
        $sensors = $data["sensors"];
        $batteryType = $data["batterytype"];
        $charging = $data["charging"];

        $query = "INSERT INTO phonespecification VALUES ('', '$phoneId', '$technology', '$status', '$dimension', '$weight', '$build', '$sim', '$displayType', '$size', '$resolution', '$protection', '$os', '$chipset', '$cpu', '$gpu', '$cardSlot', '$internal', '$mainModules', '$mainFeatures', '$mainVideo', '$selfieModules', '$selfieFeatures', '$selfieVideo', '$loudspeaker', '$mmjack', '$wlan', '$bluetooth', '$gps', '$nfc', '$radio', '$usb', '$sensors', '$batteryType', '$charging')";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

     function updateGadget($data){
        global $koneksi;

        $phoneName = $data['phonename'];
        $brand = $data['brand'];
        $rating = $data['rating'];

        $gambarLama = htmlspecialchars($data["gambarLama"]);
        if ($_FILES['phoneimg']['error'] === 4){
            $phoneImg = $gambarLama;
        } else {
            $phoneImg = uploadImg($brand);
        }
       
        $tmp = mysqli_query($koneksi, "SELECT phonebrandid FROM phonebrand WHERE name='$brand'");
        $brandid= $tmp->fetch_array()[0];

        mysqli_query($koneksi, "INSERT INTO phone VALUES ('', '$phoneName', $brandid, $rating, '$phoneImg')");

        $temp = mysqli_query($koneksi, "SELECT phoneid FROM phone WHERE phonename='$phoneName'");
        $phoneId = $temp->fetch_array()[0];

        $queryPhone = "UPDATE phone SET 
        phonename = '$phoneName', 
        phonebrandid = $brandid, 
        rating = $rating, 
        phoneimg = '$phoneImg'  
        WHERE phoneid = $phoneId";
        mysqli_query($koneksi, $queryPhone);

        $aff = mysqli_affected_rows($koneksi);

        $technology = $data['technology'];
        $status = $data['status'];
        $dimension = $data['dimension'];
        $weight = $data['weight'];
        $build = $data['build'];
        $sim = $data['SIM'];
        $displayType = $data['displaytype'];
        $size = $data['size'];
        $resolution = $data['resolution'];
        $protection = $data['protection'];
        $os = $data['OS'];
        $chipset = $data['chipset'];
        $cpu = $data['CPU'];
        $gpu = $data['GPU'];
        $cardSlot = $data['cardslot'];
        $internal = $data['internal'];
        $mainModules = $data['mainmodules'];
        $mainFeatures = $data['mainfeatures'];
        $mainVideo = $data['mainvideo'];
        $selfieModules = $data["selfiemodules"];
        $selfieFeatures = $data["selfiefeatures"];
        $selfieVideo = $data["selfievideo"];
        $loudspeaker = $data["loudspeaker"];
        $mmjack = $data["mmjack"];
        $wlan = $data["WLAN"];
        $bluetooth = $data["bluetooth"];
        $gps = $data["GPS"];
        $nfc = $data["NFC"];
        $radio = $data["radio"];
        $usb = $data["USB"];
        $sensors = $data["sensors"];
        $batteryType = $data["batterytype"];
        $charging = $data["charging"];

        $query = "UPDATE phonespecification SET 
        technology = '$technology', 
        status = '$status', 
        dimension = '$dimension', 
        weight = '$weight', 
        build = '$build', 
        SIM = '$sim', 
        displaytype = '$displayType', 
        size = '$size', 
        resolution = '$resolution', 
        protection ='$protection', 
        OS = '$os', 
        chipset = '$chipset', 
        CPU = '$cpu', 
        GPU = '$gpu',
        cardslot = '$cardSlot',
        internal = '$internal',
        mainmodules = '$mainModules',
        mainfeatures = '$mainFeatures',
        mainvideo = '$mainVideo',
        selfiemodules = '$selfieModules',
        selfiefeatures = '$selfieFeatures',
        selfievideo = '$selfieVideo',
        loudspeaker = '$loudspeaker',
        mmjack = '$mmjack',
        WLAN = '$wlan',
        bluetooth = '$bluetooth',
        GPS = '$gps',
        NFC = '$nfc',
        radio = '$radio',
        USB = '$usb',
        sensors = '$sensors',
        batterytype = '$batteryType',
        charging = '$charging' WHERE phoneid = $phoneId";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi)+$aff;
    }
?>