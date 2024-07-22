require('./bootstrap');

var QRCode = require('qrcode')
var Swal = require('sweetalert2')






Echo.channel('absensi')
    .listen('MonitorqrEvent', (e) => {
        console.log('event absensi')
        console.log(e);

        var canvas = document.getElementById('canvas')

        QRCode.toCanvas(canvas, "'" + e.id + "'", { scale: 8 }, function (error) {
            if (error) console.error(error)
            console.log('success!');
        })

        if (e.status == "berhasil") {
            Swal.fire({
                icon: 'success',
                title: `${e.nama}`,
                text: `${e.message}`,
                showConfirmButton: false,
                timer: 3000
            })

        } else if(e.status == "reset") {
            Swal.fire({
                icon: 'success',
                title: 'Token di reset',
                text: 'Token berhasil direset',
                showConfirmButton: false,
                timer: 3000
            })
        }


        else {
            Swal.fire({
                icon: 'error',
                title: `${e.nama}`,
                text: `${e.message}`,
                showConfirmButton: false,
                timer: 1500
            })
        }
        //   Swal.fire({

        //     icon: 'success',
        //     title: `${e.nama}`,
        //     showConfirmButton: false,
        //     timer: 3000
        // })



    });

QRCode.toCanvas(canvas, "refres halaman evet ", { scale: 8 }, function (error) {
    if (error) console.error(error)
    console.log('success!');
})