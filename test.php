<?php include_once("functions.php"); ?>
<form>
    <select name="package" id="package" onchange="price(this)">
        <option data-harga="" data-discount="" selected disabled>--Pilih--</option>
        <?php
            $datapaket=getListPaket();
            foreach($datapaket as $data){
                echo "<option value=\"".$data["kdPaket"]."\">[".$data["kdPaket"]."]".$data["namaPaket"]."</option>";
            }
        ?>
        <!-- <option data-harga="100000" data-discount="10">Paket 1</option>
        <option data-harga="150000" data-discount="10">Paket 2</option>
        <option data-harga="200000" data-discount="10">Paket 3</option> -->
    </select>
    <!--
    <input type="number" step="0.1" min="0" name="berat" id="berat" style="width:100px" onchange="weight(this)"></td>
    -->
    <div>
        <table>
            <tr><td>Price : </td><td id="price"></td></tr>
            <tr><td>Discount : </td><td id="discount"></td></tr>
            <tr><td>Total : </td><td id="total"></td></tr>
        </table>
    </div>

</form>
<script type="text/javascript">
    function price(sel) {
        var opt = sel.options[sel.selectedIndex];
        var harga = opt.dataset.harga;
        // var disc = opt.dataset.discount;
        // var total = harga * disc / 100;
        document.getElementById("price").innerHTML = harga;
        // document.getElementById("discount").innerHTML = disc;
        // document.getElementById("total").innerHTML = total;
    }
</script>