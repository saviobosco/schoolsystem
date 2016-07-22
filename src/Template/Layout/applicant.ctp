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

$cakeDescription = 'CakePHP: the rapid development php framework';
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
    <?= $this->Html->meta('icon') ?>

    <?php
    echo $this->AlaxosHtml->includeBootstrapCSS(['block' => false]);
    //echo $this->AlaxosHtml->includeBootstrapThemeCSS(['block' => false]);
    echo $this->AlaxosHtml->includeAlaxosCSS(['block' => false]);
    echo $this->Html->css('custom.css');
    echo $this->Site->css('bootstrap-wizard/css/bwizard.min.css');

    echo $this->AlaxosHtml->includeAlaxosJQuery(['block' => false]);
    echo $this->AlaxosHtml->includeAlaxosBootstrapJS(['block' => false]);
    echo $this->Site->script('bootstrap-wizard/js/bwizard.js');
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<?= $this->Element('Applicant_Header'); ?>
<div class="container clearfix">
    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
<?= $this->Site->script('custom/js/fileinput.min.js') ?>
<script>
    $(document).ready(function() {
        $("#wizard").bwizard();

        $("#preview-application").click(function(){
            $.ajax({
                type: "GET",
                url: "http://afikposchool.dev/applicants/view",
                dataType: 'html',
                success: function(data,status){
                    console.log(status);
                    $("#app-preview").html(data).show();
                    $("#myModal").modal()
                }
            });
        })
    });
</script>
</body>
</html>
