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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Grupo AALMMA');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>
				<?php echo $cakeDescription ?>:
				<?php echo $this->fetch('title'); ?>
			</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php
			echo $this->Html->charset();
			echo $this->Html->meta('icon');
			echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min', 'ie10-viewport-bug-workaround', 'theme', 'style', 'offline', 'espanol','espanol2'));
			echo $this->Html->script(array('jquery.min','bootstrap.min','offline'));
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			?>
			<script type="text/javascript">
			var basePath = "<?php echo Router::url('/'); ?>"
			</script>
		</head>
		<body>
				<header>
					<?php echo $this->element('menu'); ?>
					<div class="container">
					<?php echo $this->Session->flash(); ?>
					</div>
					<script>
    $(function(){

        var
            $online = $('.online'),
            $offline = $('.offline');

        Offline.on('confirmed-down', function () {
            $online.fadeOut(function () {
                $offline.fadeIn();
            });
						$(".btn").prop('disabled', true);
						$('.hide-offline, .btn ').on("click", function (e) {
								e.preventDefault();
						});
        });

        Offline.on('confirmed-up', function () {
            $offline.fadeOut(function () {
                $online.fadeIn();
            });

            $(".btn").prop('disabled', false);
						$('.hide-offline, .btn').unbind("click");
        });

    });
</script>
				</header>
				<?php echo $this->fetch('content'); ?>
				<br>
				<div id="msg"></div>
				<br>
		</body>
</html>
