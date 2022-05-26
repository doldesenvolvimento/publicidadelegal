@extends('layouts/fullLayoutMaster')

@section('title', $breadcrumbs[1]['name'])

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">
      <div class="content-body">

        
        <link rel="stylesheet" href="/public/css/core.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Diário do Pará">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Diário do Pará">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="theme-color" content="#1d64b6">
<meta name="msapplication-TileColor" content="#1d64b6">

 <!-- cabeçalho-->
<header>
    <nav class="navbar fixed-top navbar-dark">
        <div class="container-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><g transform="translate(-55 -5)"><circle cx="20" cy="20" r="20" transform="translate(55 5)" fill="#fff" opacity="0.197"/>Início<g transform="translate(-43.041 -323.607)"><path d="M118.125,358.759c-1.744,0-3.488.007-5.232,0a3.785,3.785,0,0,1-3.778-3.109,4.316,4.316,0,0,1-.069-.827c0-2.646,0-5.292,0-7.938a3.95,3.95,0,0,1,1.317-3.035c1.916-1.781,3.814-3.581,5.724-5.369a2.864,2.864,0,0,1,4.13.015q2.861,2.686,5.722,5.372a3.911,3.911,0,0,1,1.295,2.985c0,2.666,0,5.331,0,8a3.8,3.8,0,0,1-3.928,3.911h-5.173Zm-.011-1.9c1.724,0,3.448.005,5.171,0a1.865,1.865,0,0,0,1.971-1.979q0-4.042,0-8.084a2.007,2.007,0,0,0-.66-1.533q-2.835-2.668-5.67-5.337a1.042,1.042,0,0,0-1.639.007q-2.815,2.646-5.628,5.294a2.106,2.106,0,0,0-.7,1.635c.011,2.655,0,5.31,0,7.965A1.865,1.865,0,0,0,113,356.855C114.706,356.86,116.41,356.856,118.114,356.856Z" transform="translate(0 0)" fill="#fff"/><path d="M172.806,614.9h-10a.951.951,0,1,1,0-1.9h10a.951.951,0,1,1,0,1.9Z" transform="translate(-49.669 -259.018)" fill="#fff"/></g></g></svg>
          <img class="logo" src="/images/logo/logo_dpa.png" width="200px" alt="diário do Pará">
          <a href="https://dol.com.br/digital/" class="btn btn-danger" role="button" aria-pressed="true">Edição Eletrônica</a>
        </div>
      </nav>
</header>

<!-- principal -->
<body>
    <div class="container-sm">
<h1 class="publi"></h1>
</div>

<div class="container-sm">
  <!-- PESQUISA -->
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h1 class="">Publicações</h1>
          <p class="texto1">Acesse os balanços e os fatos relevantes que envolvem as principais empresas do País. Leia notícias de negócios, veja as cotações das moedas e os índices da bolsa.</p>

        </div>
        <!--FORMULARIO DE PESQUISA -->
        <div class="card-body mt-2">
          <form class="dt_adv_search" method="POST">
            <div class="row g-1 mb-md-1">
              <div class="col-md-4">
                <label class="form-label">EMPRESA:</label>
                <input 
                  type="text" 
                  class="form-control" 
                  name="cnpj"
                  
                  
                                    
                  id="basicInput" 
                  placeholder="Nome da empresa" 
                />
              </div>
              <div class="col-md-3">
                <label class="form-label">CNPJ:</label>
                <input 
                  type="number" 
                  class="form-control" 
                  name="cnpj"
                  
                  
                                    
                  id="basicInput" 
                  placeholder="Informe CNPJ" 
                />
              </div>
              <div class="col-md-3">
                <label class="form-label">DATA DA PUBLICAÇÃO:</label>
                <input
                  type="date"
                  class="form-control dt-input"
                  data-column="3"
                  placeholder="Web designer"
                  data-column-index="2"
                />
              </div>
              <div class="col-md-2">
                <label class="form-label w-100">&nbsp;</label>
                <button class="btn btn-primary w-100" type="button">Pesquisar</button>
              </div>
              </div>
             </div>
            </div>
          </form>
        </div>
</section>
<!--/ FORMULARIO -->
</div>

  <!-- tabela de publicacoes -->

  
  <div class="container-sm">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Empresa</th>
                  <th>CNPJ</th>
                  <th>Data</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                   <!-- <img
                      src="http://127.0.0.1:8000/images/portrait/small/avatar-s-5.jpg"
                      class="me-75"
                      height="50"
                      width="50"
                      alt="empresa"
                    />-->
                    <span class="fw-bold">DAKAR COMÉRCIO E SERVIÇO LTDA</span>
                  </td>
                  <td>10301008000141</td>
                  <td>00/00/0000</td>
                  <td class="text-end">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-outline-primary">Baixar</button>
                      <button type="button" class="btn btn-primary">Ver na Edição</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>


