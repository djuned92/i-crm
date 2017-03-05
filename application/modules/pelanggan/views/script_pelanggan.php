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

<!-- Validation script -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.defaultForm').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: 'The username is not valid',
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
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.profile').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
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
        $('.ulasan').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                isi_kritik: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Kritik tidak boleh kosong'
                        }
                    }
                },
                isi_testimoni: {
                    validators: {
                        notEmpty: {
                            message: 'Testimoni tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });
</script>