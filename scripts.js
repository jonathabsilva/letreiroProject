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

//var senha = document.getElementById('senhaAtendimento');
/* var db = firebase.database().ref('atendimento');
var objeto;
db.on('value',snap=> objeto=snap.val());
console.log(objeto); */



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
    if(!ponto){
        firebase.database().ref('atendimento/'+key).child('atendimento').set(atendimento);
    }

    if(ponto){
        alert('Todos já foram atendidos!');
    }
    
};


