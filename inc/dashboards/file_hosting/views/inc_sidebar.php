<?php
/**
 * dashboards/file_hosting/views/inc_sidebar.php
 *
 * Author: pixelcave
 *
 * The sidebar of each page
 *
 */
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
          Dash<span class="opacity-75">mix</span>
          <span class="fw-normal">File Hosting</span>
        </span>
      </a>
      <!-- END Logo -->

      <!-- Options -->
      <div>
        <!-- Extra Settings -->
        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
          <i class="fa fa-cog"></i>
        </a>
        <!-- END Extra Settings -->

        <!-- Close Sidebar, Visible only on mobile screens -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
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
    <!-- Side Actions -->
    <div class="content-side smini-hide">
      <a class="btn btn-alt-success w-100" href="javascript:void(0)">
        <i class="fa fa-plus me-1"></i> Add New
      </a>
    </div>
    <!-- END Side Actions -->

    <!-- Side Navigation -->
    <div class="content-side">
      <ul class="nav-main">
        <?php $dm->build_nav(); ?>
      </ul>
    </div>
    <!-- END Side Navigation -->
  </div>
  <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->
