
            //jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("kode-anggota").value=$(this).attr('data-id-anggota');
                $("#myModal").modal('hide');    
            });
            
            $(document).on('click', '.pilih-buku', function (e) {

                document.getElementById("judul").value = $(this).attr('data-judul');
                document.getElementById("kode-buku").value=$(this).attr('data-id-buku');
                $("#myModal1").modal('hide');    
            });

            //abel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });

            
