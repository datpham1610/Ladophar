<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Vu_Ci_Co
 * @since 1.0
 * @version 1.0
 * Template Name: Front page
 */

get_header();
while(have_posts()): the_post();
?>

    <div class="banner" data-aos="fade-right">
        <div class="primaryslider swiper-container">
            <div class="swiper-wrapper">
                <?php
                $argsslider = array(
                    'posts_per_page'   => 8,
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'post_type'        => 'slider',
                    'post_status'      => 'publish',
                );
                $allslider = new WP_Query($argsslider);
                $i = [];
                if($allslider->have_posts()):while ($allslider->have_posts()):$allslider->the_post();
                array_push($i,get_the_ID());
                ?>
                <div class="item swiper-slide" >
                    <div class="sliderinner" style="background: url('<?php echo get_field("image")?>') no-repeat center center / cover">
                        <div class="item-meta">
                            <?php echo get_field('content')?>
                            <a href="javascript:;" data-toggle="modal" data-target="#slideinfo<?php echo get_the_ID()?>" class="btn btn-default button-red hidden-xs"><?php pll_e('Tìm hiểu thêm')?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; wp_reset_query();?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <?php foreach ($i as $v):?>
    <div class="modal fade popup_site" id="slideinfo<?php echo $v?>" tabindex="-1" role="dialog" aria-labelledby="slideinfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                     <?php
                     echo apply_filters('the_content',get_field('info_popup',$v));
                     ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <div class="intro-company">
        <div class="container">
            <div class="row">
                <div class="col-sm-5" data-aos="fade-left">
                    <h4 class="title">
                        <?php echo get_field('intro')['left']['title_intro']?>
                    </h4>
                    <div class="description">
                       <?php echo get_field('intro')['left']['description_intro']?>
                    </div>
                    <div class="more">
                        <a href="javascript:;" class="btn btn-default button-blue" data-toggle="modal" data-target="#intropop"><?php pll_e('Tìm hiểu thêm')?></a>
                    </div>
                </div>
                <div class="col-sm-7" data-aos="fade-right">
                    <img src="<?php echo get_field('intro')['right']['image_intro']?>" class="img-responsive margin-auto" alt="">
                </div>
            </div>
        </div>
    </div> <!--intro-company-->
    <div class="modal fade popup_site" id="intropop" tabindex="-1" role="dialog" aria-labelledby="intropop">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <?php
                    echo apply_filters('the_content',get_field('intro')['left']['popup_info']);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="quote-site">
        <div class="bg-opacity">
            <div class="container" data-aos="fade-up">
                <div class="quote-text text-center">
                    <div class="quoteimgleft"><img src="<?php echo get_template_directory_uri()?>/images/quoteleft.png" class="img-responsive" alt=""></div>
                    <?php echo get_field('quote_group')['quote'];?>
                    <div class="quoteimgright"><img src="<?php echo get_template_directory_uri()?>/images/quoteright.png" class="img-responsive" alt=""></div>
                </div>
            </div>
        </div>
    </div><!--quote-site-->
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-sm-4" data-aos="fade-left">
                    <h4 class="title">
                        <?php echo get_field('services_group')['left_content']['title_service']?>
                    </h4>
                    <div class="service-description">
                        <?php echo get_field('services_group')['left_content']['description_service']?>
                    </div>
                    <a href="<?php echo get_field('services_group')['left_content']['link_service']['url']?>" class="btn btn-default button-blue hidden-xs"><?php pll_e('Tìm hiểu thêm')?></a>
                </div>
                <div class="col-sm-8" data-aos="fade-right">
                    <div class="service-wrap">
                        <div class="row">
                            <?php
                            $service = array(
                                'posts_per_page'   => 10,
                                'offset'           => 0,
                                'post_type'        => 'service',
                                'post_status'      => 'publish',
                            );
                            $all_service = new WP_Query($service);
                            if($all_service->have_posts()):while ($all_service->have_posts()): $all_service->the_post();
                            ?>
                            <div class="col-sm-6">
                                <div class="item-service">
                                    <figure>
                                        <img src="<?php echo get_field('icon')?>" class="img-responsive" alt="<?php the_title()?>">
                                    </figure>
                                    <div class="content">
                                        <?php the_excerpt();?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_query();?>

                        </div>
                        <div class="visible-xs">
                            <a href="<?php echo get_field('services_group')['left_content']['link_service']['url']?>" class="btn btn-default button-blue"><?php pll_e("Tìm hiểu thêm")?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--service-->

    <div class="project">
        <div class="container">
            <div class="row">
                <div class="col-sm-9" data-aos="fade-left">
                    <h4 class="title">
                        <?php echo get_field('project_box')['title_project']?>
                    </h4>
                    <div class="project-description">
                        <?php echo get_field('project_box')['project_description']?>
                    </div>
                </div>
                <div class="col-sm-3 hidden-xs" data-aos="fade-right">
                    <a href="<?php echo get_field('project_box')['url_readmore_project']?>" class="btn btn-default button-red"><?php pll_e("Xem thêm dự án")?></a>
                </div>
            </div>
            <div class="project-wrap" data-aos="fade-up">
                <div class="row">
                    <?php $argsproj = array(
                        'posts_per_page'   => 3,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'project',
                        'post_status'      => 'publish',
                    );
                    $allproject = new WP_Query($argsproj);
                    if($allproject->have_posts()):while ($allproject->have_posts()):$allproject->the_post();
                    ?>
                    <div class="col-sm-4">
                        <div class="project-item shine">
                            <a href="<?php the_permalink()?>">
                                <figure>
                                    <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'))?>
                                </figure>
                            </a>
                            <div class="meta-project">
                                <a href="<?php the_permalink()?>">
                                    <div class="title-project">
                                        <?php the_title()?>
                                    </div>
                                </a>
                                <div class="date-project">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_field('date')?>
                                </div>
                                <div class="location-project">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo get_field('position')?>
                                </div>
                                <div class="excerpt-project">
                                    <?php the_excerpt();?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; endif; wp_reset_postdata();?>
                </div>
            </div>
            <div class="visible-xs text-center">
                <a href="<?php echo get_field('url_readmore_project')?>" class="btn btn-default button-red"><?php pll_e('Xem thêm dự án')?></a>
            </div>
        </div>
    </div><!--project-->
    <?php if(get_field('partner_box')['slider_partner']==true):?>
    <div class="partner">
        <div class="container">
            <h4 class="title" data-aos="fade-left">
                <?php echo get_field('partner_box')['title_slider_partner'];?>
            </h4>
            <div class="sidewrap" data-aos="fade-up">
                <div class="slider-partner owl-carousel owl-theme">
                    <?php
                     $argspart = array(
                        'posts_per_page'   => 10,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'partner',
                        'post_status'      => 'publish',
                    );
                    $allpartner = new WP_Query($argspart);
                    $i = 1;
                    if($allpartner->have_posts()):while ($allpartner->have_posts()):$allpartner->the_post();
                    ?>
                    <div class="item lineimg">
                        <a href="javascript:void(0);" class="show_pn_pop" data-toggle="modal" data-idpost="<?php the_ID();?>" data-target="#partner_popup">
                            <figure>
                                <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'))?>
                                <figcaption></figcaption>
                            </figure>
                            <?php
                            if($i==$allpartner->post_count){
                                echo '<div id="stop_partner" class="hidden" data-idstop="'.get_the_ID().'"></div>';
                            }
                            ?>
                        </a>
                    </div>
                    <?php $i++;
                    endwhile; endif; wp_reset_query();?>
                </div>
            </div>
        </div>
    </div><!--partner-->
    <div class="modal fade popup_site" id="partner_popup" tabindex="-1" role="dialog" aria-labelledby="partner_popup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="nav_partner">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <div class="contentajax"></div>
                </div>

            </div>
        </div>
    </div>
