<?php

// setCookie('cNome', findUsuario.nome, 12);
// setCookie('cId', findUsuario.id, 12);
// setCookie('cWhatsapp', findUsuario.whatsapp, 12);
// setCookie('cLogin', findUsuario.usuario, 12);
// setCookie('cGrupo', findUsuario.grupoid, 12);
if (isset($_COOKIE['cGrupo'])) {
  $grupoId = $_COOKIE['cGrupo'];

  if ($grupoId == 1 || $grupoId == 2 || $grupoId == 4) {
    $newArray = array(
      // array(
      //     'name'  => 'Dashboard',
      //     'icon'  => 'fa fa-rocket',
      //     'url'   => 'dashboard.php'
      // ),

      // $baseDeDados,
      // array(
      //   'name'  => 'Funil de Vendas',
      //   'type'  => 'heading'
      // ),

      // $funilDeVendas,

      array(
        'name'  => 'Funil de Vendas',
        'type'  => 'heading'
      ),

      array(
        'name'  => 'Tratamento de Leads',
        'icon'  => 'fa fa-database',
        'url'   => 'fuv-tratamento-de-leads.php',
      ),

      array(
        'name'  => 'Filtro Avançado',
        'icon'  => 'fa fa-filter',
        'url'   => 'fuv-filtro-avancado.php'
      ),


      array(
        'name'  => 'Oportunidades',
        'icon'  => 'fa fa-broadcast-tower',
        'sub'   => array(
          array(
            'name'  => 'Nova Oportunidade',
            'icon'  => 'fa fa-plus-circle',
            'url'   => 'fuv-oportunidades-manage.php'
          ),
          array(
            'name'  => 'Gerenciar Oportunidades',
            'icon'  => 'fa fa-cog',
            'url'   => 'fuv-oportunidades.php'
          ),

        )
      ),

      // array(
      //   'name'  => 'Fechamento',
      //   'icon'  => 'fa fa-clipboard',
      //   'sub'   => array(
      //     array(
      //       'name'  => 'Digitação',
      //       'icon'  => 'fa fa-keyboard',
      //       'url'   => 'fuv-digitacao.php'
      //     ),

      //     array(
      //       'name'  => 'Formalização',
      //       'icon'  => 'fa fa-clipboard-check',
      //       'url'   => 'fuv-formalizacao.php'
      //     )
      //   )
      // ),

      // array(
      //     'name'  => 'Manuais',
      //     'icon'  => 'fa fa-atlas',
      //     'sub'   => array(
      //         array(
      //             'name'  => 'Vendas',
      //             'url'   => ''
      //         ),

      //         array(
      //             'name'  => 'Produtos',
      //             'url'   => ''
      //         )
      //     )
      // ),    

      // array(
      //     'name'  => 'Enviar Cards',
      //     'icon'  => 'far fa-share-square',
      //     'url'   => ''
      // ),

      // array(
      //     'name'  => 'Relacionamento',
      //     'type'  => 'heading'
      // ),

      // array(
      //     'name'  => 'Notificações',
      //     'icon'  => 'far fa-flag',
      //     'badge' => array(27, 'success'),
      //     'sub'   => array(
      //         array(
      //             'name'  => 'Atendimentos Bloqueados',
      //             'badge' => array(10, 'danger'),
      //             'url'   => ''
      //         ),
      //         array(
      //             'name'  => 'Contratos Ativos',
      //             'badge' => array(5, 'success'),
      //             'url'   => ''
      //         ),
      //         array(
      //             'name'  => 'Revisitações',
      //             'badge' => array(10, 'info'),
      //             'url'   => ''
      //         ),
      //         array(
      //             'name'  => 'Liberações',
      //             'badge' => array(2, 'warning'),
      //             'url'   => ''
      //         )


      //     )
      // ), 

      // // array(
      // //     'name'  => 'Recepção de Vendas',
      // //     'icon'  => 'far fa-file-alt',
      // //     'sub'   => array(
      // //         array(
      // //             'name'  => 'Novos Contratos',
      // //             'badge' => array(5, 'success'),
      // //             'url'   => 'rel-recepcao-de-vendas.php?tpcontrato=1'
      // //         ),
      // //         array(
      // //             'name'  => 'Migração de Plano',
      // //             'badge' => array(5, 'warning'),
      // //             'url'   => 'rel-recepcao-de-vendas.php?tpcontrato=2'
      // //         ),
      // //         array(
      // //             'name'  => 'Adição de Beneficiário',
      // //             'badge' => array(18, 'info'),
      // //             'url'   => 'rel-recepcao-de-vendas.php?tpcontrato=3'
      // //         )
      // //     )
      // // ),

      // array(
      //     'name'  => 'Contratos',
      //     'icon'  => 'far fa-file-alt',
      //     'sub'   => array(
      //         array(
      //             'name'  => 'Ativos',
      //             'badge' => array(5, 'success'),
      //             'url'   => ''
      //         ),
      //         array(
      //             'name'  => 'Inadiplentes',
      //             'badge' => array(5, 'warning'),
      //             'url'   => ''
      //         ),
      //         array(
      //             'name'  => 'Cancelados',
      //             'badge' => array(18, 'danger'),
      //             'url'   => ''
      //         )
      //     )
      // ),                   

      // array(
      //   'name'  => 'Gestão',
      //   'type'  => 'heading'
      // ),


      // array(
      //   'name'  => 'Resultados',
      //   'type'  => 'heading'
      // ),

      // array(
      //   'name'  => 'Relatório de Vendas',
      //   'icon'  => 'fa fa-file-alt',
      //   'url'   => 'res-vendas.php'
      // ),
      // array(
      //   'name'  => 'Dashboard',
      //   'icon'  => 'fa fa-chart-pie',
      //   // 'url'   => 'res-dashboard.php'
      // ),

      array(
        'name'  => 'Administração',
        'type'  => 'heading'
      ),

      // array(
      //   'name'  => 'Usuários',
      //   'icon'  => 'fa fa-user-alt',
      //   'sub'   => array(
      //     array(
      //       'name'  => 'Gerenciar Usuários',
      //       'icon'  => 'fa fa-cog',
      //       // 'url'   => 'ges-usuarios.php'
      //     ),
      //     array(
      //       'name'  => 'Permissões',
      //       'icon'  => 'fa fa-id-badge',
      //       // 'url'   => 'ges-permissoes.php'
      //     ),
      //     array(
      //       'name'  => 'Novo Usuário',
      //       'icon'  => 'fa fa-plus-circle',
      //       // 'url'   => 'ges-usuarios-manage.php'
      //     )
      //   )
      // ),

      // array(
      //   'name'  => 'Consultores',
      //   'icon'  => 'fa fa-bezier-curve',
      //   'sub'   => array(
      //     array(
      //       'name'  => 'Gerenciar Consultores',
      //       'icon'  => 'fa fa-cog',
      //       'url'   => 'ges-contas.php'
      //     ),
      //     array(
      //       'name'  => 'Novo Consultor',
      //       'icon'  => 'fa fa-plus-circle',
      //       'url'   => 'ges-contas-manage.php'
      //     )
      //   )
      // ),

      // array(
      //     'name'  => 'Seguradoras',
      //     'icon'  => 'far fa-building',
      //     'sub'   => array(
      //         array(
      //             'name'  => 'Gerenciar',
      //             'url'   => 'adm-seguradoras.php'
      //         ),
      //         array(
      //             'name'  => 'Nova Seguradora ',
      //             'icon'  => 'fa fa-plus-circle',
      //             'url'   => 'adm-seguradoras-manage.php'
      //         )
      //     )
      // ),

      // array(
      //   'name'  => 'Parceiros',
      //   'icon'  => 'fa fa-city',
      //   'sub'   => array(
      //     array(
      //       'name'  => 'Gerenciar Parceiros',
      //       'icon'  => 'fa fa-cog',
      //       // 'url'   => 'adm-parceiros.php'
      //     ),
      //     array(
      //       'name'  => 'Gestão de Preços',
      //       'icon'  => 'fa fa-dollar-sign',
      //       // 'url'   => 'adm-parceiros-produtos.php'
      //     ),
      //     array(
      //       'name'  => 'Novo Parceiro',
      //       'icon'  => 'fa fa-plus-circle',
      //       // 'url'   => 'adm-parceiros-manage.php'
      //     )
      //   )
      // ),

      // array(
      //   'name'  => 'Produtos',
      //   'icon'  => 'fa fa-medkit',
      //   'sub'   => array(
      //     array(
      //       'name'  => 'Gerenciar Produtos',
      //       'icon'  => 'fa fa-cog',
      //       // 'url'   => 'adm-produtos.php'
      //     ),
      //     array(
      //       'name'  => 'Novo Produto',
      //       'icon'  => 'fa fa-plus-circle',
      //       // 'url'   => 'adm-produtos-manage.php'
      //     )
      //   )
      // ),

      array(
        'name'  => 'Campanhas',
        'icon'  => 'fa fa-at',
        'sub'   => array(
          array(
            'name'  => 'Gerenciar',
            'url'   => 'adm-campanha.php'
          ),
          array(
            'name'  => 'Nova Campanha',
            'icon'  => 'fa fa-plus-circle',
            'url'   => 'adm-campanha-manage.php'
          )
        )
      ),

      array(
        'name'  => 'Plataformas',
        'icon'  => 'fa fa-at',
        'sub'   => array(
          array(
            'name'  => 'Gerenciar',
            'url'   => 'adm-plataforma.php'
          ),
          array(
            'name'  => 'Nova Plataforma',
            'icon'  => 'fa fa-plus-circle',
            'url'   => 'adm-plataforma-manage.php'
          )
        )
      ),

      array(
        'name'  => 'Anúncios',
        'icon'  => 'fa fa-at',
        'sub'   => array(
          array(
            'name'  => 'Gerenciar',
            'url'   => 'adm-anuncio.php'
          ),
          array(
            'name'  => 'Novo Anúncio',
            'icon'  => 'fa fa-plus-circle',
            'url'   => 'adm-anuncio-manage.php'
          )
        )
      ),

      // array(
      //   'name'  => 'Origens Leads',
      //   'icon'  => 'fa fa-at',
      //   'sub'   => array(
      //     array(
      //       'name'  => 'Gerenciar',
      //       'url'   => 'adm-origens.php'
      //     ),
      //     array(
      //       'name'  => 'Nova Origem',
      //       'icon'  => 'fa fa-plus-circle',
      //       'url'   => 'adm-origens-manage.php'
      //     )
      //   )
      // ),

      // array(
      //     'name'  => 'Cards',
      //     'icon'  => 'fa fa-money-check'
      // ),
      // array(
      //     'name'  => 'Promoções',
      //     'icon'  => 'fa fa-shopping-cart'
      // ),   
      // array(
      //     'name'  => 'Comissões',
      //     'icon'  => 'fa fa-money-bill'
      // )
    );
  } else {
    $newArray = array(
      // array(
      //     'name'  => 'Dashboard',
      //     'icon'  => 'fa fa-rocket',
      //     'url'   => 'dashboard.php'
      // ),

      array(
        'name'  => 'Funil de Vendas',
        'type'  => 'heading'
      ),

      array(
        'name'  => 'Oportunidades',
        'icon'  => 'fa fa-broadcast-tower',
        'sub'   => array(
          array(
            'name'  => 'Nova Oportunidade',
            'icon'  => 'fa fa-plus-circle',
            'url'   => 'fuv-oportunidades-manage.php'
          ),
          array(
            'name'  => 'Gerenciar Oportunidades',
            'icon'  => 'fa fa-cog',
            'url'   => 'fuv-oportunidades.php'
          ),

        )
      )
    );
  }
}


