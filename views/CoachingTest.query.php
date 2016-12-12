<? $this->displayView('components/header.php', array('title' => $product)); ?>
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
					<table>
						<tr>
							<td>
								<? echo $this->localize('Loading Interaction Results...'); ?>

							</td>
						</tr>
					</table>
				</div>
			</div>
<script type="text/javascript" src="<? echo $this->getApplication()->getConfiguration('baseUrl'); ?>js/jquery.swfobject.1-1-1.min.js"></script>
<script type="text/javascript">
function MotivadoPlayer(config) {
	if (config.product == undefined || config.baseServiceUrl == undefined) {
		return alert('Missing required parameters!');
	}
	
	jQuery('#' + (config.element || 'MotivadoPlayer')).flash({
		swf: (config.basePlayerUrl || config.baseServiceUrl + 'player/') + (config.player || 'CoachingPlayer.swf'),
		width: config.width || 960,
		height: config.height || 350,
		flashvars: {
			product: config.product,
			baseServiceUrl: config.baseServiceUrl,
			baseVideoUrl: config.baseVideoUrl || config.baseServiceUrl + 'videos/',
			baseAssetUrl: config.baseAssetUrl || config.baseServiceUrl + 'player/assets/',
			autoPlay: config.autoPlay || 'true',
			debugMode: config.debugMode || 'false'
		}
	});
}

function formatData(data) {
	var items = [];
	jQuery.each(data, function(key, object) {
		var item = '<tr class="broad"><td>';
		item += typeof key == 'number' ? key + 1 : key;
		item += '</td>';
		if (typeof object.data != 'undefined') {
			item += '<td style="width: 75%;"><table style="width: 100%;"><thead class="head"><tr>';
			item += '<th style="width: 50%;"><? echo $this->localize('Data'); ?></th>';
			item += '<th><? echo $this->localize('Value'); ?></th>';
			item += '</thead><tbody class="body"><tr><td>';
			item += typeof object.data == 'object' ? formatData(object.data) : object.data;
			item += '</td><td>';
			item += object.value;
			item += '</td></tr></tbody></table>';
		} else {
			item += '<td>';
			item += typeof object == 'object' ? formatData(object) : object;
		}
		item += '</td></tr>';
		items.push(item);
	});
	return '<table class="decoded" style="width: 100%;">' + items.join('') + '</table>';
}

function showInteractionResults(baseServiceUrl) {
	jQuery.getJSON(baseServiceUrl + 'getInteractionResults', function(data) {
		jQuery('#InteractionResults table').replaceWith(formatData(data));
	});
}

jQuery(document).ready(function() {
	MotivadoPlayer({
		baseServiceUrl: '<? echo $this->getConfiguration('uiUrl'); ?>',
		baseVideoUrl: '<? echo $this->getConfiguration('videoUrl'); ?>',
		basePlayerUrl: '<? echo $this->getConfiguration('playerUrl'); ?>',
		baseAssetUrl: '<? echo $this->getConfiguration('playerUrl'); ?>assets/',
		product: '<? echo $product; ?>'
		debugMode: 'true'
	});
	
	setInterval(function() {
		showInteractionResults('<? echo $this->getConfiguration('uiUrl'); ?>');
	}, 2500);
});

function trackPageLoadTime() {
	return true;
}

function trackPage() {
	return true;
}

function endCoaching() {
	return true;
}
</script>
<? $this->displayView('components/footer.php'); ?>
