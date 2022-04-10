<?php
$pageName = $pageName ?? "";
$pageTitle =  $pageName . ' - ' . $info['name'];
$pageDescription = $pageDescription ?? "GO1 - URL Shorten, rút gọn link";
?>

<base href="<?php echo $info['URL']; ?>/" />
<meta charset="utf-8">
<title><?php echo $pageTitle; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="author" content="GO1">
<meta name='twitter:url' content='<?php echo $info["URL"]; ?>'>
<meta name='twitter:title' content='<?php echo $pageTitle; ?>'>
<meta property="og:title" content="<?php echo $pageTitle; ?>">
<meta property="og:image" content='https://click.go1.to/img/click.go1.to.jpg'>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">

<!-- Custom CSS for the Template -->
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdn.go1.to/css/fas.v5.4.1.all.css" >-->
<link rel="icon" type="image/x-icon" href="https://click.go1.to/go1-favicon.ico">
<style>
    <?php echo $info['cstm-style']; ?>
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0VJ9Y7PBE2"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-0VJ9Y7PBE2');
</script>