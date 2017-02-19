<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.paket_wisata').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama_wisata: {
                    validators: {
                        notEmpty: {
                            message: 'Wisata tidak boleh kosong'
                        }
                    }
                },
                lokasi: {
                    validators: {
                        notEmpty: {
                            message: 'Lokasi tidak boleh kosong'
                        }
                    }
                },
                userfile: {
                    validators: {
                        // notEmpty: {
                        //     message: 'Gambar tidak boleh kosong'
                        // },
                        file: {
                            extension: 'jpg,png',
                            // type: '<?=base_url()?>assets/img/jpg?>,<?=base_url()?>assets/img/png?>',
                            message: 'Tipe gambar harus .jpg atau .png'
                        }
                    }
                },
                deskripsi: {
                    validators: {
                        notEmpty: {
                            message: 'Deskripsi tidak boleh kosong'
                        }
                    }
                },
                tgl_mulai: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal mulai tidak boleh kosong'
                        }
                    }
                },
                tgl_akhir: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal akhir tidak boleh kosong'
                        }
                    }
                },
                harga: {
                    validators: {
                        notEmpty: {
                            message: 'Harga tidak boleh kosong'
                        },
                      //   digits: {
                      //   message: 'Harga tidak benar'
                      // }
                    }
                },
                norek_perusahaan: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor rekening perusahaan tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.lihat_pemesanan').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nomor_pemesanan: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor pemesanan tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.promosi').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                id_paket_wisata: {
                    validators: {
                        notEmpty: {
                            message: 'Paket wisata belum dipilih'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Promosi tidak boleh kosong'
                        }
                    }
                },
                isi: {
                    validators: {
                        notEmpty: {
                            message: 'Isi tidak boleh kosong'
                        }
                    }
                },
                tgl_promosi: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal promosi tidak boleh kosong'
                        }
                    }
                },
                potongan_harga: {
                    validators: {
                        notEmpty: {
                            message: 'Diskon tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    $("#id_paket_wisata").change(function() {
        var id_paket_wisata = $("#id_paket_wisata").val();
        $.ajax({
          url:"<?=base_url()?>marketing/promosi/paket_wisata/"+id_paket_wisata,
          type:"GET",
          dataType:"json",
          // data: {},
          success:function(data)
          {
            console.log(data);
            $("#lokasi").val(data.lokasi);
            $("#gamba_wisata").val(data.gamba_wisata);
            $("#deskripsi").val(data.deskripsi);
            $("#tgl_mulai").val(data.tgl_mulai);
            $("#tgl_akhir").val(data.tgl_akhir);
            $("#harga").val(data.harga);
            $("#norek_perusahaan").val(data.norek_perusahaan);
          } 
        });
    }); 
});
</script>