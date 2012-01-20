<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<title>Envato Marketplace API Cookbook</title>

	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<!-- end css -->

</head>
<body>

<div class="wrap">
	<header class="inner">
		<h1>Envato Marketplace Cookbook</h1>
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
		</header>

		<p>The "popular" API call can be used to track the most popular authors from last month, and the top performing items from either the previous week, or the previous three months.</p>

		<h3>Examples</h3>
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

	<article>
		<header>
			<h2>Get All Items From a Collection</h2>
			<ul>
				<li>
				<strong>URL: </strong><code>http://marketplace.envato.com/api/edge/collection:COLLECTION_ID.json</code></li>
				<li><strong>PARAMETERS: </strong> Collection ID</li>
			</ul>
		</header>

		<p>All marketplaces users have the ability to <a href="http://themeforest.net/collections">create collections</a>, or bookmarks, of their favorite items. Each collection page will contain a <a href="http://themeforest.net/collections/32561-my-stores">unique ID</a> within the URL. This sequence of numbers is the <code>COLLECTION ID</code> that can be referenced in your API call. </p>

		<p>An object, which contains every item in the collection, will be returned. </p>

		<h3>Examples</h3>
		<ul class="nav">
			<!-- http://gist.github.com/raw/:gist_id/:filename -->
			<li>
				<h4>
					<a href="http://gist.github.com/raw/1649303/jquery-method.html" data-demo="examples/collection/index.html">jQuery</a>
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