<?php
    require_once 'db.php';
    $id =  $_POST['id'];
?>
<div class = "district">
    <select name = "district" id = "selectDistrict"  onchange="selectAddress()">
        <option value = 0>Street</option>
        <?php $query_spkm = "SELECT * FROM district WHERE id = $id";
            $result_spkm = $mysqli->query($query_spkm);
            while($arr_spkm = mysqli_fetch_assoc($result_spkm)){
                $id = ($arr_spkm['id']);
                $name = ($arr_spkm['name']);
        ?>
        <option value = <?php echo $id  ?>><?php echo $name; ?></option>
        <?php } ?>
    </select>
</div>