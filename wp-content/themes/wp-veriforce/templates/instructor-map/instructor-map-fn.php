<?php

// ADD TEMPLATE

add_filter('theme_page_templates', function($templates) {
	$templates['templates/instructor-map/instructor-map.php'] = 'Find an Instructor';
	return $templates;
});



// ENQUEUE STYLES & SCRIPTS

add_action('wp_enqueue_scripts', function() {
	if (is_page_template('templates/instructor-map/instructor-map.php')) {
		wp_enqueue_style('template-instructor-map', get_template_directory_uri().'/templates/instructor-map/instructor-map.css', null, null);
		wp_enqueue_script('marker-cluster', 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js', null, null, true);
		wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAUxpJv4ucPxHbMRj0MDndn0HQ-KhK_D4o&libraries=places', null, null, true);
		wp_enqueue_script('template-instructor-map', get_template_directory_uri().'/templates/instructor-map/instructor-map.js', ['jquery'], null, true);
	}
});



// HIDE BLOCK EDITOR

add_action('admin_footer', function() {
	$id = sanitize_key($_GET['post'] ?? null);
	$template = get_post_meta($id, '_wp_page_template', true);
	if ($template == 'templates/instructor-map/instructor-map.php') {
		?><script>
			document.getElementById('editor').classList.add('block-editor-hidden');
		</script><?php
	}
});



// ADD ACF FIELDS

add_action('acf/init', function() {
	acf_add_local_field_group([
		'key' => 'group_instructor_map',
		'title' => 'Find an Instructor',
		'fields' => [[
			// 'key' => 'field_instructor_map_content',
			// 'label' => 'Content',
			// 'name' => 'content',
			// 'type' => 'wysiwyg',
		]],
		'location' => [[[
			'param' => 'page_template',
			'operator' => '==',
			'value' => 'templates/instructor-map/instructor-map.php',
		]]]
	]);
});



// CUSTOM FUNCTIONS

$apiBaseUrl = 'https://pecdata.com/public/api/v1/TrainingProviderLocations';
$pages = [];
$totalCount = '';
$other =
[
    'langs' => [
        'C9888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
            'name' => 'English',
            'code' => 'en'
        ],
        'CA888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
            'name' => 'Spanish',
            'code' => 'sp'
        ],
        'CB888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
            'name' => 'French',
            'code' => 'fr'
        ],
        'CC888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
            'name' => 'Vietnamese',
            'code' => 'vi'
        ]
    ],
    'type' => [
        'IsMobileInstructor' => 'Mobile Instructor',
        'IsFacility' => 'Training Facility'
    ],
    'distance' => [
        '50' => '50 miles',
        '100' => '100 miles',
        '200' => '200 miles',
        '500' => '500 miles'
    ]
];

$mapCourses = [
    'AB888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
        'name' => 'Basic Orientation',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-basic.svg"
    ],
    'C7888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
        'name' => 'Basic Pipeline',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-basic-pipeline.svg"
    ],
    'AC888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
        'name' => 'Core Compliance',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-core.svg"
    ],
    'BC888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
        'name' => 'H2S Clear for Energy',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-h2s.svg"
    ],
    'C819E59A-3B34-ED11-AAB5-12536B009A45' => [
        'name' => 'NORM/TENORM Awareness',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-norm.svg"
    ],
	'18A2EB16-85E3-ED11-AAB5-12536B009A45' => [
        'name' => 'Permit-Required Confined Space',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-confined-space.svg"
    ],
    'B1E2D3F4-318D-ED11-AAB5-12536B009A45' => [
        'name' => 'Respiratory Protection Training',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-respiratory-protection-training.svg"
    ],
    'C2888B8F-D81D-E911-8620-BFBCD02DFBAB' => [
        'name' => 'Safe Construction',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-safe-construction.svg"
    ],
    '5F92ECA9-B16D-E911-AA24-9FC974BEBF17' => [
        'name' => 'Safe Supervisor',
        'logo' => get_template_directory_uri() . "/templates/instructor-map/images/icon-course-safe-supervisor.svg"
    ]
];

if(!function_exists('getMapFilterItems'))
{
    function getMapFilterItems() {
        global $mapCourses;
        global $other;

        $items = array(
            'courses' => $mapCourses,
            'type' => $other['type'],
            'distance' => $other['distance'],
            'langs' => $other['langs']
        );
        return $items;
    }
}

