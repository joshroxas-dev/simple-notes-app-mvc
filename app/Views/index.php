<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=, initial-scale=1.0">
		<style>
			* {
				font-family: sans-serif;
			}
			body {
				background-color: #2b2d2f;
			}
			h1, h2 {
				color: #fff;
			}
			.posts form {
				display: inline-block;
			}
			.delete input {
				display: inline-block;
				text-decoration: none;
				font-weight: bold;
				color: red;
				background-color: transparent;
				padding: 0;
				margin: 0;
				border: 0;
			}
			.description textarea {
				width: 240px;
				border: 0;
				background-color: transparent;
				resize: none;
				outline: none;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
				box-shadow: none;
			}
			.title {
				display: inline-block;
				font-weight: bold;
				font-size: 18px;
				margin: 0;
				margin-bottom: 20px;
				width: 90%;
			}
			.title input[type="text"] {
				outline: none;
				color: #000;
				font-size: 16px;
				font-weight: bold;
				background-color: transparent;
				border: 0;
			}
			.container {
				margin: 15px;
			}
			.posts div {
				display: inline-block;
				vertical-align: top;
				overflow: auto;
				background-color: #fdfd96;
				color: #000;
				width: 250px;
				height: 200px;
				margin: 10px 5px;
				padding: 10px;
			}
			.add {
				width: 373px;
			}
			.add form textarea {
				display: block;
				margin: 10px 0px;
				width: 100%;
			}
			.add form input {
				display: block;
				width: 100%;
			}
			.add form input[type="submit"] {
				margin: 0 auto;
				width: 100px;
			}
		</style>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script>
			$(document).ready(function() {
				$.get('/notes/index_html', function(res) {
					$('.posts').html(res);
        		});
				$('.description input[type=submit]').hide();
				$(document).on('submit', 'form', function() {
					$.post($(this).attr('action'), $(this).serialize(), function(res) {
						$('.posts').html(res);
					});
					return false;
				});
				$(document).on('dblclick', '.description textarea, .title input[type="text"]', function() {
					$(this).attr("readonly", false);
					$(this).focusout(function() {
						$(this).attr("readonly", true);
					});
				});
				$(document).on('focusout', '.description, .title', function() {
					$.post($(this).attr('action'), $(this).serialize(), function(res) {
						$('.posts').html(res);
					});
					return false;
				});
			});
		
		</script>
		<title>Document</title>
	</head>
	<body>
		<div class="container">
			<h1>Notes</h1>
			<div class="posts">
			</div>
			<div class="add">
				<form action="/notes/create" method="post">
					<h2>Add a Note</h2>
					<input type="text" name="title" placeholder="Enter note title here.">
					<textarea name="description" placeholder="Write Post Here" cols="50" rows="3"></textarea>
					<input type="submit" value="Add Note">
				</form>
			</div>
		</div>
	</body>
</html>