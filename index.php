<!DOCTYPE html>
<html>
<head>
<title>CxLabs</title>
<base href="http://<?=$_SERVER['HTTP_HOST']?>/"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/docs.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css"/>
<link rel="stylesheet" type="text/css" href="css/cxdocs.css"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<?php 
$dirs = glob('Cx*'); 
require_once 'markdown.php';
?>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" data-spy="affix">
        	<li><a href="#overview"><i class="icon-chevron-right"></i> Overview</a></li>
        	<?php foreach ( $dirs as $dir ) { ?>
          	<li><a href="#<?=$dir?>"><i class="icon-chevron-right"></i> <?=$dir?></a></li>
          <?php } // foreach ?>
        </ul>
      </div>
			<div class="span9">
				<section id="overview">
					<div class="page-header">
						<h1>CxLabs</h1>
					</div>
					<p>This is the CxLabs environment. The apps below are available from here</p>
				</section>
				<?php	foreach ( $dirs as $dir ) {
					$goToLink = in_array($dir, array('CxMediaCounter')) ? "" 
							: "<a style='float: right;' href='{$dir}'>Go to {$dir}</a>";
				?>
				<section id="<?=$dir?>">
					<div class="page-header">
						<?=$goToLink?>
						<h1><?=$dir?></h1>
					</div>
					<?php 
					if ( file_exists($dir . '/README.md') ) { 
						echo Markdown(file_get_contents($dir . '/README.md'));
						echo "<p>{$goToLink}</p>";
					}  
					?>
				</section>
				<?php } // foreach ?>
			</div>
		</div>
	</div>
</body>
</html>