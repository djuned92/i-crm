<script type="text/javascript">
    $(document).ready(function() {
        $('.from-to-tgl').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                from_tgl: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal tidak boleh kosong'
                        }
                    }
                },
                to_tgl: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });
</script>