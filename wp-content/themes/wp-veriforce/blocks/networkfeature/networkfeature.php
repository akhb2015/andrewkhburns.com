<?php
	$alt_id = get_field('alt_id');
	$class = $block['className'] ?? null;
     $content = get_field('networkfeature_content_content');
     $image = get_field('image');
     $reverse = get_field('reverse');
?>

<div class="NETWORK-FEATURE <?=$class?>" <?=$reverse ? 'data-reverse' : null?> <?=empty($content) ? 'data-empty' : null?>>
     <div class="b-columns">
          <div class="b-column" data-width="1/2">
               <div class="image">
                    <?=image(['id' => $image])?>
               </div>
          </div>
          <div class="b-column" data-width="1/2">
               <div class="content">
                    <?=$content?>
               </div>
          </div>
	</div>
</div>
