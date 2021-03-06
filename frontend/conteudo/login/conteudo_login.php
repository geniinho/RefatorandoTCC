<?php
session_start();

$conn = mysqli_connect("localhost","root","", "dbtcc");


if(isset($_POST['entrar'])){

    if(empty($_POST['email']) || empty($_POST['senha'])) {
        require "conteudo/login/alert_login.php";
    }else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $email = strtolower($email);
        $senha = md5(mysqli_real_escape_string($conn, $_POST['senha']));

        $query = "SELECT email,senha from user where email = '{$email}' and senha = '{$senha}'";

        $result = mysqli_query($conn, $query);
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            $_SESSION['email'] = $email;
            echo "Olá, {$email}";
            exit();
        }
        if ($row == 0) {
            require "conteudo/login/alert_senha.php";
        }

    }

}

?>

<section class="login sb-bg-black sb-content">
    <div class="container">
        <div class="row">
        <div class="col-md-7 col-sm-12 align-self-center">
            <img src="./assets/images/back-login.jpg" alt="login" id="img-login">
        </div>
        <div class="col-md-5 col-sm-12 align-self-center mt-4 mb-4">
                <div class="card sb-card mb-3">
                    <div class="card-body">
                        <form class="pt-3" id="form_login" method="post">
                            <!-- campo de email -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    onkeyup="this.value=this.value.replace(/[' ' çÇáÁàÀéèÉÈíìÍÌóòÓÒúùÚÙñÑ~&´`^{}[º$()\']/g,'')" 
                                    type="text" 
                                    class="form-control sb-form-input" 
                                    id="login_email" 
                                    placeholder="E-mail"
                                    name="email"
                                >
                                <ion-icon name="mail-outline" id="icone_email">
                                </ion-icon>
                            </div>

                            <!-- campo de senha -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" 
                                    class="form-control sb-form-input" 
                                    id="login_senha" 
                                    placeholder="Sua senha"
                                    name="senha"
                                >
                                <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                            </div>
                            <h6 class="sb-txt-white text-justify pt-2 pb-2">
                                <a href="#" class="sb-txt-secondary text-decoration-none">
                                    Esqueci minha senha 
                                </a> 
                            </h6>
                            <button 
                                type="submit"
                                class="btn fa-btn sb-btn-secondary sb-w-700 sb-full-width mt-2"
                                name="entrar" 
                            >
                                Entrar
                            </button>
                            <h6 class="sb-txt-white text-justify pt-2 pb-2">
                                Não tem uma conta?  
                                <a href="#" class="sb-txt-secondary text-decoration-none">
                                    Registre- se
                                </a>.
                            </h6>
                            <div class="sb-grid">
                                <div class="sb-division-line"></div>
                                <h6 class="form-text sb-txt-white pt-3 pb-2">
                                    Entrar com 
                                </h6>
                                <div class="sb-division-line"></div>
                            </div>
                            <button 
                                class="btn fa-btn sb-btn-secondary sb-w-700 sb-full-width mt-1" 
                            >
                                <i class="fa fa-google"></i>
                                <span class="ml-1">Google</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>