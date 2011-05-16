<? $this->displayView('components/header.php'); ?>
			<div class="content" style="width: 960px;">
				<div id="MotivadoPlayer">
					<p>
						To view this page ensure that Adobe Flash Player version 10.0.0 or greater is installed.
					</p>
					<script type="text/javascript">
						document.write('<a href="http://www.adobe.com/go/getflashplayer"><img src="' + ((document.location.protocol == 'https:') ? 'https://' :   'http://') + 'www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a>');
					</script>
				</div>
				<div id="InteractionResults" style="padding: 12px;">
					
				</div>
				<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
				<script type="text/javascript" src="http://jquery.thewikies.com/swfobject/jquery.swfobject.1-1-1.min.js"></script>
				<script type="text/javascript">
				function MotivadoPlayer(config) {
					if (config.product == undefined || config.baseServiceUrl == undefined) {
						return alert('Missing required parameters!');
					}
					
					jQuery('#' + (config.element || 'MotivadoPlayer')).flash({
						swf: (config.basePlayerUrl || config.baseServiceUrl + 'player/') + (config.player || 'MotivadoPlayer.swf'),
						width: config.width || 960,
						height: config.height || 350,
						flashvars: {
							product: config.product,
							baseServiceUrl: config.baseServiceUrl,
							baseVideoUrl: config.baseVideoUrl || config.baseServiceUrl + 'videos/',
							autoPlay: config.autoPlay || 'true',
							debugMode: config.debugMode || 'false'
						}
					});
				}
				
				jQuery(document).ready(function() {
					MotivadoPlayer({
						baseServiceUrl: 'http://tutodo.de/ui/',
						baseVideoUrl: 'http://motivado.de/videos/',
						basePlayerUrl: 'http://tutodo.de/player/',
						player: 'CoachingPlayer.swf',
						product: '<? echo $product; ?>',
						debugMode: 'true'
					});
				});
				
				jQuery.getJSON('http://tutodo.de/ui/getInteractionResults', function(data) {alert(data);
					var items = [];
					jQuery.each(data, function(key, value) {
						items.push('<dt>' + key + '</dt><dd>' + value + '</dd>');
					});
					jQuery('<dl/>', {
						html: items.join('')
					}).appendTo('#InteractionResults');
				});
				</script>
			</div>
<? $this->displayView('components/footer.php'); ?>