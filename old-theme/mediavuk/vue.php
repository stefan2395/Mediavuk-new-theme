	
<!-- 
Template Name: Vue Template

 -->


<?php

get_header();
?>


	<?php
		while ( have_posts() ) :
			the_post();?>




<!-- ##################### BODY PAGE ##################### -->
	

<div id="main">
	
	<div id="app">
		
			
		
		<div class="post-wrapper">
			
			<template v-for="post in posts">
				<div class="post">
					<h2 class="post-title" v-html="post.title.rendered"></h2>
				
						<img :src="post.acf._thumbnail_id['url']" />

					    <div class="excerpt" v-if="post.acf.excerpt" v-html="post.acf.excerpt"></div>
					
						<a class="button read-more" :href="post.link">Read More &raquo;</a>
					
				</div>
			</template>
		</div>
	</div>
	

<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<script>
	
var apiURL = 'https://www.inko-versand.de/mediavuk/blog/wp-json/wp/v2/posts/?_embed&per_page=3&author='

/**
 * Posts demo with ability to change author
 */

var posts = new Vue({

	el: '#app',

	data: {
		authors: ['1'],
		currentAuthor: '1',
		posts: null
	},

	created: function() {
		this.fetchData()
	},

	watch: {
		currentAuthor: 'fetchData'
	},

	methods: {
		fetchData: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', apiURL + self.currentAuthor)
			xhr.onload = function() {
				self.posts = JSON.parse(xhr.responseText)
				console.log(self.posts[0].link)
			}
			xhr.send()
		}
	}
})
</script>
		<?php	

		endwhile; // End of the loop.
		?>


<?php

get_footer();


