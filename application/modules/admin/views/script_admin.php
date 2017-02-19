<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data_pelanggan').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username tidak boleh kosong'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        }
                    }
                },
                ulangi_password: {
                    validators: {
                        notEmpty: {
                            message: 'Ulangi Password tidak boleh kosong'
                        },
                        identical: {
                            field: 'password',
                            message: 'Password tidak sama'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama tidak boleh kosong'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                        	message: 'Email tidak valid'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                tempat_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tempat Lahir tidak boleh kosong'
                        }
                    }
                },
                tanggal_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal Lahir tidak boleh kosong'
                        }
                    }
                },
                jenis_kelamin: {
                    validators: {
                        notEmpty: {
                            message: 'Jenis kelamin belum dipilih'
                        }
                    }
                },
                no_telp: {
                    validators: {
                        notEmpty: {
                            message: 'No telp tidak boleh kosong'
                        },
                        digits: {
                        message: 'No telp harus berupa angka'
                      }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data_pengguna').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username tidak boleh kosong'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        }
                    }
                },
                ulangi_password: {
                    validators: {
                        notEmpty: {
                            message: 'Ulangi Password tidak boleh kosong'
                        },
                        identical: {
                            field: 'password',
                            message: 'Password tidak sama'
                        }
                    }
                },
                level: {
                    validators: {
                        notEmpty: {
                            message: 'Level belum dipilih'
                        }
                    }
                },
                id_atasan: {
                    validators: {
                        notEmpty: {
                            message: 'Atasan belum dipilih'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama tidak boleh kosong'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                            message: 'Email tidak valid'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                no_telp: {
                    validators: {
                        notEmpty: {
                            message: 'No telp tidak boleh kosong'
                        },
                        digits: {
                        message: 'No telp harus berupa angka'
                      }
                    }
                },
                jabatan: {
                    validators: {
                        notEmpty: {
                            message: 'Jabatan tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>


<script>
$(document).ready(function(){
    $("#id_atasan").change(function() {
        var id_atasan = $("#id_atasan").val();
        $.ajax({
          url:"<?=base_url()?>admin/data_pengguna/atasan/"+id_atasan,
          type:"GET",
          dataType:"json",
          // data: {},
          success:function(data)
          {
            console.log(data);
            $("#id_departement").val(data.id_departement);
            $("#nama_departement").val(data.nama_departement);
          } 
        });
    }); 
});
</script>