<!-- rodapé -->
<footer>
  <div class="container-sm">
  <div class="row">
  <div class="col-md">
  <nav class="navbar navbar-expand-lg navbar-rodape">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
  <ul class="navbar-nav">
  <li>
  <a class="nav-link" href="https://dol.com.br/fale-conosco?d=1" title="FALE CONOSCO">FALE CONOSCO</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/central?d=1" title="CENTRAL DO ASSINANTE">CENTRAL DO ASSINANTE</a>
  </li>
  <li>
  <a class="nav-link" href="https://tem.diarioonline.com.br/?d=1" title="TEM!">TEM!</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/anuncie?d=1" title="ANUNCIE">ANUNCIE</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/privacidade?d=1" title="POLÍTICA DE PRIVACIDADE">POLÍTICA DE PRIVACIDADE</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/trabalhe?d=1" title="TRABALHE NO DOL">TRABALHE NO DOL</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/parceiros?d=1" title="PARCEIROS">PARCEIROS</a>
  </li>
  <li>
    <a class="nav-link-iti" href="https://verificador.iti.gov.br/" title="VALIDADOR">VALIDADOR (ITI)</a>
    </li>
  </ul>
  
  <div class="links-rodape my-2 my-lg-0">
  </div>
  </div>
  </nav>
  </div>
  </div>
  </div>
  </div>
  
  <div class="mw-pad-t-50 mw-pad-b-50">
  <div class="container-sm">
  <div class="row text-center text-lg-start">
    <div class="col-12 col-md-4">
      <div class="mw-m-b-30">

      <a href="https://api.whatsapp.com/send?phone=5591984126477" target="_blank" rel="external noopener nofollow" title="Whatsapp">
      <span class="hx-style-2 dol-f-38 dol-c-green dol-f-nunito-extra-bold mw-flex mw-a-items-center"><i data-feather='headphones'></i> 91 98412-6477</span>
      </a>
      <span class="hx-style-3 dol-f-16 dol-f-nunito-extra-light mw-pad-l-50">Faça sua denúncia pelo WhatsApp do Diário e apareça no DOL!</span>
      <div class="dol-h-50 mw-a-items-center mw-flex">
      <a class="mw-m-r-10" href="https://twitter.com/doldiarioonline" target="_blank" rel="external noopener nofollow" title="Twitter"><img src="/images/icons/social/twitter.png" alt=""></i></a>
      <a class="mw-m-r-10" href="https://www.facebook.com/doldiarioonline" rel="external noopener nofollow" target="_blank" title="Facebook"><img src="/images/icons/social/facebook.png" alt=""></i></a>
      <a class="mw-m-r-10" href="https://www.instagram.com/doloficial/" rel="external noopener nofollow" target="_blank" title="Instagram"><img src="/images/icons/social/instagram.png" alt=""></i></a>
      <a href="https://www.youtube.com/channel/UCIBUmFvG1ni6XisUqG7wr7g" rel="external noopener nofollow" target="_blank" title="YouTube"><i data-feather='youtube'></i></a>
    </div>
      </div>
      <hr> 
      
      <div id="newsletter">
      <span class="hx-style-2 dol-title mw-wrapper mw-pad-l-15 dol-f-28 dol-f-nunito-bold dol-c-promocoes mw-m-b-20"><b>NEWSLETTER</b></span>
      <form id="formNewsletter" class="mw-fit-width" method="post">
      <input type="hidden" name="templateId" value="Newsletter">
      <div class="input-group input-group-lg mw-fit-width mw-m-b-10">
       <input type="text" class="form-control dol-f-16 dol-f-nunito-extra-light mw-pad-10 dol-c-gray mw-b-radius-5" placeholder="Seu email" required="" name="email" id="email">
      <div class="mw-flex input-group-append">
      <button data-id="send-newsletter" class="btn btn-outline dol-c-primary" type="button" id="button-addon2" aria-label="Enviar"><i data-feather='mail'></i></button>
      </div>
      <div data-modal="newsletter-interna" style="display: none;" class="alert alert-info alert-dismissible fade show w-100 mb-2" role="alert">
      <div data-first="" class="text-center">
      <b>Aguarde um momento...</b>
      </div>
      <div data-text="text-modal" style="display:none;">
      <b data-id="titleModal-interna"></b>
      </div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      </div>
      </div>
      </form>
      </div>
      </div>
  <div class="col-12 col-md-8">
  
  <div class="row d-none d-lg-flex">
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-noticias dol-f-14 mw-m-b-10">NOTÍCIAS</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/agropara?d=1" title="AGROPARÁ">AGROPARÁ</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/para?d=1" title="Notícias Pará">Notícias Pará</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/cirio?d=1" title="Círio">Círio</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/policia?d=1" title="Polícia">Polícia</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/brasil?d=1" title="Brasil">Brasil</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/eaibeleza?d=1" title="E aí, beleza?">E aí, beleza?</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/elas?d=1" title="Elas">Elas</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/auto-dicas?d=1" title="Veículos">Veículos</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/mundo-noticias?d=1" title="Mundo">Mundo</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/tecnologia?d=1" title="Tecnologia">Tecnologia</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/transito?d=1" title="Trânsito">Trânsito</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/gastronomia?d=1" title="Gastronomia">Gastronomia</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/papo-de-pet?d=1" title="Papo de PET">Papo de PET</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/babydol?d=1" title="Baby DOL">Baby DOL</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/te-cuida?d=1" title="Te Cuida">Te Cuida</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/santarem?d=1" title="Santarém">Santarém</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/carajas?d=1" title="DOL Carajás">DOL Carajás</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/politica?d=1" title="Política">Política</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/negocios?d=1" title="Negócios">Negócios</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/cursos--empregos?d=1" title="Cursos &amp; Empregos">Cursos &amp; Empregos</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/dol-delas?d=1" title="DOL Delas">DOL Delas</a>
  </div>
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-esporte dol-f-14 mw-m-b-10">ESPORTE</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/esporte-para?d=1" title="Esporte Pará">Esporte Pará</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/esporte-brasil?d=1" title="Brasil">Brasil</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/mundo?d=1" title="Mundo">Mundo</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/colunistas/gerson-nogueira?d=1" title="Gerson Nogueira">Gerson Nogueira</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/remo?d=1" title="Remo">Remo</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/paysandu?d=1" title="Paysandu">Paysandu</a>
  </div>
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-entretenimento dol-f-14 mw-m-b-10">ENTRETENIMENTO</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/cultura?d=1" title="Cultura">Cultura</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/cinema?d=1" title="Cinema">Cinema</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/fama?d=1" title="Fama">Fama</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/musica?d=1" title="Música">Música</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/games?d=1" title="Games">Games</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/carajas/entretenimento/promocoes?d=1" title="Promoções">Promoções</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/hqpop?d=1" title="HQPOP">HQPOP</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://todaon.com.br/?d=1" title="TodaON">TodaON</a>
  </div>
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-dolplay dol-f-14 mw-m-b-10">OUTROS</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/galerias?d=1" title="Galerias">Galerias</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/dolplay?d=1" title="DOLPLAY">DOLPLAY</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/digital?d=1" title="Ed. Eletrônica">Ed. Eletrônica</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="/concursos?d=1" title="Concursos">Concursos</a>
   <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://rbatv.dol.com.br/?d=1" title="RBATV">RBATV</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="http://radio99.com.br/?d=1" title="99FM">99FM</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="http://radiodiariofm.com.br/?d=1" title="Diário FM">Diário FM</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://radioclube.dol.com.br/?d=1" title="Rádio Clube">Rádio Clube</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://tem.diarioonline.com.br/?d=1" title="Tem+">Tem+</a>
  </div>
  </div>
  </div>
  
 
  <div class="col-12 text-center">
  <small class="box-footer-lgpd dol-f-12">
  <span class="politica-privacidade">
  DOL-INTERMEDIACAO DE NEGOCIOS E PORTAL DE INTERNET LTDA - CNPJ 14.010.848/0001-06 - Rua Gaspar Viana, 773/7, Reduto - Belém/PA - CEP 66.053-090 <br>
  <a href="https://dol.com.br/privacidade" alt="Política de Privacidade" title="Política de Privacidade" class="dol-f-nunito-extra-bold">Política de Privacidade</a> - Para fazer qualquer solicitação ao nosso encarregado de proteção de dados <b>(DPO)</b>: <a href="mailto:lgpd@dol.com.br" alt="DPO" title="DPO" class="dol-f-nunito-extra-bold">lgpd@dol.com.br</a>.
  </span>
  </small>
  </div>
  </div>
  </div>
  </div>
  <div class="barra-rodape">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md">
  <a href="https://dol.com.br/condicoes-gerais-uso" class="condicoes-de-uso" title="Condições gerais de uso">Condições gerais de uso | © Copyright 2010-2022 DOL - Diário Online</a> 
  </div>
  </div>
  </div>
  </div>
  </footer>


      </div>
    </div>
  </div>

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
