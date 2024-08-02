<!-- laravel style -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script>
    function confirmCancel() {
        console.log(document.referrer);
        Swal.fire({
            title: 'Apakah kamu yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Batalkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                if (document.referrer) {
                    window.location.href = document.referrer;
                } else {
                    history.back();
                }
            }
        });
    }

    function successAlert(message) {
        Swal.fire({
            title: "Success!",
            text: message + "!",
            icon: "success",
            customClass: {
                confirmButton: "btn btn-primary"
            },
            buttonsStyling: !1
        })
    }

    function downloadImage(url, filename) {

        const link = document.createElement('a');
        link.href = url;
        link.download = filename;
        console.log(link);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
