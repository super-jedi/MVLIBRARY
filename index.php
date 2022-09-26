<html>
    <head>
        <meta charset = " UTF - 8 ">
        <meta http - equiv = " X - UA - Compatible " content = " IE = edge ">
        <meta name = " viewport " content = " width - device - width , initial - scale = 1.0 ">
        <title > MOVLIB </title>
        <!-- <link rel="stylesheet" href="indexstyle.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

        <style >
            body {
                display : flex ;
                justify-content : center ;
                align-items : center ;
                height: 100vh ;
                width: 100vw ;
                margin: 0px ;
            }
            h1,h3{
                display : flex ;
                justify-content:center  ;
                align-items : center ;
                
                margin: 0px ;
                /* padding-left: 50%; */
            }
        </style >

        
    </head>

    <body>

        <div class ="mb-5">
            <h1> MOVIE LIBRARY </h1>
            <h3 class ="mb-3"> SIGN IN </h3 >
            <input type = "text" placeholder = "Username" id = "userInp" class = "form-control mb-3">
            <input type = "password" placeholder = "Password" id = "passInp" class = "form-control mb-3">
            <div class = "custom-control custom-switch">
                <input type = "checkbox" class = "custom-control-input" id = "customSwitch1" >
                <label class = "custom-control-label" for = "customSwitch1"> Keep me Logged In </label>
            </div >
            <button type = "text" id = "sub_btn" class = "btn w-100 btn-outline-primary mb-3" > Sign In </button >
            <a href="signup.html" class="badge badge-secondary py-1 w-100"> Create a new Account</a>
        </div >   






        <!-- <script src="indexscript.js"></script> -->
       
        <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
           
            const firebaseConfig = {
              apiKey: "AIzaSyAIiFqHJn7pw2iwyBt8hUYtbql8CHCVx5Y",
              authDomain: "mvlib-13531.firebaseapp.com",
              databaseURL: "https://mvlib-13531-default-rtdb.firebaseio.com",
              projectId: "mvlib-13531",
              storageBucket: "mvlib-13531.appspot.com",
              messagingSenderId: "24165454045",
              appId: "1:24165454045:web:75fb4dc167563e49a3cb34",
              measurementId: "G-7DNKDMBDKP"
            };
          
            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            
            import{getDatabase, ref, set, child, get}
            from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js"

            const db=getDatabase();




            //varreferences
            const name = document.getElementById('nameInp');
            const email =document.getElementById('emailInp'); 
            const username = document.getElementById ('userInp');
            const pass =document.getElementById('passInp'); 
            const submit = document.getElementById('sub_btn');  


            function AuthUser(){
                const dbref = ref(db);

                get(child(dbref, "UsersList/"+ username.value)).then((snapshot)=>{
                    if(snapshot.exists()){
                        let dbpass = snapshot.val().password;
                        if(dbpass == pass.value){
                            login(snapshot.val());
                        }
                        else{
                            alert("User does not exist")
                        }
                        
                    }

                    else{
                        alert("Username or Password is incorrect")
                    }
                    
                    

                           
                     
                });                
            }

            function login(user){

                let keepLoggedIn = document.getElementById('customSwitch1').checked;

                if(!keepLoggedIn){
                    sessionStorage.setItem('user',JSON.stringify(user));
                    window.location="home.html";

                }


                else{
                    localStorage.setItem('keepLoggedIn','yes');
                    localStorage.setItem('user',JSON.stringify(user));
                    window.location="home.html";
                }
                
            }


            submit.addEventListener('click', AuthUser);
        </script>
    </body>
</html>