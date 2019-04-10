<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Admin</title>

		<script language='Javascript'>
			
		</script>
	</head>

	<body>
        
        <h2>Atendimento:<span id='senha'></span> - Guichê 1</h2>
       
        <button onclick="proximo('guiche1')">Próximo</button>

        <br>
        <h2>Atendimento:<span id='senha'></span> - Guichê 2</h2>
        <button onclick="proximo('guiche2')">Próximo</button>

        <h2>Atendimento:<span id='senha'></span> - Guichê 3</h2>
        <button onclick="proximo('guiche3')">Próximo</button>
        
        <script src="https://www.gstatic.com/firebasejs/5.1.0/firebase.js"></script>
       <!--  <script>
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

        var senha = document.getElementById('senhaAtendimento');
        var db = firebase.database().ref().child('atendimento');
        db.on('value',snap=> senha.innerText=snap.val());
        
        function proximo(){
            var db = firebase.database().ref().child('atendimento');
            var i;
            db.on('value',snap=> i=snap.val());

            firebase.database().ref('atendimento').set(++i);
        }

        function voltar(){
            var db = firebase.database().ref().child('atendimento');
            var i;
            db.on('value',snap=> i=snap.val());

            firebase.database().ref('atendimento').set(--i);
        }
        </script> -->

        <script src="scripts.js"></script>

	</body>
	
</html>


