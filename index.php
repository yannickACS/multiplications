
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Multiplications</title>
	<link href="https://fonts.googleapis.com/css?family=Crete+Round:400i|Exo+2" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="main--fixedHeader">
	<header class="main-headerBox">
		<p class="HeaderBox-imgBox"><img src="media/img/graduate-cap.svg" alt="icone école" class="HeaderBox-imgElt"></p>
		<h1 class="HeaderBox-titleElt">T<span class="lightGreenText">A</span>BLES DE MULTIPLIC<span class="lightGreenText">A</span>TIONS</h1>		
	</header>
	<nav class="main-navigationBox">
		<ul class="NavigationBox-listElt">
		    <li class="ListElt-dotElt"><a class="DotElt-linkElt" href="index.php">Home</a></li>
		    <li class="ListElt-dotElt"><a class="DotElt-linkElt" href="#singleTable">Table de 3</a></li>
		    <li class="ListElt-dotElt"><a class="DotElt-linkElt" href="#multiTables">Afficher des tables</a></li>
		    <li class="ListElt-dotElt"><a class="DotElt-linkElt" href="#oneTable">Afficher une table</a></li>
		    <li class="ListElt-dotElt"><a class="DotElt-linkElt" href="#revision">Réviser une table</a></li>
		    <li class="ListElt-dotElt"><a class="DotElt-linkElt" href="#superRevision">Mode super-révision</a></li>
		</ul>
	</nav>
	</div>

	<section class="main-infoBox">
		<article class="InfoBox-articleBox">
			<h2 class="ArticleBox-titleElt">Bienvenue sur ce site de révision des tables de multiplication</h2>
		</article>
	</section>
	<section class="main-aloneTableBox" id="singleTable">		
			<h5 class="AloneTableBox-titleElt mainArticle-title">La table de 3</h5>
		<article class="AloneTableBox-articleBox">
			<table class="ArticleBox-tableElt">
				<thead>
					<tr>
						<th>Table de 3</th>
					</tr>
				</thead>
				<?php 
				for ($i=0; $i <= 12; $i++) { 
					echo "<tr><td>3 * " . $i . "</td><td> " . 3*$i . "</td></tr>";
				}
				?>
			</table>
		</article>
	</section>
	<section class="main-multiTableBox" id="multiTables">
		<h5 class="mainArticle-title">Tables à afficher</h5>
		<div class="MultiTableBox-layoutBox">
			
			<article class="MultiTableBox-headMenuBox">
				<form action="index.php#multiTables" method="post" class="HeadMenuBox-formBox">
					<fieldset class="FormBox-fieldsetElt">
						<?php
						for ( $i = 1; $i <= 10; $i++ ) {
							echo '<p class="FieldsetElt-inputBox"><input class="InputBox-inputElt" type="checkbox" id="table'. $i . '" name="multiplicateur[]" value="' . $i . '">';
							echo '<label class="InputBox-labelElt" for="table'. $i . '">Table de ' . $i . '</label></p>';
						}
						?>
		    			<p class="FieldsetElt-inputBox"><input class="InputBox-submitElt" type="submit" name="submit"></p>
	    			</fieldset>
				</form>
			</article>
			
			
			<?php
			if ((!empty($_POST['multiplicateur'])) && ( isset($_POST['multiplicateur']))) {
				?>
				<article class="MultiTableBox-resultBox">
					<?php
				// var_dump($_POST['multiplicateur']);
				foreach ($_POST['multiplicateur'] as $value) {
					?>
					<table class="ArticleBox-tableElt">
						<thead>
							<tr>
								<th>Table de <?php echo $value ?></th>
							</tr>
						</thead>
					<?php 
					for ($i=0; $i <= 12; $i++) { 
						echo "<tr><td>" . $value . " * " . $i . "</td><td> " . $value*$i . "</td></tr>";
					}
					echo '</table>';
				}
			} else {

			?>	
				<article class="MultiTableBox ResultBox--init">
					<p class="ResultBox-imgBox"><img src="media/img/left-arrow-key.svg" alt="icone flèche gauche" class="ImgBox-imgELt"></p>
					<h5 class="mainArticle-title--variantOne">Choisir les tables à afficher</h5>
			<?php } ?>				
				</article>
		</div>
	</section>
	<section class="main-singleTableBox" id="oneTable">
		<h5 class="mainArticle-title">Sélectionner une table a afficher</h5>
		<article class="SingleTableBox-selectBox">
			<form class="SelectBox-formElt" action="index.php#oneTable" method="post">
				<select name="choixTable" class="FormElt-selectElt">
					<?php
					for ( $i = 1 ; $i < 13 ; $i++ ) { 
						echo '<option value="' . $i . '">Table de ' . $i . '</option>';
					}					
					?> 
				</select>
				<input type="submit" name="valid" class="FormElt-submitElt">
			</form>
		</article>
		<?php 
		if ((isset($_POST['choixTable'])) && (!empty($_POST['choixTable']))) {
		?>
		<article class="SingleTableBox-singleTableLayout AloneTableBox-articleBox">
			<table class="ArticleBox-tableElt">
				<thead>
					<tr>
						<?php echo '<th>Table de   ' . $_POST['choixTable'] . '</th>';?>
					</tr>
				</thead>
				<?php 
				for ($i=1; $i <= 12; $i++) { 
					echo "<tr><td>" . $_POST['choixTable'] . " * " . $i . "</td><td> " . $_POST['choixTable'] * $i . "</td></tr>";
				}
				?>
			</table>
		</article>
		<?php
	}
	?>
	</section>
	<section class="main-revisionBox" id="revision">
		<h5 class="mainArticle-title"><span class="lightGreenText"></span>R<span class="lightGreenText">é</span>v<span class="lightGreenText">i</span>s<span class="lightGreenText">i</span>o<span class="lightGreenText">n</span></h5>
		<article class="RevisionBox-firstFormBox">
			<p>Choisissez une table à réviser</p>
			<form class="FirstFormBox-formElt" action="" method="post">
				<p>Entrez votre choix : <input type="number" name="tableAReviser" min="1" max="12"></p>
				<p class="FirstFormBox-submitBox"><input class="FormElt-submitElt" type="submit" name="valider"></p>
			</form>
		</article>
		<article class="RevisionBox-secondFormBox">
			<?php
			if (((!empty($_POST['tableAReviser'])) && (isset($_POST['tableAReviser'])))){
				$randomNumber = random_int(1, 12);
				$expectedResult = $randomNumber * $_POST['tableAReviser'];
				?>
				<form class="SecondFormBox-formElt" action="index.php#revision" method="post">
					<p class="FormElt-paraBox">Combien font : <?php echo $_POST['tableAReviser']; ?> * <?php echo $randomNumber; ?> = 
						
						<input type="text" name="answerRevision">
						<input name="expectedResult" type="hidden" value=<?php echo $expectedResult; ?>>
						<input class="FormElt-submitElt" type="submit" name="validRevision">
					</p>
				</form>
				
				<?php
			}
			if ((isset($_POST['answerRevision'])) && (!empty($_POST['answerRevision']))){			
				if ( (int) $_POST['answerRevision'] == $_POST['expectedResult'] ) {
					echo '<p>Bonne réponse il fallait trouver : ' . $_POST['expectedResult'] . '</p>';
				} else {
					echo '<p>Mauvaise réponse le résultat était : ' . $_POST['expectedResult'] . '</p>';
				}
			}
			
			?>
 		</article>
	</section>
	<section class="main-superRevisionBox" id="superRevision">
		<h5 class="mainArticle-title">Bienvenue dans le mode Super-révision</h5>
		<p class="SuperRevisionBox-infoElt">Voilà 5 questions auquelles vous devez répondre, vous avez 2 points par bonne réponse</p>
		<article class="SuperRevisionBox-questionsBox">
			<?php
			if ((!isset($_POST['submit5Questions'])) && (empty($_POST['submit5Questions']))){
			?>		
				<form action="index.php#superRevision" method="post" class="QuestionBox-formElt">
					<?php
					for ($i=0; $i < 5; $i++) { 
						$randomUnDouze = random_int(1, 12);
						$multiplicator = random_int(1, 12);
						echo '<p class="FormElt-questionBox">Combien font : ' . $randomUnDouze . '*' . $multiplicator . ' ? <input class="QuestionBox-inputElt" type="text" name="question' . $i . '"></p>';
						echo '<input type="hidden" name="base' . $i . '" value="' . $randomUnDouze . '">';
						echo '<input type="hidden" name="multiplicator' . $i . '" value="' . $multiplicator . '">';
						
						echo '<input type="hidden" name="reponse' . $i . '" value="' . $randomUnDouze * $multiplicator . '">';
						
					}
					echo '<input type="hidden" name="formQuestions" value="ok">';
					echo '<p class="FormElt-submitBox"><input class="FormElt-submitElt" type="submit" value="VALIDER" name="submit5Questions"></p>'; 
					?>
				</form>
				<?php
			}	
			if (isset($_POST['submit5Questions'])) {
				?>
				<article class="SuperRevisionBox-answersBox">
					<?php
					
					$noteTotal = 0;
					for ($i=0; $i < 5; $i++) { 

						echo '<p class="AnswerBox--questionBox">Pour ' . $_POST["base" . $i] . ' * ' . $_POST["multiplicator" . $i] . ' vous avez répondu : ' . $_POST["question" . $i] . '</p>';
						if (((int)$_POST['question' . $i]) == $_POST['reponse' . $i]){
							echo '<p class="AnswerBox--goodAnswer">Bonne réponse</p>';
							$noteTotal += 2;
						} else {
							echo '<p class="AnswerBox--wrongAnswer">Mauvaise réponse, la réponse était : ' . $_POST['reponse' . $i] . '</p>';
						}
					}
					echo '<p>Votre note : <strong><span class="resultColor">' . $noteTotal . '/10</span></strong></p>';
			}
			?>
			</article>
		</article>
	</section>
	<footer>
		<p>K.Y. Promotion VCB 2018</p>
	</footer>
</body>
</html>