<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        QR Code
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-config" content="none"/>

    <link href='//fonts.googleapis.com/css?family=Roboto:300,400,700,900' rel='stylesheet' type='text/css'>

    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(
            array('pdf.css?v=201711222'),
            array('fullBase' => true)
        );
        ?>
</head>

<body>
    <div class="term">
        <?php echo $this->fetch('content'); ?>
    </div>
</body>
</html>
