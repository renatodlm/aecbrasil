<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package estudio86
 */


setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$url = get_home_url();
if (empty($_POST['cpf']))
   wp_redirect($url);
get_header();


$today = date("d/m/Y");
$i = 0;
$database = aec_get_associados_database();
$result = [];
$cpf = $_POST['cpf'];
$cpf = preg_replace('/\D/', '', $cpf);
foreach ($database as $item)
{
   if ($cpf === $item[4] && !in_array('Cancelado', $item) && in_array('Ativo', $item))
   {
      $result = $item;
      break;
   }
}

$titular = [];

if (in_array('Dependente', $result))
{
   foreach ($database as $item)
   {
      if ($result[1] === $item[1] && in_array('Titular', $item))
      {
         $titular = $item;
         break;
      }
   }
}

$nome = ($result[2]);
$client_cpf = ($result[4]);
$vigencia = ($result[5]);
$codigo = ($result[1]);
$nascimento = ($result[3]);

$titular_cpf = count($titular) > 0 ? $titular[4] : '';
$titular_nome = count($titular) > 0 ?  $titular[2] : '';

$email = 'declaracaoonlineweb@gmail.com';
$title = 'Declaração AEC - ' . $nome;

ob_start();
?>

<body>
   <h1>Foi emitido uma declação por:</h1>
   <table cellpadding="0" cellspacing="0" width="640" border="0">
      <tr>
         <td>
            <table cellpadding="0" cellspacing="0" width="640" align="left" border="1">
               <tr style="padding: 5px;">
                  <td style="padding-left:5px;padding-right:5px;">Nome:</td>
                  <td style="padding-left:5px;padding-right:5px;"><?php echo $nome ?></td>
               </tr>
               <tr style="padding: 5px;">
                  <td style="padding-left:5px;padding-right:5px;">CPF:</td>
                  <td style="padding-left:5px;padding-right:5px;"><?php echo $client_cpf ?></td>
               </tr>
               <tr style="padding: 5px;">
                  <td style="padding-left:5px;padding-right:5px;">Código:</td>
                  <td style="padding-left:5px;padding-right:5px;"><?php echo $codigo ?></td>
               </tr>
               <tr style="padding: 5px;">
                  <td style="padding-left:5px;padding-right:5px;">Vigencia:</td>
                  <td style="padding-left:5px;padding-right:5px;"><?php echo $vigencia ?></td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
</body>
<?php
$content = ob_get_clean();

wp_mail($email, $title, $content);


if (count($result) > 0 && !empty($cpf))
{
?>
   <style>
      body {
         background-color: #eee !important;
      }
   </style>
   <div class="topo-interna" class="parallax-window" data-parallax="scroll" data-position="center top" data-image-src="<?php the_post_thumbnail_url('topo-interna'); ?>">
      <div class="container d-flex">
         <div class="conteudo d-flex align-items-center justify-content-between w-100">
            <div class="titulo-topo">
               <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
            <a class="text-white" href="<?php echo get_home_url(); ?>"><button class="btn btn-voltar">Voltar</button></a>
         </div>
      </div>
      <div class="overlay"></div>
   </div>
   <section class="pb-0">
      <div class="container text-center">
         <input class="btn-enviar" type='button' id='btn' value='IMPRIMIR' onclick='printDiv();'>
      </div>
   </section>
   <section>
      <div id="declaracao" class="declaracao">
         <div class="container py-5">
            <div class="row justify-content-center">
               <div class="col-lg-11">
                  <div class="row d-flex align-items-between height-set">
                     <div class="col-12">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-3 py-5">
                                 <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/imgs/logo-interna.png" alt="aec">
                              </div>
                              <div class="col-12 text-center py-5">
                                 <strong>
                                    <h3>DECLARAÇÃO</h3>
                                 </strong>
                                 <?php


                                 $is_titular = count($titular) > 0 ? ', cadastrado (a) como dependente do (a) titular <strong>' . $titular_nome . '</strong>, CPF: <strong>' . $titular_cpf . '</strong> é' : ' é cadastrado (a) como titular';

                                 ?>
                                 <p style="text-align: justify;">
                                    <strong><?php echo $result[0] ?></strong>, pessoa jurídica de direito privado, inscrita no CNPJ sob
                                    o nº 08. 901. 000/ 0001- 74, declara para os devidos fins que o (a) <strong><?php echo $nome ?></strong>, CPF: <strong><?php echo $client_cpf; ?></strong>, data nascimento
                                    <strong><?php echo $nascimento; ?></strong><?php echo $is_titular ?> associado
                                    (a) da <strong>AECBRASIL</strong>, inscrito na categoria sócio/contribuinte – Inscrição <strong><?php echo $codigo; ?></strong> desde <strong><?php echo $vigencia ?>.</strong>
                                 </p>
                              </div>
                              <div class="text-right">

                                 Foz do Iguaçu, <strong><?php echo $today; ?></strong>
                              </div>
                           </div>
                        </div>
                        <div class="col-12" style="margin-top: 150px;">
                           <div class="container">
                              <div class="row">
                                 <div class="col-12 text-center">
                                    <div class="mx-auto" style="max-width: 500px;margin-bottom:100px">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-12">
                                             <img class="img-fluid" style="width: 110px;height:85px!important;" src="<?php echo get_template_directory_uri(); ?>/imgs/assinatura.png" alt="assinatura">
                                          </div>
                                          <div class="col-3">
                                             <img style="width: 100px;" src="<?php echo home_url() ?>/wp-content/uploads/2021/04/favicon.png" alt="">
                                          </div>
                                          <div class="col-9 text-left">
                                             Documento assinado de forma eletrônica por<br>
                                             <strong>EDERALDO APARECIDO MAGALHAES</strong><br>
                                             Data: <?php echo date("d/m/Y") ?> – <?php echo date("H:i:s") ?> - 0300
                                          </div>
                                          <div class="col-12 mt-3">
                                             <strong>Associação dos Empregados no Comercio</strong>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 py-5 mt-5">
                                    AEC BRASIL - CNPJ: 08.901.000/0001-74<br>
                                    Rua Jorge Sanwais, 664, Loja 03<br>
                                    Edifício Castro - Centro<br>
                                    CEP: 85851-150 - Foz do Iguaçu/PR<br>
                                    <u>www.aecbrasil.org.br</u><br>
                                    E-mail.: <u><a href="mailto:contato@aecbrasil.org.br">contato@aecbrasil.org.br</a></u><br>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 mt-3">
                           <p style="font-weight: 300;font-size:12px!important;line-height:16px!important;">
                              AUTENTICADA<br>
                              A validade deste documento fica sujeito à comprovação de sua autenticidade na respectiva entidade.<br>
                              Informando sua respectiva inscrição Associativa.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="pt-0">
      <div class="container text-center">
         <input class="btn-enviar" type='button' id='btn' value='IMPRIMIR' onclick='printDiv();'>
      </div>
   </section>
   <script>
      function printDiv() {

         var divToPrint = document.getElementById('declaracao');

         var newWin = window.open('', 'Print-Window');
         var bootstrap = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">';

         newWin.document.open();

         newWin.document.write('<html><body onload="window.print()">' + bootstrap + divToPrint.innerHTML + '</body></html>');

         newWin.document.close();

         setTimeout(function() {
            newWin.close();
         }, 10);

      }
   </script>

<?php
}
else
{
   $url = get_home_url();
   wp_redirect($url);
}
get_footer();
