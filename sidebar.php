<ul id="socialmedia" >
<li><a href="http://www.twitter.com/brokerarena" class="twitter" target="_blank">Twitter</a></li>
<li><a href="http://www.facebook.com/pages/BrokerArena/298582570159824" class="facebook" target="_blank">Facebook</a></li>
<li><a href="https://profiles.google.com/u/0/114291315339218154808" class="googleplus" target="_blank">Google+</a></li>
</ul>
<div class="clear"></div>
<!-- Place this tag where you want the +1 button to render -->
<g:plusone annotation="inline"></g:plusone>


<a href="https://twitter.com/brokerarena" class="twitter-follow-button" data-show-count="true">Follow @brokerarena</a>

<br/><br/>
<div class="fb-like-box" data-href="http://www.facebook.com/pages/BrokerArena/298582570159824" data-width="292" data-show-faces="false" data-stream="false" data-header="true"></div>
<iframe frameborder=0 marginwidth=0 marginheight=0 border=0 style="border:0;margin:0;width:300px;height:250px;" src="http://www.google.com/uds/modules/elements/newsshow/iframe.html?rsz=large&format=300x250&ned=in&topic=b&q=Stockbrokers&element=true" scrolling="no" allowtransparency="true"></iframe>
<div id="brokermeter" class="well">
	<h3>BROKERmeter Top 10</h3>
	month of <?php echo date("M Y");?>
	<table class="table table-striped table-condensed">
		<thead>
			<tr><th colspan="2">Rank</th><th>Name</th></tr>
		</thead>
		<tbody>
			<?php $userTools->renderBrokerMeter();?>
		</tbody>
	</table>
	
</div>
<!--<div id="poll-container" class="well">
	<h3>Poll</h3>
	<form id='poll' action="poll.php" method="post" accept-charset="utf-8">
		<p>Pick your favorite Javascript framework:</p><p>
		<label  class="radio" for='opt1'>&nbsp;jQuery<input type="radio" name="poll" value="opt1" id="opt1" /></label><br />
		<label  class="radio"  for='opt2'>&nbsp;Ext JS<input type="radio" name="poll" value="opt2" id="opt2" /></label><br />
		<label  class="radio"  for='opt3'>&nbsp;Dojo<input type="radio" name="poll" value="opt3" id="opt3" /></label><br />
		<label  class="radio"  for='opt4'>&nbsp;Prototype<input type="radio" name="poll" value="opt4" id="opt4" /></label><br />
		<label  class="radio"  for='opt5'>&nbsp;YUI<input type="radio" name="poll" value="opt5" id="opt5" /></label><br />
		<label  class="radio"  for='opt6'>&nbsp;mootools<input type="radio" name="poll" value="opt6" id="opt6" /></label><br /><br />
		<input type="submit" class="btn btn-primary" value="Vote &rarr;" /></p>
	</form>
</div>-->
<script type="text/javascript" charset="utf-8" src="http://static.polldaddy.com/p/3172800.js"></script>
<noscript><a href="http://polldaddy.com/poll/3172800/">How do you react to criticism?</a></noscript>
