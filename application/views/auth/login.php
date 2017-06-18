<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sarti.gr Backend">
        <meta name="keyword" content="Sarti.gr Backend">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>Sarti.gr Backend</title>

        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/bootstrap-theme.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="login-form">
                <h1><?php echo lang('login_heading'); ?></h1>
                <p><?php echo lang('login_subheading'); ?></p>

                <div id="infoMessage"><?php echo $message; ?></div>

                <?php echo form_open("backend/auth/login"); ?>

                <p>
                    <?php echo lang('login_identity_label', 'identity'); ?>
                    <?php echo form_input($identity); ?>
                </p>

                <p>
                    <?php echo lang('login_password_label', 'password'); ?>
                    <?php echo form_input($password); ?>
                </p>

                <p><?php echo form_submit('submit', lang('login_submit_btn')); ?></p>

                <?php echo form_close(); ?>
            </div>
        </div>
    </body>
    <style>
        h1 {
            text-align: center;
        }
        input {
            display: block;
            margin: 0 auto;
        }
        .login-form p {
            color: #0092d2;
        }
        input[type='submit'] {
            border: none;
            background-color: #0092d2;
            color: #fff;
            padding: 10px 30px;
        }
    </style>
</html>