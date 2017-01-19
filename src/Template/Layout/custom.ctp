<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'School System';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta(
        'favicon.ico',
        '/img/systemfiles/crack-reactor-logo.png',
        ['type' => 'icon']
    );
    ?>

    <?php
    echo $this->AlaxosHtml->includeBootstrapCSS(['block' => false]);
    echo $this->AlaxosHtml->includeBootstrapThemeCSS(['block' => false]);
    echo $this->AlaxosHtml->includeAlaxosCSS(['block' => false]);
    echo $this->Site->css('font-awesome/css/font-awesome.css');
    echo $this->Site->css('select2/dist/css/select2.min.css');
    echo $this->Html->css('custom.css');
    echo $this->Html->css('custom.min.css');
    echo $this->Html->css('print.css');


    echo $this->AlaxosHtml->includeAlaxosJQuery(['block' => false]);
    echo $this->AlaxosHtml->includeAlaxosBootstrapJS(['block' => false]);
    echo $this->Site->script('bootstrap-wizard/js/bwizard.js');
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div>


</div>

<div class="">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>

<?= $this->Element('footerLinks'); ?>
<?= $this->Element('footer'); ?>

<?= $this->Site->script('bootstrap-wizard/js/bwizard.js') ?>
<?= $this->Site->script('custom/js/fileinput.min.js') ?>
<?= $this->Site->script('select2/dist/js/select2.full.min.js') ?>
<?= $this->Html->script('app.js') ?>

<script>
    $(document).ready(function() {
        $("#wizard").bwizard();
        App.init();
        $('select').select2();

       /* $("#preview-application").click(function(){
            $.ajax({
                type: "GET",
                url: "applicants/view",
                dataType: 'html',
                success: function(data,status){
                    console.log(status);
                    $("#app-preview").html(data).show();
                    $("#myModal").modal()
                }
            });
        })*/
    });
</script>
</body>
</html>
