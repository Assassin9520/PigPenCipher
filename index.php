<?php

if (isset($_POST['submit']) ) {
	//echo "da";

	//transform given user string to splited array
	$user_text_to_array = str_split( strtolower($_POST['text']) );

	// echo "<pre>";
	// print_r($user_text_to_array);
	// echo "</pre>";

	//building alphabet1
	//26 chars
	$alphabet1 = "abcdefghijklmnopqrstuvwxyz"; 

	$alphabet1_array = str_split($alphabet1);
	//print_r($alphabet1_array);

	//START ALGORITHM
	$final_cipher = "";
	
	//or , it was possible using foreach
	for ($i=0; $i < count($user_text_to_array) ; $i++) { 
		for ($j=0; $j < count($alphabet1_array) ; $j++) { 

			//if current character given by user found in alphabet
			if ( $user_text_to_array[$i] == $alphabet1_array[$j] ) {
				//concatenate into this string over iteration the current letter if found with  current alphabet (fixed: 1)
				$final_cipher .= addHTMLimage($alphabet1_array[$j], 1);
			} 
			// else { //nu trebuie neaparat ramura de else , altfel daca nu e pusa , pur si simplu nu afiseaza nimic
			// 	$final_cipher .= addHTMLimage("NF", "");
			// }

		}
	}/*end FOR*/

}

/*
	function that adds an HTML image to final string to be outputted

	@param String $letter the letter taken from algoritm to concatenate into HTML image
	@param String $alphabet_no the alphabet number that is currently being processed

	return HTML string form image
*/
function addHTMLimage($letter, $alphabet_no)
{
	return "<span> 
				<img src=\"assets/css/resources/" . $letter . $alphabet_no . ".png\"  alt=\"\" />
				<span style=\"display:none\"> " . $letter . "</span>
			</span>";
}

?>











<!DOCTYPE html>
<html>
<head>
	<title>Cifrul PigPen</title>

	<link href="assets/css/style.css" rel="stylesheet/css">
</head>
<body>


	<h2 class="title-main"> Algoritmul de substitutie PigPen </h2>

	<form method="POST" action="<?php echo 'http://' . $_SERVER['SERVER_NAME']. DIRECTORY_SEPARATOR . 'PigPenCipher_Anghelescu' . DIRECTORY_SEPARATOR; ?>">
		<label for="text">Inserati sirul pentru cifrare:</label>
		<input id="text" type="text" name="text" placeholder="Inserati textul de cifrare PigPen..." value="<?php if(isset($_POST['text'])){ echo $_POST['text'] ;} ?>"/>

		<input type="submit" name="submit" value="Cifrare">
	</form>


	<div>
		<p>Alfabet: </p>
		<p> alfabetul pigpen consta in cele 26 de litere si substitutia acestora cu simboluri grafice. Ce este in afara acestui domeniu , se va pune semnul intrebarii </p>
		<p> Algoritmul sare peste caracterele necunoscute , daca acestea se intalnesc in input-ul dat de utilizator.</p>
		<img src="assets/css/resources/alphabet1.png"  alt="" style="max-width:200px; " />
	</div>

	<div>
		<?php if(isset($final_cipher)): ?>
			<h2>Text Criptat : </h2>
			<?php echo $final_cipher; ?>
		<?php endif; ?>	
	</div>

</body>
</html>