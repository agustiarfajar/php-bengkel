$('#package').on('change', function(){
    // ambil data dari elemen option yang dipilih
    const price = $('#package option:selected').data('price');
    const discount = $('#package option:selected').data('discount');
    
    // kalkulasi total harga
    const totalDiscount = (price * discount/100)
    const total = price - totalDiscount;
    
    // tampilkan data ke element
    $('[name=price]').val(price);
    $('[name=discount]').val(totalDiscount);
    
    $('#total').text(`Rp ${total}`);
});