<?php
    else: echo '<div class="space"></div>';
    endif;?>
    <div class="message-site">
        <div class="container">
            <div class="title text-center" data-aos="fade-left">
                <?php echo get_field('message_box')['title-message']?>
            </div>
            <div class="message-content"  data-aos="fade-right">
                <div class="row flexwrap margin-0">
                    <div class="col-sm-1 flexcell padding-0 cell-one">
                        <div class="flexcontent"></div>
                    </div>
                    <div class="col-sm-3 flexcell padding-0 cell-two">
                        <div class="flexcontent shine">
                            <figure>
                                <img src="<?php echo get_field('message_box')['content_message']['content_left']['image'];?>" class="img-responsive" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-8 flexcell padding-0 cell-three">
                        <div class="flexcontent">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h5 class="seo-name"><?php echo get_field('message_box')['content_message']['content_right']['person_name']?></h5>
                                    <div class="position"><?php echo get_field('message_box')['content_message']['content_right']['position']?> </div>
                                    <div class="message-text">
                                        <?php echo get_field('message_box')['content_message']['content_right']['message']?>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--message-site-->
    <div class="statistic" id="scroll-to">
        <div class="bg-opacity">
            <div class="container"  data-aos="fade-up">
                <div class="row flexwrap">
                    <div class="col-sm-3 col-xs-6">
                        <div class="item-statistic flexcontent">
                            <div class="number-statistic">
                                <span class="counter" data-count="<?php echo get_field('statistic_box')['column1']['first_number']?>"></span><?php echo (get_field('statistic_box')['column1']['number_type1']==0)? '%': '';?>
                            </div>
                            <div class="short-title"><?php echo get_field('statistic_box')['column1']['description_for_first_number']?></div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="item-statistic flexcontent">
                            <div class="number-statistic">
                                <span class="counter" data-count="<?php echo get_field('statistic_box')['column2']['second_number']?>"></span><?php echo (get_field('statistic_box')['column2']['number_type2']==0)? '%': '';?>
                            </div>
                            <div class="short-title"><?php echo get_field('statistic_box')['column2']['description_for_second_number']?></div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="item-statistic flexcontent">
                            <div class="number-statistic">
                                <span class="counter" data-count="<?php echo get_field('statistic_box')['column3']['third_number']?>"></span><?php echo (get_field('statistic_box')['column3']['number_type3']==0)? '%': '';?>
                            </div>
                            <div class="short-title"><?php echo get_field('statistic_box')['column3']['description_for_third_number']?></div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="item-statistic flexcontent">
                            <div class="number-statistic">
                                <span class="counter" data-count="<?php echo get_field('statistic_box')['column4']['fourth_number']?>"></span><?php echo (get_field('statistic_box')['column4']['number_type4']==0)? '%': '';?>
                            </div>
                            <div class="short-title"><?php echo get_field('statistic_box')['column4']['description_for_fourth_number']?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--statistic-->
    <div class="news-events">
        <div class="container">
            <h4 class="title text-center"  data-aos="fade-right"><?php echo get_field('news_&_events_box')['title']?></h4>
            <div class="slidewrap"  data-aos="fade-up">
                <div class="slide-post owl-carousel owl-theme">
                <?php $argspost = array(
                    'posts_per_page'   => 10,
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                );
                $allpost = new WP_Query($argspost);
                if($allpost->have_posts()):while ($allpost->have_posts()):$allpost->the_post();
                    ?>

                    <div class="item shine">
                        <a href="<?php the_permalink()?>">
                            <figure>
                               <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'))?>
                            </figure>
                        </a>
                        <div class="postmeta">
                            <div class="cate-post">
                                <?php echo get_the_terms( get_the_ID(), 'category' )[0]->name; ?>
                            </div>
                            <div class="title-post">
                                <a href="<?php the_permalink()?>">
                                    <?php the_title()?>
                                </a>
                            </div>
                            <div class="date-post">
                                <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date();?>
                            </div>
                            <div class="excerpt-post">
                                <?php the_excerpt()?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div><!--news-events-->
<?php
    endwhile; wp_reset_postdata();
    get_footer();
