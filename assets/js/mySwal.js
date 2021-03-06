const flashData = $('.flash-data').data('flashdata');

if(flashData){
    Swal({
        title: 'Data',
        text: flashData,
        type: 'success'
    });
}

// Tommbol hapus
$('.tombol-hapus').on('click', function(e){
    // Mematikan href
    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin ingin menghapus?',
        text: "data akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if(result.value){
            document.location.href = href;
        }
    })
})