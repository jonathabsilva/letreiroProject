<!DOCTYPE HTML>
<html lang="pt-br">
	<head onload="inicialize()">
		<meta charset="UTF-8">

		<title>Index</title>

		<script language='Javascript'>
		
        </script>
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	</head>

	<body>
        
        
        <div class="balao verde">

            <h2>GUICHÊ 1 <br><span id='guiche1'></span><br></h2>
            <br>
            <span id='servico1'></span>
        </div>

        <div class="balao laranja">

                <h2>GUICHÊ 2 <br><span id='guiche2'></span> </h2>
                <br>
                <span id='servico2'></span>
        </div>

        <div class="balao verde">

                <h2>GUICHÊ 3<br><span id='guiche3'></span></h2>
                <br>
                <span id='servico3'></span>
        </div>

        <script src="https://www.gstatic.com/firebasejs/5.1.0/firebase.js"></script>


        <script>
            // Initialize Firebase
                var config = {
                    apiKey: "AIzaSyDzmvazBTdNmd49pB4YdJHpmX6dz9LfM_U",
                    authDomain: "letreiro-50bf6.firebaseapp.com",
                    databaseURL: "https://letreiro-50bf6.firebaseio.com",
                    projectId: "letreiro-50bf6",
                    storageBucket: "letreiro-50bf6.appspot.com",
                    messagingSenderId: "29251166386"
                };
                firebase.initializeApp(config);
                
                // ADICIONA O USUÁRIO A SER ATENDIDO
                var guiche1 = document.getElementById('guiche1');
                var guiche2 = document.getElementById('guiche2');
                var guiche3 = document.getElementById('guiche3');
                
                var db = firebase.database().ref('guiche1/nome');
                db.on('value',snap=> guiche1.innerText=snap.val());

                var db = firebase.database().ref('guiche2/nome');
                db.on('value',snap=> guiche2.innerText=snap.val());
                
                var db = firebase.database().ref('guiche3/nome');
                db.on('value',snap=> guiche3.innerText=snap.val());

                // ADICIONA O TIPO DE ATENDIMENTO 
                var servico1 = document.getElementById('servico1');
                var servico2 = document.getElementById('servico2');
                var servico3 = document.getElementById('servico3');
                
                var db = firebase.database().ref('guiche1/servico');
                db.on('value',snap=> servico1.innerText=snap.val());

                var db = firebase.database().ref('guiche2/servico');
                db.on('value',snap=> servico2.innerText=snap.val());
                
                var db = firebase.database().ref('guiche3/servico');
                db.on('value',snap=> servico3.innerText=snap.val());


                function proximo(local){

                    var date = new Date;
                    var ponto = true;
                    var atendimento =  (date.getHours() + ':'+ date.getMinutes());
                    var key;

                    firebase.database().ref('atendimento').on('value',function(snapshot){
                        snapshot.forEach(function (item){       

                            if((item.child('atendimento').val() ==0) && ponto===true){
                                
                                var data = {
                                    nome : item.child('name').val(),
                                    prioridade : item.child('prioridade').val(),
                                    servico: item.child('servico').val(),
                                    entrada: item.child('entrada').val(),
                                    atendimento: (date.getHours() + ':'+ date.getMinutes())
                                };
                            //  firebase.database().ref(local).push(data);
                            firebase.database().ref(local).child('nome').set(data['nome']);
                            firebase.database().ref(local).child('prioridade').set(data['prioridade']);
                            firebase.database().ref(local).child('servico').set(data['servico']);
                            firebase.database().ref(local).child('entrada').set(data['entrada']); 
                            firebase.database().ref(local).child('atendimento').set(data['atendimento']);
                            
                            atendimento = data['atendimento'];
                            key = item.key;
                            console.log(item.key);
                            ponto = false;
                            }
                        });

                    });

                    firebase.database().ref('atendimento/'+key).child('atendimento').set(atendimento);
                };

        
        
        </script>

	</body>
	
</html>


