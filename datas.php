<html>
<head>

    <script src="jquery/jquery-3.7.1.min.js"></script>

<?php 
include 'connection.php';
?>

</head>

<body>
    <a href="http://ayessuat.com"><div style="width: 100%; height: 70px; line-height:70px; text-align:center; margin-bottom: 50px; background-color: skyblue; border-radius: 10px;">
    ANASAYFA
</div></a>
    <style>
    *{
        margin: 0px;
    }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>

<?php
 function getFirmalarById($_id, $conn) {
        $id = htmlspecialchars($_id, ENT_QUOTES, 'UTF-8');
        $query = $conn->query("SELECT * FROM firmalar WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
    function getTedarikciFirmalarById($_id, $conn) {
        $id = htmlspecialchars($_id, ENT_QUOTES, 'UTF-8');
        $query = $conn->query("SELECT * FROM tedarikci_firmalar WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
?>

<div class="container">
    <div class="row">
        
        <table>
        <tr>
            <th>Doküm No</th>
            <th>Barkod No</th>
            <th>Parti No</th>
            <th>İrsaliye No</th>
            <th>Kamyon Plaka</th>
            <th>Çekme No</th>
            <th>Kesme No</th>
            <th>Kaynak No</th>
            <th>Kaynak Yolu No</th>
            <th>Filmaşin Miktar</th>
            <th>Tedarikçi Firma ID</th>
            <th>Firma ID</th>
            <th>Çap</th>
            <th>Kabul Tarihi</th>
            <th>İşlenme Tarihi</th>
            <th>İşlenme Miktarı</th>
        </tr>
        <?php
        $query = $conn->query("SELECT * FROM celik_hasir", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
             foreach( $query as $row ){
        ?>
        <tr>
            <td><?= $row['dokum_no']; ?></td>
            <td><?= $row['barkod_no']; ?></td>
            <td><?= $row['parti_no']; ?></td>
            <td><?= $row['irsaliye_no']; ?></td>
            <td><?= $row['kamyon_plaka']; ?></td>
            <td><?= $row['cekme_no']; ?></td>
            <td><?= $row['kesme_no']; ?></td>
            <td><?= $row['kaynak_no']; ?></td>
            <td><?= $row['kaynak_yolu_no']; ?></td>
            <td><?= $row['filmasin_miktar']; ?></td>
            <td><?= getTedarikciFirmalarById($row['tedarikci_firma_id'], $conn)['firma_adi']; ?></td>
            <td><?= getFirmalarById($row['firma_id'], $conn)['firma_adi']; ?></td>
            <td><?= $row['cap']; ?></td>
            <td><?= $row['kabul_tarihi']; ?></td>
            <td><?= $row['islenme_tarihi']; ?></td>
            <td><?= $row['islenme_miktari']; ?></td>
        </tr>
        <?php
        }
        }
        ?>
    </table>
        
    </div>
</div>

<script>
  
</script>

</body>

</html>