<?php
return array(
	'set_up'   => static function ( Test_Embed_Optimizer_Optimization_Detective $test_case ): void {
		$test_case->populate_url_metrics(
			array(
				array(
					'xpath'             => '/*[1][self::HTML]/*[2][self::BODY]/*[1][self::FIGURE]',
					'isLCP'             => true,
					'intersectionRatio' => 1,
				),
			)
		);
	},
	'buffer'   => '
		<html lang="en">
			<head>
				<meta charset="utf-8">
				<title>...</title>
			</head>
			<body>
				<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
					<div class="wp-block-embed__wrapper">
						<iframe title="Matt Mullenweg: State of the Word 2023" width="750" height="422" src="https://www.youtube.com/embed/c7M4mBVgP3Y?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</figure>
			</body>
		</html>
	',
	'expected' => '
		<html lang="en">
			<head>
				<meta charset="utf-8">
				<title>...</title>
				<link data-od-added-tag rel="preconnect" href="https://www.youtube.com">
				<link data-od-added-tag rel="preconnect" href="https://i.ytimg.com">
			</head>
			<body>
				<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
					<div class="wp-block-embed__wrapper">
						<iframe title="Matt Mullenweg: State of the Word 2023" width="750" height="422" src="https://www.youtube.com/embed/c7M4mBVgP3Y?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</figure>
			</body>
		</html>
	',
);
