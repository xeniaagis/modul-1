$(document).ready(function() {
    // Menampilkan gambar dengan opacity 1 saat halaman dimuat
    $('.gallery img').css('opacity', 1);

    // Menangani klik pada gambar untuk membuka modal
    $('.gallery img').on('click', function() {
        const src = $(this).attr('src'); // Ambil sumber gambar yang diklik
        $('.modal img').attr('src', src); // Atur sumber gambar modal
        $('.modal').fadeIn(); // Tampilkan modal dengan efek fade-in
    });

    // Menangani klik pada tombol close untuk menutup modal
    $('.close-btn').on('click', function() {
        $('.modal').fadeOut(); // Sembunyikan modal dengan efek fade-out
    });

    // Menangani klik di luar gambar modal untuk menutup modal
    $('.modal').on('click', function(e) {
        if ($(e.target).is('.modal')) {
            $(this).fadeOut(); // Sembunyikan modal jika klik di luar gambar
        }
    });
});
