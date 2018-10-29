<?php
}

add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php 
function Kontol_MyAnimeList_API(){
	wp_enqueue_script("myanimelist", "/js/myanimelist.js", null, null, true);
}
function Kontol_Meta_Box( $meta_boxes ) {
	$prefix = "meta_mal_";

	$meta_boxes[] = array(
		"id" => "kontol_meta_box",
		"title" => esc_html__( "Information Anime", "kontol" ),
		"post_types" => array( "post" ),
		"context" => "advanced",
		"priority" => "high",
		"autosave" => true,
		"fields" => array(
			array(
				"id" => "alternative-titles",
				"type" => "heading",
				"name" => esc_html__( "Alternative Titles", "kontol" ),
			),
			array(
				"id" => $prefix . "english",
				"type" => "text",
				"name" => esc_html__( "English", "kontol" ),
			),
			array(
				"id" => $prefix . "japanese",
				"type" => "text",
				"name" => esc_html__( "Japanese", "kontol" ),
			),
			array(
				"id" => $prefix . "synonyms",
				"type" => "text",
				"name" => esc_html__( "Synonyms", "shirozare" ),
			),
			array(
				"id" => "information",
				"type" => "heading",
				"name" => esc_html__( "Information", "kontol" ),
			),
			array(
				"id" => $prefix . "episodes",
				"type" => "text",
				"name" => esc_html__( "Episodes", "kontol" ),
			),
			array(
				"id" => $prefix . "status",
				"type" => "text",
				"name" => esc_html__( "Status", "kontol" ),
			),
			array(
				"id" => $prefix . "aired",
				"type" => "text",
				"name" => esc_html__( "Aired", "kontol" ),
			),
			array(
				"id" => $prefix . "broadcast",
				"type" => "text",
				"name" => esc_html__( "Broadcast", "kontol" ),
			),
			array(
				"id" => $prefix . "type",
				"type" => "text",
				"name" => esc_html__( "Type", "kontol" ),
			),
			array(
				"id" => $prefix . "licensors",
				"type" => "text",
				"name" => esc_html__( "Licensors", "kontol" ),
			),
			array(
				"id" => $prefix . "studios",
				"type" => "text",
				"name" => esc_html__( "Studios", "kontol" ),
			),
			array(
				"id" => $prefix . "premiered",
				"type" => "text",
				"name" => esc_html__( "Premiered", "kontol" ),
			),
			array(
				"id" => $prefix . "source",
				"type" => "text",
				"name" => esc_html__( "Source", "kontol" ),
			),
			array(
				"id" => $prefix . "duration",
				"type" => "text",
				"name" => esc_html__( "Duration", "kontol" ),
			),
			array(
				"id" => $prefix . "rating",
				"type" => "text",
				"name" => esc_html__( "Rating", "kontol" ),
			),
			array(
				"id" => "statistics",
				"type" => "heading",
				"name" => esc_html__( "Statistics", "kontol" ),
			),
			array(
				"id" => $prefix . "score",
				"type" => "text",
				"name" => esc_html__( "Score", "kontol" ),
			),
			array(
				"id" => $prefix . "ranked",
				"type" => "text",
				"name" => esc_html__( "Ranked", "kontol" ),
			),
			array(
				"id" => $prefix . "popularity",
				"type" => "text",
				"name" => esc_html__( "Popularity", "kontol" ),
			),
			array(
				"id" => $prefix . "dlbatch",
				"name" => esc_html__( "Download", "kontol" ),
				"type" => "wysiwyg",
			),
		),
	);

	return $meta_boxes;
}
function MyAnimeList_API_Meta_Box($post){
?>
<div class="rwmb-meta-box">
	<div class="rwmb-field rwmb-text-wrapper">
		<div class="rwmb-label">
			<label for="meta_mal_myanimelist-api">Myanimelist Link</label>		
		</div>
		<div class="rwmb-input ui-shortable">
			<div class="rwmb-clone rwmb-text-clone">
				<input size="30" type="text" id="meta_mal_myanimelist-api" class="rwmb-text " name="meta_mal_myanimelist-api"/>
			</div>
			<a class="button-primary" id="meta_mal_myanimelist-api-generate">Generate</a>
		</div>
	</div>
</div>
<?php
add_action("after_setup_theme", "Kontol_Setup");
function MyAnimeList_API_Add_Meta_Box(){
	add_meta_box(
		"MyAnimeList-API",
		__("MyAnimeList API", "kontol"),
		"MyAnimeList_API_Meta_Box",
		"post",
		"normal",
		"default"
	);
}