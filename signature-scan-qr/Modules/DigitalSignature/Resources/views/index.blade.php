@extends('user::layouts.app')

@section('content')
    <input type="hidden" name="img" id='img'/>
    <img id="imgSrc">

    <div
        class="ri2-block ri2-relative ri2-left new-blackoutgradient ri2-txwhite1 ri2-font20 ri2-boxpad10 ri2-box">
        Digital Signature
    </div>
    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
        <div id="signature-pad" class="m-signature-pad">
            <div class="m-signature-pad--body">
                <canvas style="border: 2px dashed #ccc;height: 100px;width: 300px"></canvas>
            </div>
            <div class="ri2-block ri2-relative m-signature-pad--footer" id="btn_preview">
                <button type="button"
                        class="ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgyellow1 ri2-txblack3 ri2-hovering ri2-font16 ri2-semibold ri2-pointer"
                        data-action="clear">Clear
                </button>
                <button type="button"
                        class="ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer"
                        data-action="save">Save
                </button>
            </div>
        </div>
    </div>

@endsection

@section('snippet_scripts')
    <script src="//cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <script>
        $(document).on("submit", "form#form_signature", function (event) {
            event.preventDefault();
            var the_data = $(this).serialize();
            $("body").LoadingOverlay("show");
        });

        $('#modaldigitalSignatureOpen').on('click', function () {
            $('#modaldigitalSignature').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
        });

        $(function () {
            var wrapper = document.getElementById("signature-pad"),
                clearButton = wrapper.querySelector("[data-action=clear]"),
                saveButton = wrapper.querySelector("[data-action=save]"),
                canvas = wrapper.querySelector("canvas"),
                signaturePad;

            window.resizeCanvas = function () {
                var ratio = window.devicePixelRatio || 1;
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }

            resizeCanvas();

            signaturePad = new SignaturePad(canvas);

            clearButton.addEventListener("click", function (event) {
                signaturePad.clear();
            });

            saveButton.addEventListener("click", function (event) {
                event.preventDefault();

                if (signaturePad.isEmpty()) {
                    alert("Please provide a signature first.");
                } else {
                    if (confirm("Apakah anda yakin")) {
                        var dataUrl = signaturePad.toDataURL();

                        $.ajax({
                            url: "{{url('digitalsignature')}}",
                            type: 'POST',
                            crossDomain: true,
                            data: {
                                _token: "{{ csrf_token() }}",
                                img: dataUrl,
                                redirect: "{{$request->redirect}}"
                            },
                        }).done(function (data) {
                            window.location.href = "{{url('digitalsignature/scanQrCode')}}"
                        });
                    }

                }
            });
        });

        $('#modaldigitalSignatureBack').on('click', function () {
            $('#modaldigitalSignature').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

    </script>
@endsection
