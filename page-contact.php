<?php
/*
Template name: Contact
*/
get_header(); ?>

<section class="content">

    <?php get_template_part( 'content', 'banner' ); ?>

    <section class="contact">
        <div class="two-col wrap">
            <div class="one-half left">
                <?php if (get_field('intro')): ?>
                    <blockquote>
                        <p><?php the_field('intro'); ?></p>
                    </blockquote>
                <?php endif; ?>
                <?php if (get_field('content')): ?>
                    <?php the_field('content'); ?>
                <?php endif; ?>
            </div>
            <div class="one-half right">
                <?php if (get_field('add_form')): ?>
                    <?php the_field('add_form'); ?>
                <?php endif; ?>
            </div>
        </div>

    </section>

    <section class="location-maps">
        <h2>Our locations</h2>
        <?php if(get_field('locations')): while(has_sub_field('locations')): ?>
            <div class="wrap map-wrap">
                <?php
                    $location = get_sub_field('map');
                    $address = get_sub_field('address');
                    $title = get_sub_field('title');
                    $markerthumb = get_bloginfo('stylesheet_directory') . "/images/map-marker.png";
                    if( !empty($location) ):
                ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php echo $markerthumb; ?>">
                            <?php if ($title){ ?><p><strong><?php echo $title; ?></strong></p><?php } ?>
                            <address><span class="glyphicon glyphicon-map-marker"></span><?php echo $address; ?></address>
                            <p><a target="_blank" class="directions" href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat'] . ',' . $location['lng']; ?>"><?php _e('Get Directions','roots'); ?></a></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="destails">
                    <?php if (get_sub_field('title')): ?>
                        <h3>
                            <?php the_sub_field('title'); ?>
                            <?php if (get_sub_field('head_office')): ?>
                                <span class="office"> / <?php the_sub_field('head_office'); ?></span>
                            <?php endif; ?>
                        </h3>
                    <?php endif; ?>
                    <div class="wrap-dets">
                        <div class="one-half">
                            <?php if (get_sub_field('general_enquiries')): ?>
                                <div class="icon general">
                                    <p>
                                        General Enquiries <br><strong><?php the_sub_field('general_enquiries'); ?></strong>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('fax')): ?>
                                <div class="icon fax">
                                    <p>
                                        Fax <br><strong><?php the_sub_field('fax'); ?></strong>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('email')): ?>
                                <div class="icon email">
                                    <p>
                                        Email <br><strong><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></strong>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('address')): ?>
                                <div class="icon address">
                                    <p><strong><?php the_sub_field('address'); ?></strong></p>
                                    <p><strong><?php the_sub_field('po_box'); ?></strong></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="one-half">
                            <?php if (get_sub_field('opening_hours')): ?>
                                <div class="icon opening-hours">
                                    <p>
                                        Opening Hours <br><strong><?php the_sub_field('opening_hours'); ?></strong>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if (get_sub_field('parking_info')): ?>
                                <div class="icon parking-info">
                                    <p>
                                        <?php the_sub_field('parking_info'); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </section>

</section>

<?php get_footer(); ?>
