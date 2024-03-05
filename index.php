
<?php

require_once "connection.php";

if(isset($_SESSION['userdata'])){

    header("location:dashboard.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in || Sign up from</title>
    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css stylesheet -->
    <link rel="stylesheet" href="style1.css">
    <!-- icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form class="sign-up-form" name="form1" action="insert.php" method="POST" onsubmit="return validated1()">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <div class="infield">
                    <i class="bi bi-person-circle" style="position: absolute;left: 303px;top: 10px;"></i>
                    <input name="fname" type="text" placeholder="Name" id="fname"/>
                    <label id="name_error"> Please fill up your Name!</label>



                </div>
                <div class="infield">
                    <i class="bi bi-envelope-at-fill" style="position: absolute;left: 303px;top: 10px;"></i>
                    <input type="email" placeholder="Email" name="email1" id="email1" />
                    <label id="email1_error">Please fill up your Email!</label>


                </div>
                <div class="infield">
                    <i class="bi bi-eye-slash-fill" id="togglepassword" style="position: absolute;left: 303px;top: 10px;"></i>
                    <input type="password" name="password2" id="password2" placeholder="Password" />
                    <label id="pass1_error">Please fill up your Password!</label>


                </div>
                <button value="submit" name="login" type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" class="sign-in-form" method="POST" name="form" onsubmit="return validated()">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <div class="infield">
                    <i class="bi bi-person-circle" style="position: absolute;left: 303px;top: 10px;"></i>
                    <input type="email" autocomplete="off" placeholder="Email" name="email" />
                    <label id="email_error">Please fill up your Email!</label>

                </div>
                <div class="infield">
                    <i class="bi bi-eye-slash-fill" id="togglepassword" style="position: absolute;left: 303px;top: 10px;"></i>
                    <input type="password" name="password" id="password" placeholder="Password" />
                    <label id="pass_error">Please fill up your password!</label>

                </div>
                <a href="#" class="forgot">Forgot your password?</a>
                <button type="submit" value="submit" name="sginnin">Sign In</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button>Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button>Sign Up</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>


    <!-- js code -->
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', () => {

            container.classList.toggle('right-panel-active');

            overlayBtn.classList.remove('btnscaled');
            window.requestAnimationFrame(() => {

                overlayBtn.classList.add('btnscaled')

            });

        });

        const togglepassword = document.querySelector("#togglepassword");
        const password1 = document.querySelector("#password");

        togglepassword.addEventListener("click", function() {

            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });
        
    </script>

     <!-- sgin-in-form-validation -->
    <script>
        var email = document.forms['form']['email'];
        var password = document.forms['form']['password'];

        var email_error = document.getElementById('email_error');
        var pass_error = document.getElementById('pass_error');


        email.addEventListener('textInput', email_Verify);
        password.addEventListener('textInput', pass_Verify);



        function validated() {

            if (email.value.length < 9) {
                email.style.border = "1px solid red";
                email_error.style.display = "block";
                email.focus();
                return false;
            }

            if (password.value.length < 6) {
                password.style.border = "1px solid red";
                pass_error.style.display = "block";
                password.focus();
                return false;
            }


        }

        function email_Verify() {

            if (email.value.length >= 8) {
                email.style.border = "1px solid silver";
                email_error.style.display = "none";
                return true;
            }

        }

        function pass_Verify() {

            if (password.value.length >= 5) {
                password.style.border = "1px solid silver";
                pass_error.style.display = "none";
                return true;
            }

        }
    </script>

        <!-- sgin-up-form validetion -->
    <script>
        var fname = document.forms['form1']['fname'];
        var email1 = document.forms['form1']['email1'];
        var password2 = document.forms['form1']['password2'];

        var name_error = document.getElementById('name_error');
        var email1_error = document.getElementById('email1_error');
        var pass1_error = document.getElementById('pass1_error');


        fname.addEventListener('textInput', name_Verify);
        email1.addEventListener('textInput', email1_Verify);
        password2.addEventListener('textInput', pass2_Verify);




        function validated1() {

            if (fname.value.length < 6) {

                fname.style.border = "1px solid red";
                name_error.style.display = "block";
                fname.focus();
                return false;

            }

            
            if (email1.value.length < 9) {
                email1.style.border = "1px solid red";
                email1_error.style.display = "block";
                email1.focus();
                return false;
            }

            if (password2.value.length < 6) {
                password2.style.border = "1px solid red";
                pass1_error.style.display = "block";
                password2.focus();
                return false;
            }

        }

        function name_Verify() {


            if (fname.value.length >= 5) {
                fname.style.border = "1px solid silver";
                name_error.style.display = "none";
                return true;

            }

        }

        function email1_Verify() {

            
            if (email1.value.length >= 8) {
                email1.style.border = "1px solid silver";
                email1_error.style.display = "none";
                return true;
            }

        }

        function pass2_Verify(){

            
            if (password2.value.length >= 5) {
                password2.style.border = "1px solid silver";
                pass1_error.style.display = "none";
                return true;
            }


        }

    </script>


</body>

</html>