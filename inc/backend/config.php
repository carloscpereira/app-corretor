<?php
/**
 * dashboards/banking/config.php
 *
 * Author: pixelcave
 *
 * Banking dashboard configuration file
 *
 */

// **************************************************************************************************
// INCLUDED VIEWS
// **************************************************************************************************

$dm->inc_sidebar                = 'inc/backend/views/inc_sidebar.php';
$dm->inc_header                 = 'inc/backend/views/inc_header.php';
$dm->inc_footer                 = 'inc/backend/views/inc_footer.php';

// **************************************************************************************************
// SIDEBAR
// **************************************************************************************************

$dm->l_sidebar_dark             = false;


// **************************************************************************************************
// HEADER
// **************************************************************************************************

$dm->l_header_style             = 'dark';



// **************************************************************************************************
// GENERIC
// **************************************************************************************************

$dm->theme                      = 'xwork';


// **************************************************************************************************
// MAIN CONTENT
// **************************************************************************************************

$dm->l_m_content                = 'boxed';


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************


$dm->main_nav                   = array(
    array(
        'name'  => 'Dashboard',
        'icon'  => 'fa fa-rocket',
        'url'   => 'dashboard.php'
    ),
    array(
        'name'  => 'Força de Vendas',
        'type'  => 'heading'
    ),
    
    array(
        'name'  => 'Enviar Cards',
        'icon'  => 'fa fa-piggy-bank',
        'url'   => ''
    ),

    array(
        'name'  => 'Novos Leads',
        'icon'  => 'fa fa-piggy-bank',
        'badge' => array(5, 'success'),
        'url'   => 'fdv-novos-leads.php'
    ),

    array(
        'name'  => 'Propostas',
        'icon'  => 'fa fa-piggy-bank',
        'sub'   => array(
            array(
                'name'  => 'Pendentes',
                'badge' => array(12, 'warning'),
                'url'   => ''
            ),
           
            array(
                'name'  => 'Recusadas',
                'badge' => array(2, 'danger'),
                'url'   => ''
            ),

            array(
                'name'  => 'Na Operadora',
                'badge' => array(102, 'success'),
                'url'   => ''
            ),
            array(
                'name'  => 'Gerenciar Propostas',
                'url'   => ''
            ),
            array(
                'name'  => 'Nova Proposta',
                'icon'  => 'fa fa-plus-circle',
                'url'   => ''
            )
        )
    ),    
    
    array(
        'name'  => 'Relacionamento',
        'type'  => 'heading'
    ),
    
    array(
        'name'  => 'Notificações',
        'icon'  => 'fa fa-piggy-bank',
        'badge' => array(5, 'success'),
        'sub'   => array(
            array(
                'name'  => 'Atendimentos Bloqueados',
                'badge' => array(10, 'danger'),
                'url'   => ''
            ),
            array(
                'name'  => 'Contratos Ativos',
                'badge' => array(5, 'success'),
                'url'   => ''
            )
        )
    ), 

    array(
        'name'  => 'Contratos',
        'icon'  => 'fa fa-piggy-bank',
        'sub'   => array(
            array(
                'name'  => 'Ativos',
                'badge' => array(5, 'success'),
                'url'   => ''
            ),
            array(
                'name'  => 'Inadiplentes',
                'badge' => array(5, 'warning'),
                'url'   => ''
            ),
            array(
                'name'  => 'Cancelados',
                'badge' => array(18, 'danger'),
                'url'   => ''
            )
        )
    ),    
    array(
        'name'  => 'Gestão',
        'type'  => 'heading'
    ),

    array(
        'name'  => 'Contas',
        'icon'  => 'fa fa-piggy-bank',
        'sub'   => array(
            array(
                'name'  => 'Atvivas',
                'url'   => ''
            ),
            array(
                'name'  => 'Gerenciar',
                'url'   => ''
            ),
            array(
                'name'  => 'Nova Conta',
                'icon'  => 'fa fa-plus-circle',
                'url'   => ''
            )
        )
    ),

    array(
        'name'  => 'Resultados',
        'icon'  => 'fa fa-piggy-bank',
        'url'   => ''
    ),

    array(
        'name'  => 'Configurações',
        'type'  => 'heading'
    ),
    
    array(
        'name'  => 'Produtos',
        'icon'  => 'fa fa-money-bill-wave-alt',
        'sub'   => array(
            array(
                'name'  => 'Ativos',
                'url'   => ''
            ),
            array(
                'name'  => 'Gerenciar',
                'url'   => ''
            ),
            array(
                'name'  => 'Novo Produto',
                'icon'  => 'fa fa-plus-circle',
                'url'   => ''
            )
        )
    ),
    array(
        'name'  => 'Cards',
        'icon'  => 'fa fa-money-check'
    ),
    array(
        'name'  => 'Promoções',
        'icon'  => 'fa fa-money-bill-wave-alt'
    ),   
    array(
        'name'  => 'Comissões',
        'icon'  => 'fa fa-money-bill'
    )

);
