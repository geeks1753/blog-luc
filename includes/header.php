<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Luc investigation journaliste catastrophe naturelle incendie inondation seisme tremblement de terre tornade feu ">
	<link rel="stylesheet" href="../css/style.css" />
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="../css/wbbtheme.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="../jquery.wysibb.js"></script>
	<script src="../fr.js"></script>
	<script>
		$(function() {
			var wbbOpt = {
				buttons: "bold,italic,underline,|,fontfamily,fontsize,fontcolor,quote,|,img,link,|,code",

				lang: "fr"
			}
			$("#wysibb").wysibb(wbbOpt);
		})
	</script>
	<title><?= $titre ?? "luc investigation" ?></title>
</head>

<body>