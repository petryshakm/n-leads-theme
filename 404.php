<?php get_template_part( 'templates/parts/global/head' ); ?>
<body>
  <div class="wrapper ">
    <?php get_sidebar(); ?>
    <div class="main-panel">
      <?php get_template_part( 'templates/parts/global/navbar' ); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?php the_title(); ?></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive table-leads-wrapper">
                  <h2>page 404</h2>
                  <p>sorry, this page does not exist.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php get_footer(); ?>