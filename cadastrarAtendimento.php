<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastrar Atendimento</title>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://www.gstatic.com/firebasejs/5.1.0/firebase.js"></script>
		
	</head>

	<body class="container" style="font-family: 'Titillium Web', sans-serif;">
       
        <h1> Cadastrar atendimento</h1>
        <div class="col-xs-8"> 
            <form action="" method="get" class="form-group" >
                <label>Nome: </label>
                <input type="text" class="form-control" id='name'>
                <br>

                <label>Prioridade: </label>
                <select class="form-control" id='prioridade'>
                    <option value='Geral' selected="selected">Geral</option>
                    <option value='Prioritário'>Priorioritário</option>
                </select>
                <br>

                <label>Serviço: </label>
                <select class="form-control" id='servico'>
                    <option value='Atendimento' selected="selected">Atendimento</option>
                    <option value='Análise de Projeto'>Análise de Projeto</option>
                    <option value='Diretor'>Diretor</option>
                </select>

                <br>
                <button id='btnSalvar' class="btn btn-success" onclick="enviar()">Salvar</button>

            </form>
        </div>

        <script>

             var config = {
                apiKey: "AIzaSyDzmvazBTdNmd49pB4YdJHpmX6dz9LfM_U",
                authDomain: "letreiro-50bf6.firebaseapp.com",
                databaseURL: "https://letreiro-50bf6.firebaseio.com",
                projectId: "letreiro-50bf6",
                storageBucket: "letreiro-50bf6.appspot.com",
                messagingSenderId: "29251166386"
                };
                firebase.initializeApp(config);

            function zerar(){
                document.getElementById('name').value = '';
                document.getElementById('prioridade').value= 'Geral';
                document.getElementById('servico').value= 'Atendimento';

            }
            
            function enviar(){
                event.preventDefault();
                var name = document.getElementById('name').value;
                var prioridade = document.getElementById('prioridade').value;
                var servico = document.getElementById('servico').value;

                var saida = 'Atendimento: ' + name + ' - ' + prioridade + ' - ' + servico;
                //alert(saida);
                console.log(saida);
                salvar(name,prioridade,servico);
                
                zerar();

                
            }

   
           
            

            function salvar(nome,prioridade,servico){
                var date = new Date();

                var data = {
                    name : nome,
                    prioridade : prioridade,
                    servico: servico,
                    entrada: (date.getHours() + ':'+ date.getMinutes()),
                    atendimento: 0
                };   
                
                firebase.database().ref('atendimento').push(data);
                
                alert("Atendimento salvo com sucesso!");
                
            }
        

        </script>


	</body>
	
</html>


