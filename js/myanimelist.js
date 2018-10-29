jQuery("#meta_mal_myanimelist-api-generate").on("click", function(){
	if(jQuery("#meta_mal_myanimelist-api").val().length > 0){
		jQuery.getJSON("/inc/api.php", {
			url: jQuery("#meta_mal_myanimelist-api").val()
		}, function(data){
			jQuery("#remote_thumb").val(data["image"]);
			jQuery("#new-tag-genre").val(data["genres"]);
			jQuery("#new-tag-seasons").val(data["premiered"]);
			jQuery("#new-tag-producer").val(data["producers"]);
			jQuery(".wp-editor-area#content").val(data["synopsis"]);
			jQuery("input[name=\"post_title\"]#title").val(data["title"]);
			jQuery.each(data, function(key, value){
				if(jQuery("#meta_mal_" + key).length > 0){
					jQuery("#meta_mal_" + key).val(value);
				}else if(jQuery("#new-tag-" + key).length > 0){
					jQuery("#new-tag-" + key).val(value);
				}
			});
		});
	}
});