if(!function_exists('mapApiResquest'))
{
    add_action('wp_ajax_api_request', 'mapApiResquest');
    add_action('wp_ajax_nopriv_api_request', 'mapApiResquest');

    function mapApiResquest() {
        global $mapCourses;
        global $other;

        $query = $_GET['query'];
        $point = $_GET['point'];

        $result = sendRequestToApi($query);

        $sortedPages = sortResults($result['pages'], $point);

        $poitns = array();

        ob_start();
        foreach ($sortedPages as $page) :
    ?>
    <div class="result-box--page hidden">
    <?php  foreach ($page as $item) :
        $points[] = array(
            'id' => $item->id,
            'lat' => $item->latitude,
            'lng' => $item->longitude,
            'tooltip' => array(
            'type' => 'Training center',
            'name' => $item->primaryContact->name,
            'description' => $item->description,
            )
        );
        end($points);
        ?>
        <div data-modal-id="<?php echo $item->id;?>" class="js-call-modal result-box--item">
            <div class="result-box--header">
            <span class="result-box--name"><?php echo strtolower($item->trainingProviderName); ?></span>
            <div class="result-box--lang rb-lang <?php if(count($item->languageIds) === 1) echo "once"; ?>">
                <span><?php echo $other['langs'][strtoupper($item->languageIds[0])]['code']?></span>
                <?php if(count($item->languageIds) > 1) : ?>
                <div class="rb-lang--langs">
                <?php for ($i = 1; $i < count($item->languageIds); $i++) : ?>
                    <?php $id = strtoupper($item->languageIds[$i])?>
                    <span><?php echo $other['langs'][$id]['code']?></span>
                <?php endfor;?>
                </div>
                <?php endif;?>
            </div>
            </div>
            <div class="result-box--type">
            <span><?php echo $item->primaryContact->name;?></span>
            </div>
            <div class="result-box--contact">
            <span class="result-box--address">
                <?php echo $item->address->streetAddress1 . ', ' . $item->address->city . ', ' . $item->address->state . ', ' . $item->address->zip;?>
            </span>
            <span class="result-box--phone">
                <?php echo $item->primaryContact->phone; ?>
            </span>
            </div>
            <div class="result-box--courses">
            <span>courses</span>
            <?php foreach ($item->certificationIds as $id) : ?>
                <?php $id = strtoupper($id);?>
                <div class="result-box--certificat">
                <img id="<?php echo $id;?>" src="<?php echo $mapCourses[$id]['logo'];?>" alt="">
                <div class="result-box--tooltip">
                    <span><?php echo $mapCourses[$id]['name'];?></span>
                </div>
                </div>
            <?php endforeach;?>
            </div>
            <button class="result-box--call-btn"></button>
            <div data-modal-id="<?php echo $item->id;?>" class="map-modal js-map-modal">
            <button class="map-modal--close js-map-modal-close"></button>
            <div class="map-modal--row">
                <span class="map-modal--name"><?php echo strtolower($item->trainingProviderName);?></span>
                <span class="map-modal--type"><?php echo $item->primaryContact->name;?></span>
            </div>
            <div class="map-modal--row">
                <?php if($item->primaryContact->phone !== "") : ?>
                <div class="map-modal--contacts map-modal--contacts__phone">
                <span><?php echo $item->primaryContact->phone; ?></span>
                </div>
                <?php endif;?>
                <?php if($item->primaryContact->email !== "") : ?>
                <div class="map-modal--contacts map-modal--contacts__email">
                <span><?php echo $item->primaryContact->email; ?></span>
                </div>
                <?php endif;?>
                <div class="map-modal--contacts map-modal--contacts__address">
                <span><?php echo $item->address->streetAddress1 . ', ' . $item->address->city . ', ' . $item->address->state . ', ' . $item->address->zip;?></span>
                </div>
            </div>
            <div class="map-modal--row">
                <div class="map-modal--info">
                <?php
                    echo '<span>languages</span>';
                    foreach($item->languageIds as $id) :
                        $id = strtoupper($id);
                        echo '<span class="map-modal--lang">'.$other['langs'][$id]['name'].'</span>';
                    endforeach;
                ?>
                </div>
                <div class="map-modal--info map-modal--info__certificates">
                <?php
                    echo '<span>Courses</span>';
                    foreach($item->certificationIds as $id) :
                        $id = strtoupper($id);
                        echo '<div class="map-modal--certificat">';
                            echo '<img src="'.$mapCourses[$id]['logo'].'" alt="">';
                            echo '<div class="map-modal--tooltip">';
                                echo '<span>'.$mapCourses[$id]['name'].'</span>';
                            echo '</div>';
                        echo '</div>';
                    endforeach;
                ?>
                </div>
            </div>
                <div class="map-modal--row">
                    <p class="map-modal--description"><?php echo $item->description?></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        </div>
    <?php
        endforeach;
        $html = ob_get_contents();
        ob_clean();
        $result['html'] = $html;
        $result['points'] = $points;
        echo json_encode($result);
        wp_die();
    }
}

if(!function_exists('sendRequestToApi'))
{
    function sendRequestToApi($query, $page = 1) {
        // global vars
        global $apiBaseUrl;
        global $pages;
        global $totalCount;
        // query to api
        $url = "$apiBaseUrl$query&Page=$page";
        $result = wp_remote_get($url, ['timeout' => 120, 'httpversion' => '1.1']);
        $pages[] = json_decode($result['body']);
        // check pagination
        $pagination = json_decode($result['headers']['x-pagination']);
        $page = $page + 1;
        if($pagination->CurrentPage < $pagination->TotalPages) {
            return sendRequestToApi($query, $page);
        } else return [
            'pages' => $pages,
            'totalResults' => $pagination->TotalCount,
        ];
    }
}

if(!function_exists('sortResults'))
{
    function sortResults($pages, $point) {
        $point = [(float) $point[0], (float) $point[1]];
        $pages = call_user_func_array('array_merge', $pages);
        foreach ($pages as $page) :
            $page->dist = getPointsDistanse($page, $point);
        endforeach;
        usort($pages, function($point1, $point2) {
            if($point1->dist === $point2->dist) return 0;
            return ($point1->dist < $point2->dist) ? -1 : 1;
        });
        $pages = array_chunk($pages, 50);
        return $pages;
    }
}

if(!function_exists('getPointsDistanse'))
{
    function getPointsDistanse($point1, $point2) {
        $xdef = $point1->latitude - $point2[0];
        $ydef = $point1->longitude - $point2[1];
        return sqrt( pow($xdef, 2) + pow($ydef, 2) );
    }
}

?>
