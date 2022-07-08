function ubahFormUpdate(){
    $('input').removeAttr('readonly')
    $('#simpan').removeAttr('disabled')
    $('#btnHide').removeAttr('style')
    $("#btnUpdate").hide()
}

function hideForm(){
    $('input').attr('readonly', true)
    $('#simpan').attr('disabled', true)
    $('#btnHide').show()
    $("#btnHide").hide()
    $("#btnUpdate").show()
}

function simpanData(url){
    $.ajax({
        url: url,
        type: "post",
        data: $("form").serialize(),
        dataType: 'json',
        success: function(data){
            console.log(data)
            if(data.status == 200){
                if(data.pesan.nik){
                    $("#nik").addClass('is-invalid')
                    $(".invalid-nik").text(data.pesan.nik)
                    // alert(data.pesan.nik)
                }
                if(data.pesan.nama){
                    $("#nama_lengkap").addClass('is-invalid')
                    $(".invalid-nama").text(data.pesan.nama)
                }
            }
            if(data.status == 400){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Berhasil",
                    text: data.pesan,
                    showConfirmButton: false,
                    timer: 2000
                  })
            }
        }
    });
}
