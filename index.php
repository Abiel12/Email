
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abiel Arthur Matias">
	<title>CADASTRO</title>
	<link rel="stylesheet" href="css/master.css">
</head>
<body>
<?php


if(isset($_POST['enviar'])){
	$from = "abielmatiasbr@gmail.com";
	$email = $_POST['email'];
	$registro = fopen("registros.txt","a+");
	if(!$registro){
		die("erro ao registrar");
	}
	$nome = $_POST['nome'];
	$celular = $_POST['celular'];


	fwrite($registro,"$nome-$email-$celular\n");
	fclose($registro);


	
	$to_email = $email;
	$subject = "Email de Cadastro + bônus";
	$body = "Olá, seu registro foi efetuado com sucesso. Click no link para acessar o material extra https://drive.google.com/file/d/1TOHA6KBRiUp83p0I_SuSdS7yICfX3EvX/view?usp=sharing";
	$headers = "From: $from";
	if (mail($to_email, $subject, $body, $headers)) {
	echo "Email enviado com sucesso para $to_email.";
	}	 else {
	echo "Falha no envio do email.";
	}	
	header("location: index.php");
}




?>
	<div id="navezinha-vermelha"><img src="images/nav2.png" alt="outra navezinha"></div>

	<div id="navezinha"><img src="images/nav.webp" alt="navezinha"></div>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		<h1>Formulário de Registro</h1>
		<p>Faça o cadastro e receba também um PDF contendo dicas para avançar no jogo</p>
		<label for="nome">
			 
			<input required type="text"  pattern="[%@$#!a-zA-Z]+"  placeholder="Nome de jogador" class="entrada" name="nome">
		</label>
		<label for="email">
		
			<input required type="email" placeholder="Email de contato" name="email" class="entrada">	 
		</label>	   
		<label for="Celular">
			
			<input required type="text" maxlength=11 pattern="\d*" name="celular" placeholder="N. celular" class="entrada">
		</label>
	
			
	    <label for="communications">Ao marcar e clicar em enviar
		<input required type="checkbox" data-privacy="true" name="communications"  value="1">
			<input type="hidden" data-privacy="true" name="privacy_policy" value="1">Ao informar meus dados, eu concordo com a <a href="#" >Política de Privacidade & Termos de Uso</a>.
	Eu concordo em receber comunicações e ofertas personalizadas de acordo com meus interesses, Sendo possível cancelar a qualquer momento o serviço.</label>
		<input id="enviar" type="submit" name="enviar" value="enviar">
		<br>

	</form>
	<footer>
	<a href="mailto:abielmatiasbr@gmail.com">
		abielmatiasbr@gmail.com 
	</a>
	© 2021
</footer>
</body>
</html>
