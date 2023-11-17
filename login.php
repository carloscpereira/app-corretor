<?php //include ('../funcoes/corretor/conexao.php'); 
?>
<?php //include ('../funcoes/funcoes.php'); 
?>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<?php

//Não exibe alerta e notificação
//	error_reporting(1);

//Inicioaliza a sessão

// if ($_POST != NULL) {

//Obter dados do POST
// $login = pg_escape_string($_POST["usuario"]);
// $senha = pg_escape_string($_POST["senha"]);


// Cria comando SQL
//     $sql = "select idvendedor, login, vendedor, idgrupo from vendedores where login='{$login}' and password = md5(idvendedor||'{$senha}') and idgrupo in (1,5,6)";

//     $retorno = pg_query($sql);
//     $data    = pg_fetch_assoc($retorno);

//     //Obtem registro
//     if ($data != null) {

//         $nome = nome_sobrenome($data['vendedor']);

//         if (retornaLocalAcesso() == 'pc') {
//             $texpira = 43200; //12hrs
//         } else {
//             $texpira = 3600 * 24 * 30 * 12 * 5; // 5 anos
//         }

//         setcookie('logado', 'ok', time() + $texpira);
//         setcookie('idvendedor', $data['idvendedor'], time() + $texpira);
//         setcookie('idgrupo', $data['idgrupo'], time() + $texpira);
//         setcookie('nome', $nome, time() + $texpira);

//         header("Location: dashboard.php");
//     } else {

//         echo "<script> "
//             . " var tipo = 'warning';"
//             . " var mensagem = 'Usuário ou senha inválidos!';"
//             . " var alerta = true; </script>";
//     }
// }

?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $dm->assets_folder; ?>/media/photos/photo19@2x.jpg');">
    <div class="row no-gutters justify-content-center bg-primary-dark-op">
        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign In Block -->
            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                    <!-- Header -->
                    <div class="mb-2 text-center">
                        <a class="link-fx font-w700 font-size-h1" href="index.php">
                            <span class="text-dark">Corretor</span><span class="text-primary">Online</span>
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Entrar</p>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->

                    <form id="frm-login" action="javascript:void(0);" onsubmit="return false;">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="usuario" name="usuario"
                                    placeholder="Usuário">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="form-group d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-left">
                            <div class="custom-control custom-checkbox custom-control-primary">
                                <input type="checkbox" class="custom-control-input" id="login-remember-me"
                                    name="login-remember-me" checked>
                                <label class="custom-control-label" for="login-remember-me">Me lembre</label>
                            </div>
                            <div class="font-w600 font-size-sm py-1">
                                <a href="javascript:void(0)">Esqueceu a senha?</a>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-hero-primary" onclick="acessar();">
                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Acessar
                            </button>
                        </div>
                    </form>

                    <!-- END Sign In Form -->
                </div>
            </div>
            <!-- END Sign In Block -->
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $dm->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>

<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/js/plugins/jquery-validation/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/br.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>

<script>
jQuery(function() {
    Dashmix.helpers(['validation']);
});
</script>
<!-- Page JS Code -->
<script>
//moment
moment.tz.add([
    "America/Sao_Paulo|LMT BRT BRST|36.s 30 20|012121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212|-2glwR.w HdKR.w 1cc0 1e10 1bX0 Ezd0 So0 1vA0 Mn0 1BB0 ML0 1BB0 zX0 pTd0 PX0 2ep0 nz0 1C10 zX0 1C10 LX0 1C10 Mn0 H210 Rb0 1tB0 IL0 1Fd0 FX0 1EN0 FX0 1HB0 Lz0 1EN0 Lz0 1C10 IL0 1HB0 Db0 1HB0 On0 1zd0 On0 1zd0 Lz0 1zd0 Rb0 1wN0 Wn0 1tB0 Rb0 1tB0 WL0 1tB0 Rb0 1zd0 On0 1HB0 FX0 1C10 Lz0 1Ip0 HX0 1zd0 On0 1HB0 IL0 1wp0 On0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 Rb0 1zd0 Lz0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 On0 1zd0 On0 1C10 Lz0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 Rb0 1wp0 On0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 On0 1zd0 On0 1C10 Lz0 1C10 Lz0 1C10 Lz0 1C10 On0 1zd0 Rb0 1wp0 On0 1C10 Lz0 1C10 On0 1zd0",
]);

moment.tz.setDefault('America/Sao_Paulo');

jQuery('#frm-login').validate({
    ignore: [],
    errorClass: "invalid-feedback animated fadeIn",
    errorElement: "div",
    errorPlacement: function(e, r) {
        jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass(
            "is-invalid")
    },
    success: function(e) {
        jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
    },
    rules: {
        'usuario': {
            required: !0
        },
        'senha': {
            required: !0
        },
    },
    messages: {
        'usuario': {
            required: "Digite o usuário."
        },
        'senha': {
            required: "Digite sua senha.",
        }
    }
});


const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    timeout: 10000,
    headers: {
        'AppAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

async function acessar() {

    if ($('#frm-login').valid()) {

        const usuario = $('#usuario').val();
        const senha = $('#senha').val();

        try {
            const {
                data: [findUsuario]
            } = await apiCRM.get(`usuario/${usuario}/${senha}`);



            // console.log(findUsuario);
            if (findUsuario) {

                // console.log(findUsuario.nome);
                setCookie('cNome', findUsuario.nome, 12);
                setCookie('cId', findUsuario.id, 12);
                setCookie('cWhatsapp', findUsuario.whatsapp, 12);
                setCookie('cLogin', findUsuario.usuario, 12);
                setCookie('cGrupo', findUsuario.grupoid, 12);

                /**Redireciona para a página index.php passando no cookie o pessoaid */
                location.href = `index.php`;

            } else {
                Dashmix.helpers('notify', {
                    align: 'center',
                    type: 'danger',
                    icon: 'fa fa-block mr-1',
                    message: `login e senha inválidos.`
                });
            }

        } catch (error) {
            console.log(error);
        }
    }
}

function getParameter(theParameter) {
    var params = window.location.search.substr(1).split('&');

    for (var i = 0; i < params.length; i++) {
        var p = params[i].split('=');
        if (p[0] == theParameter) {
            return decodeURIComponent(p[1]);
        }
    }
    return false;
}

function setCookie(cname, cvalue, exHours) {

    let expires = "expires=" + moment().add(exHours, 'hours').format();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
</script>