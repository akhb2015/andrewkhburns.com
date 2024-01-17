<?php
	/* Template Name: Find an Instructor */
	get_header();

	$filterItems = getMapFilterItems();
	$courses = $filterItems['courses'];
	$types = $filterItems['type'];
	$langs = $filterItems['langs'];
	$distance = $filterItems['distance'];
?>


<section class="b-section INSTRUCTOR-MAP">
	<div class="instructor-map-container">
    <div class="filter-box">
        <div class="filter-box--map-box">
            <div id="instructor-map" class="filter-box--map"></div>
            <div id="js-mpr" class="filter-box--map-preloader">
                <div class="mpr">
                    <div class="mpr--point-box mpr--point-box__first">
                        <div class="mpr--point mpr--point__first"></div>
                    </div><!-- .mpr--point-box -->
                    <div class="mpr--point-box mpr--point-box__second">
                        <div class="mpr--point mpr--point__second"></div>
                    </div>
                    <div class="mpr--point-box mpr--point-box__third">
                        <div class="mpr--point mpr--point__third"></div>
                    </div>
                    <div class="mpr--point-box mpr--point-box__fourth">
                        <div class="mpr--point mpr--point__fourth"></div>
                    </div>
                </div><!-- .mpr -->
            </div><!-- .fjs-mpr -->
        </div><!-- .filter-box -->

        <div class="filter-box--filter filter">
            <div class="filter--close-mob">
              <span>Filters</span>
              <button id="js-filter-close"></button>
            </div>
            <button id="js-filter-call" class="hidded hide filter--call-mobile"></button>
            <div id="js-filter-scroll" class="filter--items-scroll">
              <div class="filter--items">
                <span class="filter--title filter--title__items">Filters</span>
                <div class="filter--item f-item">
                  <div class="f-item--call">
                    <span class="filter--item-name f-item--name">Courses</span>
                    <div class="filter--item-arrow f-item--arrow"></div>
                  </div>
                  <div class="filter--variables variables variables__courses">
                    <div class="variables--scroll-hide">
                      <div class="variables--scroll">
                        <?php foreach ($courses as $key => $cours) : ?>
                          <?php $key = strtolower($key);?>
                          <div class="variables--item">
                            <label class="variables--label" for="<?php echo "course-$key"?>">
                              <input data-param="courses" data-val="<?php echo $key?>" class="js-filter-param" id="<?php echo "course-$key"?>" type="checkbox">
                              <span class="variables--checkbox"></span>
                              <img class="variables--logo" src="<?php echo $cours['logo']?>" alt="">
                              <span class="variables--name"><?php echo $cours['name'];?></span>
                            </label>
                          </div>
                        <?php endforeach;?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="filter--item f-item">
                  <div class="f-item--call">
                    <span class="filter--item-name f-item--name">Training Type</span>
                    <div class="filter--item-arrow f-item--arrow"></div>
                  </div>
                  <div class="filter--variables variables">
                    <?php foreach ($types as $key => $type) : ?>
                      <div class="variables--item">
                        <label class="variables--label" for="<?php echo "type-$key"?>">
                          <input data-param="types" data-val="<?php echo $key?>" class="js-filter-param" id="<?php echo "type-$key"?>" type="checkbox">
                          <span class="variables--checkbox"></span>
                          <span class="variables--name"><?php echo $type;?></span>
                        </label>
                      </div>
                    <?php endforeach;?>
                  </div>
                </div>
                <div class="filter--item f-item">
                  <div class="f-item--call">
                    <span class="filter--item-name f-item--name">Distance</span>
                    <div class="filter--item-arrow f-item--arrow"></div>
                  </div>
                  <div class="js-distance filter--variables">
                    <?php foreach ($distance as $key => $dist) : ?>
                      <div class="variables--item variables--item__select <?php if($key == '50') echo 'selected '?>js-filter-param" data-param="distance" data-val="<?php echo $key?>">
                        <span class="variables--name"><?php echo $dist;?></span>
                      </div>
                    <?php endforeach;?>
                  </div>
                </div>
                <div class="filter--item f-item">
                  <div class="f-item--call">
                    <span class="filter--item-name f-item--name">Language</span>
                    <div class="filter--item-arrow f-item--arrow"></div>
                  </div>
                  <div class="filter--variables variables">
                    <?php foreach ($langs as $key => $lang) : ?>
                      <?php $key = strtolower($key);?>
                      <div class="variables--item">
                        <label class="variables--label" for="<?php echo "lang-$key"?>">
                          <input data-param="languages" class="js-filter-param" data-val="<?php echo $key?>" id="<?php echo "lang-$key"?>" type="checkbox">
                          <span class="variables--checkbox"></span>
                          <span class="variables--name"><?php echo $lang['name'];?></span>
                        </label>
                      </div>
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="filter--controls">
              <span id="js-count-results" class="filter--title"></span>
              <button class="filter--btn filter--btn__apply" id="js-apply-filter" type="button">Apply</button>
              <button class="filter--btn filter--btn__reset" id="js-reset-filter" type="button">
                Reset
                <div id="js-res-preload" class="res-preload">
                  <div class="res-preload--wrapper">
                    <div class="res-preload--item"></div>
                    <div class="res-preload--item"></div>
                    <div class="res-preload--item"></div>
                    <div class="res-preload--item"></div>
                  </div>
                </div>
              </button>
            </div>
          </div>
        </div>

        <div class="result-box">
          <div class="result-box--search">
            <div class="title">
              <h1>Instructor Map</h1>
            </div>
            <div class="map-search">
              <input id="map-input" class="map-search--input" placeholder="Enter City, State, or Zip code…" type="text">
              <button class="map-search--submit"></button>
            </div>
          </div>
          <div id="js-result-scroll-box" class="result-box--scroll-box">
            <div class="result-box--results" id="js-result-box"></div>
          </div>
          <div id='js-result-plaseholder' class="result-box--placeholder r-placeholder">
            <div class="r-placeholder--image"></div>
            <div class="r-placeholder--text">
              <p>Enter your location and apply filters to see more results near you.</p>
            </div>
          </div>
          <button id="js-toggle-map-list" class="hidded hide result-box--map-list-toggle result-box--map-list-toggle__list">List</button>
        </div>
      </div>
</section>



<script>
    var myajax = "/wp-admin/admin-ajax.php";
    var clusterUrls = [
        "<?=get_template_directory_uri() . '/templates/instructor-map/images/cluster_1.png'?>",
        "<?=get_template_directory_uri() . '/templates/instructor-map/images/cluster_2.png'?>",
        "<?=get_template_directory_uri() . '/templates/instructor-map/images/cluster_3.png'?>",
        "<?=get_template_directory_uri() . '/templates/instructor-map/images/cluster_4.png'?>",
        "<?=get_template_directory_uri() . '/templates/instructor-map/images/cluster_5.png'?>"
    ];
</script>



<style>
  .b-page-body {position: relative; z-index: 9;}
</style>



<?php get_footer(); ?>
