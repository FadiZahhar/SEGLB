﻿<!DOCTYPE html>
<html>
	<head>
		<title>Page not found</title>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<script type="text/javascript" src="example/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="freewall.js"></script>
		
		<style type="text/css">
			body {
				height: 100%;
				overflow: hidden;
			}
			.layout {
				width: 620px;
				margin: auto;
			}

			.cell {
				width: 320px;
			}

		</style>
	</head>
	<body>
		<div class="layout">
			<h1> Page not found </h1>
			<h3>Sorry the page you requested may have been moved or deleted.</h3>
			<div id="freewall" class="free-wall"></div>
		</div>	
		
		
		<script type="text/javascript">
			var temp = "<div class='cell' style='width:{width}px; height: {height}px; background-color: {color}'><div class='cover'></div></div>";
			var colour = [
				"#DAA520",
				"#CD950C",
				"#EEB422",
				"#CD9B1D"
			];

			var w = 1, h = 1, html = '', color = '', limitItem = 244;
			for (var i = 0; i < limitItem; ++i) {
				h = 1 + 3 * Math.random() << 0;
				w = 1 + 3 * Math.random() << 0;
				color = colour[colour.length * Math.random() << 0];
				html += temp.replace(/\{height\}/g, h*15).replace(/\{width\}/g, w*15).replace("{color}", color);
			}
			$("#freewall").html(html);
			
			var wall = new Freewall("#freewall");
			wall.reset({
				selector: '.cell',
				animate: true,
				delay: 20,
				cellW: 15.5,
				cellH: 15,
				gutterX: 2,
				gutterY: 2,
				onBlockActive: function(block, setting) {
					// check for showing brick;
					if (block != null) {
						$(this).css({
							top: 3000,
							left: block.left
						});
					} else {
						$(this).css({
							opacity: 0
						});
					}
				},
				onComplete: function(item, setting) {
					console.log(wall);
					console.log(setting);
				}
			});

			wall.setHoles([
				// 4
				{
					top: 6,
					left: 6,
					width: 2,
					height: 8
				},
				{
					top: 14,
					left: 6,
					width: 8,
					height: 2
				},
				{
					top: 12,
					left: 10,
					width: 2,
					height: 6
				}
			]);

			// 0
			wall.appendHoles([
				{
					top: 6,
					left: 16,
					width: 8,
					height: 2
				},
				{
					top: 8,
					left: 16,
					width: 2,
					height: 8
				},
				{
					top: 8,
					left: 22,
					width: 2,
					height: 8
				},
				{
					top: 16,
					left: 16,
					width: 8,
					height: 2
				}
			]);

			// 4
			wall.appendHoles([
				{
					top: 6,
					left: 26,
					width: 2,
					height: 8
				},
				{
					top: 14,
					left: 26,
					width: 8,
					height: 2
				},
				{
					top: 12,
					left: 30,
					width: 2,
					height: 6
				}
			]);

			wall.fitWidth();
			
		</script>
	</body>
</html>