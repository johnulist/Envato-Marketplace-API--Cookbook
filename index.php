<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<title>Envato Marketplace API Cookbook</title>

	<!-- css -->
	<link rel="stylesheet" href="css/hominis.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- end css -->

</head>
<body>

<div class="wrap">
	<header class="inner">
		<h1>Cookbook</h1>
		<h2>For the Envato Marketplace API</h2>
	</header>
</div>

<div role="main" class="inner">
	<article>
		<header>
			<h2>Retrieve Popular Files</h2>
			<ul>
				<li>
				<strong>URL: </strong><code>http://marketplace.envato.com/api/edge/popular:MARKETPLACE_NAME.json</code></li>
				<li><strong>PARAMETERS: </strong> Marketplace Name</li>
			</ul>

			<p>The "popular" API call can be used to track the most popular authors from last month, and the top performing items from either the previous week, or the previous three months.</p>
		</header>


		<ul class="nav">
			<!-- http://gist.github.com/raw/:gist_id/:filename -->
			<li>
				<h4>
					<a href="http://gist.github.com/raw/1556627/php-method.php" data-demo="examples/pop-files/pop-files.php">PHP</a>
				</h4>
			</li>
			
			<li>
				<h4>
					<a href="http://gist.github.com/raw/1556627/jquery-method.js" data-demo="examples/pop-files/pop-files.html">jQuery</a>
				</h4>
			</li>
		</ul>

		<ul class="snippets">
			<script type="cookbook/snippets" id="template">
				<li class="{{language}}">
					<pre class="prettyprint">{{code}}</pre>
					<div class="discuss">
						<a class="demo" href="{{demoLink}}" target="_blank">View Demo</a>
						Discuss this snippet <a href="https://gist.github.com/{{gistID}}">on GitHub</a>
					</div>
				</li>
			</script>
		</ul>

	</article>	
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<!-- js -->
<script src="highlighter/prettify.js"></script>
<script src="js/scripts.js"></script>
<!-- end js -->

<script src="http://localhost:35729/livereload.js"></script>
</body>
</html>