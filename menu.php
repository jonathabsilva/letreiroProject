

<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.3/firebase.js"></script>
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
        </script>
    </head>

    <body>  
        <h2>Menu</h2>
        <button onclick="alert('oi')" class="btn btn-success">Cadastrar atentimento</button>
        
        <span> </span><a href="admin.php" class="btn btn-success">Acesso Administrador</a>
        <span> </span><a href="index.php" class="btn btn-success">Acessar Letreiro</a>
        
        <button id='sair' class="btn btn-danger" onclick="sair()">Sair</button>

        <script>
            function sair(){

                firebase.auth().signOut().then(function() {
                    alert("Logout realizado com sucesso!");
                    window.location.href = "index.php";
                }).catch(function(error) {
                    // An error happened.
                });
            }
        </script>
    </body>

</html>
