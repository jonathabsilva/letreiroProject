

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
        <h2>Login</h2>
        <script>
            firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
            // User is signed in.
            var displayName = user.displayName;
            var email = user.email;
            var emailVerified = user.emailVerified;
            var photoURL = user.photoURL;
            var isAnonymous = user.isAnonymous;
            var uid = user.uid;
            var providerData = user.providerData;
            // ...
            } else {
                // User is signed out.
                // ...
            }
            });
    </script>
        
        <div class="col-xs-8"> 
            <form action="" method="post" class="form-group" >
                <label>Nome: </label>
                <input type="text" class="form-control" id='login'>
                <br>

                <label>Senha: </label>
                
                <input type="password" class="form-control" id='senha'>
                <br>
                
                <button id='entrar' class="btn btn-success" onclick="enviar()">Entrar</button>

            </form>

            
            <script>
            
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                // User is signed in.
                var displayName = user.displayName;
                var email = user.email;
                var emailVerified = user.emailVerified;
                var photoURL = user.photoURL;
                var isAnonymous = user.isAnonymous;
                var uid = user.uid;
                var providerData = user.providerData;
                window.location.href = "menu.php";
                // ...
            } else {
                // User is signed out.
                // ...

            
                
            }
            });
            </script>
        </div>

        <script>    
            function enviar(){

                event.preventDefault();
                var login = document.getElementById('login').value;
                var senha = document.getElementById('senha').value;
               
                
               

                firebase.auth().signInWithEmailAndPassword(login, senha).catch(function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;

                
                // ...
});
            }
        
        </script>
    </body>

</html>
