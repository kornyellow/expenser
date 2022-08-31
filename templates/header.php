<?php

namespace templates;

use libraries\korn\client\KornHeader;

?>

<!DOCTYPE html>
<html lang="th">

<head>
	<!-- Metas -->
	<meta charset="utf-8">

	<meta http-equiv="Content-Security-Policy" content="
		default-src 'self' 'unsafe-inline' cdn.jsdelivr.net ka-f.fontawesome.com;
		script-src 'self' 'unsafe-inline' cdn.jsdelivr.net kit.fontawesome.com;
		img-src 'self' data: w3.org/svg/2000;
		frame-src youtube.com www.youtube.com;
	">

	<title><?php echo KornHeader::getTitle() ?></title>

	<meta name="title" content="<?php echo KornHeader::getTitle() ?>">
	<meta name="author" content="<?php echo KornHeader::getAuthor() ?>">
	<meta name="owner" content="<?php echo KornHeader::getOwner() ?>">
	<meta name="description" content="<?php echo KornHeader::getDescription() ?>">
	<meta name="abstract" content="<?php echo KornHeader::getAbstract() ?>">
	<meta name="keywords" content="<?php echo KornHeader::getKeywords() ?>">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous" defer async></script>

	<!-- CSS -->
	<link href="/static/css/stylesheet.css" rel="stylesheet">

	<!-- Script -->
	<script src="/static/js/script.js" defer async></script>

	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/7a2f4548b7.js" crossorigin="anonymous"></script>

	<!-- Favicon -->
	<link rel="icon" sizes="any" href="/static/favicons/favicon.ico">
	<link rel="shortcut icon" href="/static/favicons/favicon.ico">

	<!-- Canonical -->
	<link rel="canonical" href="https://expenser.kornyellow.com/<?php echo KornHeader::getCanonical() ?>">
</head>

<body>

<script>0</script>

<main>
	<article>
