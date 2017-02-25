<!DOCTYPE html>
<html lang="en">
  <head> 
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <style type="text/css">
        .login-form {
          width: 350px;
          padding: 40px 30px;
          background: #eee;
          -moz-border-radius: 4px;
          -webkit-border-radius: 4px;
          border-radius: 4px;
          margin: auto;
          position: absolute;
          left: 0;
          right: 0;
          top: 50%;
          -moz-transform: translateY(-50%);
          -ms-transform: translateY(-50%);
          -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
        }
        .btn-log {
          dispaly: inline-block;
          width: 100%;
          font-size: 16px;
          height: 50px;
          color: #fff;
          text-decoration: none;
          border: none;
          -moz-border-radius: 4px;
          -webkit-border-radius: 4px;
          border-radius: 4px;
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css">

    <!-- formvalidation CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/formValidation.css">
  </head>

<body style="background-color: #C36464;">

    <div class="login-form">
     <div>
       <img class="img-circle" src="<?=base_url()?>assets/img/64-64.jpg" style="widht:80px;height:80px; margin-left:102px;">
        <h4 align="center">PERSADA DUTA BELITION</h4>
        <h4 align="center">TOUR & TRAVEL</h4>
     </div>
      <div>
        <?php if ($this->session->flashdata('username_not_register')) : ?>
            <strong>
                <span class='help-block'><?=$this->session->flashdata('username_not_register')?></span>
            </strong>
        <?php elseif ($this->session->flashdata('wrong_password')) : ?>
            <strong>
                <span class='help-block'><?=$this->session->flashdata('wrong_password')?></span>
            </strong>
        <?php elseif ($this->session->flashdata('status_tidak_aktif')) : ?>
            <strong>
                <span class='help-block'><?=$this->session->flashdata('status_tidak_aktif')?></span>
            </strong>
        <?php endif; ?>
      </div>
    <form id="defaultForm" method="post" class="form-horizontal" action="<?=base_url()?>auth/users">
     <div class="form-group ">
       <input type="text" name="username" class="form-control" placeholder="Username ">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group">
       <input type="password" name="password" class="form-control" placeholder="Password">
       <i class="fa fa-lock"></i>
     </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" value="Sign in">Sign in</button>
        </div>
    </form>
    
   </div>

<!-- jQuery -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<!-- formvalidation js -->
<script src="<?=base_url()?>assets/js/formValidation.js"></script>

<!-- bootstrap js -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>

<!-- Validation script -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#defaultForm').formValidation({
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


</body>
</html>