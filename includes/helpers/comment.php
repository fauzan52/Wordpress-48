<?php

if ( ! function_exists( 'get_comment_system' ) ) {
	function get_comment_system($comment_system, $is_head = false ) {
		global $wp;

//		$comment_system = anioptions( 'comment-system' );
		if ( $comment_system === 'disqus' && !$is_head) {
			$disqus = fauzanoptions( 'comment-system-disqus' );
			?>
			<div id="disqus_thread"></div>
			<script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
				var disqus_config = function () {
				this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
                (function () { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://<?= $disqus ?>.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();// Disqus theme switching
                document.addEventListener('themeChanged', function (e) {
                    if (document.readyState === 'complete') {
                        DISQUS.reset({reload: true, config: disqus_config});
                    }
                });
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
					by Disqus.</a></noscript

		<?php }
		if ($comment_system === 'facebook' && $is_head){?>
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous"
			        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=<?= fauzanoptions( 'comment-facebook-app-id' )?>&autoLogAppEvents=1"
			        nonce="mw5oDJnC"></script>
			<?php
		}

		if ($comment_system === 'facebook' && !$is_head){?>
			<div class="fb-comments" data-href="<?= home_url( $wp->request ) ?>"
			     data-colorscheme="<?= is_darkmode() ? 'dark' : 'light'?>"
			     data-width="100%" data-numposts="<?= fauzanoptions( 'comment-facebook-showing-comment' )?>"></div>
			<?php
		}
	}
}