@extends('layouts.app')
@section('index_show', 'show')
@section('index', 'active')
@section('tasmeter', 'active')
@section('content')



    <style media="screen">
        .btn-md {
            padding: 1rem 2.4rem;
            font-size: .94rem;
            display: none;
        }

        .swal2-popup {
            font-family: inherit;
            font-size: 1.2rem;
        }
    </style>

    <div class="card">

        <div class="card-body">
            <form action="{{ Route('scanabsen') }}" method="get" id="formabsen">
                {{ csrf_field() }}
                <div id="sourceSelectPanel" style="display:none">
                    <label for="sourceSelect">Change video source:</label>
                    <select id="sourceSelect" style="max-width:400px"></select>
                </div>

                <div>
                    <video id="video" width="100%" height="100%" style="border: 1px solid gray"></video>
                </div>
                <textarea hidden="" name="id_karyawan" id="result" readonly></textarea>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                {{-- <span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span> --}}


            </form>
            <div id="result"></div>
        </div>
    </div>








    {{-- <section class='content' id="demo-content">
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box '>
                <div class='box-header'></div>
                <div class='box-body'>

                </div>
            </div>
        </div>
    </div>
</section> --}}
    <script src="{{ asset('frontend/light/plugin/zxing/zxing.min.js') }}"></script>

    <script src="{{ asset('frontend/light/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        window.addEventListener('load', function() {
            let selectedDeviceId;
            let audio = new Audio("/audio/beep.mp3");
            const codeReader = new ZXing.BrowserQRCodeReader()
            console.log('ZXing code reader initialized')
            codeReader.getVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })
                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        };
                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }
                    codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
                        console.log(result)
                        document.getElementById('result').textContent = result.text
                        if (result != null) {
                            audio.play();

                        }
                        // $('#button1').submit();
                        // document.getElementById('formabsen').submit();
                        let qr = $('#result').val();
                        // let token = {{ csrf_token() }}

                        //ajax
                        $.ajax({

                            url: "{{route('scanabsen')}}",
                            type: "post",
                            cache: false,
                            data: {
                                "qr": qr,
                                "_token": $('#token').val()
                            },
                            success: function(response) {
                                console.log(response)
                                if (response.status == "berhasil") {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: `${response.message}`,
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                    window.location.href = '{{ route('dashboard') }}';
                                } else {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'error',
                                        title: `${response.message}`,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }



                                //                 //show success message
                                //                 Swal.fire({
                                //                     type: 'success',
                                //                     icon: 'success',
                                //                     title: `${response.message}`,
                                //                     showConfirmButton: false,
                                //                     timer: 3000
                                //                 });

                                //                 //data post
                                //                 let post = `
                            //     <tr id="index_${response.data.id}">
                            //         <td>${response.data.title}</td>
                            //         <td>${response.data.content}</td>
                            //         <td class="text-center">
                            //             <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            //             <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                            //         </td>
                            //     </tr>
                            // `;

                                //                 //append to table
                                //                 $('#table-posts').prepend(post);

                                //                 //clear form
                                //                 $('#title').val('');
                                //                 $('#content').val('');

                                //                 //close modal
                                //                 $('#modal-create').modal('hide');


                            },
                            error: function(error) {

                                // if (error.responseJSON.title[0]) {

                                //     //show alert
                                //     $('#alert-title').removeClass('d-none');
                                //     $('#alert-title').addClass('d-block');

                                //     //add message to alert
                                //     $('#alert-title').html(error.responseJSON.title[0]);
                                // }

                                // if (error.responseJSON.content[0]) {

                                //     //show alert
                                //     $('#alert-content').removeClass('d-none');
                                //     $('#alert-content').addClass('d-block');

                                //     //add message to alert
                                //     $('#alert-content').html(error.responseJSON.content[0]);
                                // }

                            }

                        });

                    }).catch((err) => {
                        console.error(err)
                        document.getElementById('result').textContent = err
                    })
                    console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
                })
                .catch((err) => {
                    console.error(err)
                })
        })
    </script>


@endsection
