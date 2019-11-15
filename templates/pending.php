<?php /*Template Name: Pending leads*/ ?>
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
                  <table class="table sortable">
                    <?php get_template_part( 'templates/parts/global/table-thead' ); ?>
                    <tbody>
                      <?php
                        $leads_args = array(
                          'post_type'     => 'lead',
                          'post_status'     => 'publish',
                          'meta_key'      => 'date',
                          'orderby'     => 'meta_value',
                          'order'           => 'DESC',
                          'posts_per_page'  => -1,
                          'meta_query' => array(
                              array(
                                'key'     => 'outcome',
                                'value'   => 'Pending',
                                'compare' => 'LIKE',
                              ),
                            ),
                        );

                        $leads_query = new WP_Query( $leads_args );
                        if ( $leads_query->have_posts() ) {
                          while ( $leads_query->have_posts() ) { $leads_query->the_post();
                            get_template_part('templates/parts/loop/lead-item');
                          }
                          wp_reset_postdata();
                        } 
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php get_footer(); ?>