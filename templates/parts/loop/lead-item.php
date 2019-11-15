<?php
/*
Loop item for single lead item (as tr tag in table)
 */
?>

<?php
    $edit_link_tag_open = '<a href="' . home_url() . '/wp-admin/post.php?post=' . $post->ID . '&action=edit" title = "Click to edit this lead">';

    if (get_field('traked_source_predef') == 'Other') {
        $source = get_field('traked_source');
    } else {
        $source = get_field('traked_source_predef');
    }
?>

<tr>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('date');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('phone');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('location');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_title();?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('need');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('how_found');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('notes');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('consultant');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('outcome');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php echo $source; ?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('campaign');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('ad_group');?></a></td>
        <td><?php echo $edit_link_tag_open; ?><?php the_field('keyword');?></a></td>
</tr>