?>


<!-- Sidebar -->
<!--
  Sidebar Mini Mode - Display Helper classes

  Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
  Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

  Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
  Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
  Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="index.php">
                <span class="smini-visible">
                    D<span class="opacity-75">x</span>
                </span>
                <span class="smini-hidden">
                    Corretor<span class="opacity-75">Online</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                    onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->

                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
                    <i class="far fa-moon" id="dark-mode-toggler"></i>
                </button>
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">

                <?php
        // $newArray = array(
        //   // array(
        //   //     'name'  => 'Dashboard',
        //   //     'icon'  => 'fa fa-rocket',
        //   //     'url'   => 'dashboard.php'
        //   // ),

        //   // $baseDeDados,
        //   // array(
        //   //   'name'  => 'Funil de Vendas',
        //   //   'type'  => 'heading'
        //   // ),

        //   // $funilDeVendas,

        //   array(
        //     'name'  => 'Funil de Vendas',
        //     'type'  => 'heading'
        //   ),

        //   array(
        //     'name'  => 'Tratamento de Leads',
        //     'icon'  => 'fa fa-database',
        //     'url'   => 'fuv-tratamento-de-leads.php',
        //   ),

        //   array(
        //     'name'  => 'Filtro Avançado',
        //     'icon'  => 'fa fa-filter',
        //     'url'   => 'fuv-filtro-avancado.php'
        //   ),


        //   array(
        //     'name'  => 'Oportunidades',
        //     'icon'  => 'fa fa-broadcast-tower',
        //     'sub'   => array(
        //       array(
        //         'name'  => 'Nova Oportunidade',
        //         'icon'  => 'fa fa-plus-circle',
        //         'url'   => 'fuv-oportunidades-manage.php'
        //       ),
        //       array(
        //         'name'  => 'Gerenciar Oportunidades',
        //         'icon'  => 'fa fa-cog',
        //         'url'   => 'fuv-oportunidades.php'
        //       ),

        //     )
        //   ),

        //   array(
        //     'name'  => 'Fechamento',
        //     'icon'  => 'fa fa-clipboard',
        //     'sub'   => array(
        //       array(
        //         'name'  => 'Digitação',
        //         'icon'  => 'fa fa-keyboard',
        //         'url'   => 'fuv-digitacao.php'
        //       ),

        //       array(
        //         'name'  => 'Formalização',
        //         'icon'  => 'fa fa-clipboard-check',
        //         'url'   => 'fuv-formalizacao.php'
        //       )
        //     )
        //   ),

        //   // array(
        //   //     'name'  => 'Manuais',
        //   //     'icon'  => 'fa fa-atlas',
        //   //     'sub'   => array(
        //   //         array(
        //   //             'name'  => 'Vendas',
        //   //             'url'   => ''
        //   //         ),

        //   //         array(
        //   //             'name'  => 'Produtos',
        //   //             'url'   => ''
        //   //         )
        //   //     )
        //   // ),    

        //   // array(
        //   //     'name'  => 'Enviar Cards',
        //   //     'icon'  => 'far fa-share-square',
        //   //     'url'   => ''
        //   // ),

        //   // array(
        //   //     'name'  => 'Relacionamento',
        //   //     'type'  => 'heading'
        //   // ),

        //   // array(
        //   //     'name'  => 'Notificações',
        //   //     'icon'  => 'far fa-flag',
        //   //     'badge' => array(27, 'success'),
        //   //     'sub'   => array(
        //   //         array(
        //   //             'name'  => 'Atendimentos Bloqueados',
        //   //             'badge' => array(10, 'danger'),
        //   //             'url'   => ''
        //   //         ),
        //   //         array(
        //   //             'name'  => 'Contratos Ativos',
        //   //             'badge' => array(5, 'success'),
        //   //             'url'   => ''
        //   //         ),
        //   //         array(
        //   //             'name'  => 'Revisitações',
        //   //             'badge' => array(10, 'info'),
        //   //             'url'   => ''
        //   //         ),
        //   //         array(
        //   //             'name'  => 'Liberações',
        //   //             'badge' => array(2, 'warning'),
        //   //             'url'   => ''
        //   //         )


        //   //     )
        //   // ), 

        //   // // array(
        //   // //     'name'  => 'Recepção de Vendas',
        //   // //     'icon'  => 'far fa-file-alt',
        //   // //     'sub'   => array(
        //   // //         array(
        //   // //             'name'  => 'Novos Contratos',
        //   // //             'badge' => array(5, 'success'),
        //   // //             'url'   => 'rel-recepcao-de-vendas.php?tpcontrato=1'
        //   // //         ),
        //   // //         array(
        //   // //             'name'  => 'Migração de Plano',
        //   // //             'badge' => array(5, 'warning'),
        //   // //             'url'   => 'rel-recepcao-de-vendas.php?tpcontrato=2'
        //   // //         ),
        //   // //         array(
        //   // //             'name'  => 'Adição de Beneficiário',
        //   // //             'badge' => array(18, 'info'),
        //   // //             'url'   => 'rel-recepcao-de-vendas.php?tpcontrato=3'
        //   // //         )
        //   // //     )
        //   // // ),

        //   // array(
        //   //     'name'  => 'Contratos',
        //   //     'icon'  => 'far fa-file-alt',
        //   //     'sub'   => array(
        //   //         array(
        //   //             'name'  => 'Ativos',
        //   //             'badge' => array(5, 'success'),
        //   //             'url'   => ''
        //   //         ),
        //   //         array(
        //   //             'name'  => 'Inadiplentes',
        //   //             'badge' => array(5, 'warning'),
        //   //             'url'   => ''
        //   //         ),
        //   //         array(
        //   //             'name'  => 'Cancelados',
        //   //             'badge' => array(18, 'danger'),
        //   //             'url'   => ''
        //   //         )
        //   //     )
        //   // ),                   

        //   // array(
        //   //   'name'  => 'Gestão',
        //   //   'type'  => 'heading'
        //   // ),


        //   // array(
        //   //   'name'  => 'Resultados',
        //   //   'type'  => 'heading'
        //   // ),

        //   // array(
        //   //   'name'  => 'Relatório de Vendas',
        //   //   'icon'  => 'fa fa-file-alt',
        //   //   'url'   => 'res-vendas.php'
        //   // ),
        //   // array(
        //   //   'name'  => 'Dashboard',
        //   //   'icon'  => 'fa fa-chart-pie',
        //   //   // 'url'   => 'res-dashboard.php'
        //   // ),

        //   array(
        //     'name'  => 'Administração',
        //     'type'  => 'heading'
        //   ),

        //   // array(
        //   //   'name'  => 'Usuários',
        //   //   'icon'  => 'fa fa-user-alt',
        //   //   'sub'   => array(
        //   //     array(
        //   //       'name'  => 'Gerenciar Usuários',
        //   //       'icon'  => 'fa fa-cog',
        //   //       // 'url'   => 'ges-usuarios.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Permissões',
        //   //       'icon'  => 'fa fa-id-badge',
        //   //       // 'url'   => 'ges-permissoes.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Novo Usuário',
        //   //       'icon'  => 'fa fa-plus-circle',
        //   //       // 'url'   => 'ges-usuarios-manage.php'
        //   //     )
        //   //   )
        //   // ),

        //   // array(
        //   //   'name'  => 'Consultores',
        //   //   'icon'  => 'fa fa-bezier-curve',
        //   //   'sub'   => array(
        //   //     array(
        //   //       'name'  => 'Gerenciar Consultores',
        //   //       'icon'  => 'fa fa-cog',
        //   //       'url'   => 'ges-contas.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Novo Consultor',
        //   //       'icon'  => 'fa fa-plus-circle',
        //   //       'url'   => 'ges-contas-manage.php'
        //   //     )
        //   //   )
        //   // ),

        //   // array(
        //   //     'name'  => 'Seguradoras',
        //   //     'icon'  => 'far fa-building',
        //   //     'sub'   => array(
        //   //         array(
        //   //             'name'  => 'Gerenciar',
        //   //             'url'   => 'adm-seguradoras.php'
        //   //         ),
        //   //         array(
        //   //             'name'  => 'Nova Seguradora ',
        //   //             'icon'  => 'fa fa-plus-circle',
        //   //             'url'   => 'adm-seguradoras-manage.php'
        //   //         )
        //   //     )
        //   // ),

        //   // array(
        //   //   'name'  => 'Parceiros',
        //   //   'icon'  => 'fa fa-city',
        //   //   'sub'   => array(
        //   //     array(
        //   //       'name'  => 'Gerenciar Parceiros',
        //   //       'icon'  => 'fa fa-cog',
        //   //       // 'url'   => 'adm-parceiros.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Gestão de Preços',
        //   //       'icon'  => 'fa fa-dollar-sign',
        //   //       // 'url'   => 'adm-parceiros-produtos.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Novo Parceiro',
        //   //       'icon'  => 'fa fa-plus-circle',
        //   //       // 'url'   => 'adm-parceiros-manage.php'
        //   //     )
        //   //   )
        //   // ),

        //   // array(
        //   //   'name'  => 'Produtos',
        //   //   'icon'  => 'fa fa-medkit',
        //   //   'sub'   => array(
        //   //     array(
        //   //       'name'  => 'Gerenciar Produtos',
        //   //       'icon'  => 'fa fa-cog',
        //   //       // 'url'   => 'adm-produtos.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Novo Produto',
        //   //       'icon'  => 'fa fa-plus-circle',
        //   //       // 'url'   => 'adm-produtos-manage.php'
        //   //     )
        //   //   )
        //   // ),

        //   array(
        //     'name'  => 'Campanhas',
        //     'icon'  => 'fa fa-at',
        //     'sub'   => array(
        //       array(
        //         'name'  => 'Gerenciar',
        //         'url'   => 'adm-campanha.php'
        //       ),
        //       array(
        //         'name'  => 'Nova Campanha',
        //         'icon'  => 'fa fa-plus-circle',
        //         'url'   => 'adm-campanha-manage.php'
        //       )
        //     )
        //   ),

        //   array(
        //     'name'  => 'Plataformas',
        //     'icon'  => 'fa fa-at',
        //     'sub'   => array(
        //       array(
        //         'name'  => 'Gerenciar',
        //         'url'   => 'adm-plataforma.php'
        //       ),
        //       array(
        //         'name'  => 'Nova Plataforma',
        //         'icon'  => 'fa fa-plus-circle',
        //         'url'   => 'adm-plataforma-manage.php'
        //       )
        //     )
        //   ),

        //   array(
        //     'name'  => 'Anúncios',
        //     'icon'  => 'fa fa-at',
        //     'sub'   => array(
        //       array(
        //         'name'  => 'Gerenciar',
        //         'url'   => 'adm-anuncio.php'
        //       ),
        //       array(
        //         'name'  => 'Novo Anúncio',
        //         'icon'  => 'fa fa-plus-circle',
        //         'url'   => 'adm-anuncio-manage.php'
        //       )
        //     )
        //   ),

        //   // array(
        //   //   'name'  => 'Origens Leads',
        //   //   'icon'  => 'fa fa-at',
        //   //   'sub'   => array(
        //   //     array(
        //   //       'name'  => 'Gerenciar',
        //   //       'url'   => 'adm-origens.php'
        //   //     ),
        //   //     array(
        //   //       'name'  => 'Nova Origem',
        //   //       'icon'  => 'fa fa-plus-circle',
        //   //       'url'   => 'adm-origens-manage.php'
        //   //     )
        //   //   )
        //   // ),

        //   // array(
        //   //     'name'  => 'Cards',
        //   //     'icon'  => 'fa fa-money-check'
        //   // ),
        //   // array(
        //   //     'name'  => 'Promoções',
        //   //     'icon'  => 'fa fa-shopping-cart'
        //   // ),   
        //   // array(
        //   //     'name'  => 'Comissões',
        //   //     'icon'  => 'fa fa-money-bill'
        //   // )

        // );
        ?>

                <?php $dm->build_nav($newArray); ?>
                <?php //$dm->build_nav(); 
        ?>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->