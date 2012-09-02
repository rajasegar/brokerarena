<?php 
include 'header.php';
?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
				
			 <div id="content">Loading...</div>
					
				
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
<script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    <script type="text/javascript">
    /*
    *  How to see historical entries in a feed.  Usually a feed only returns x number
    *  of results, and you want more.  Since the Google Feeds API caches feeds, you can
    *  dig into the history of entries that it has cached.  This, paired with setNumEntries,
    *  allows you to get more entries than normally possible.
    */
    
    google.load("feeds", "1");
    
    // Our callback function, for when a feed is loaded.
    function feedLoaded(result) {
      if (!result.error) {
        // Grab the container we will put the results into
        var container = document.getElementById("content");
        //container.innerHTML = '';
    
        // Loop through the feeds, putting the titles onto the page.
        // Check out the result object for a list of properties returned in each entry.
        // http://code.google.com/apis/ajaxfeeds/documentation/reference.html#JSON
        for (var i = 0; i < result.feed.entries.length; i++) {
          var entry = result.feed.entries[i];

          var div = document.createElement("div");
          div.setAttribute("class","well");
          var h3 = document.createElement("h3");
          h3.innerHTML = entry.title;
          var label = document.createElement("span");
          label.setAttribute("class","label");
          label.innerHTML = entry.publishedDate;
          var contentSnippet = document.createElement("p");
          contentSnippet.innerHTML = entry.content;
          var feedlink = document.createElement("a");
          feedlink.setAttribute("href",entry.link);
          feedlink.setAttribute("class","btn");
          feedlink.innerHTML = "Read More";
          //div.appendChild(document.createTextNode( '<h3>'+  entry.title + '</h3>'));
          div.appendChild(h3);
          div.appendChild(label);
          div.appendChild(contentSnippet);
          div.appendChild(feedlink);
          container.appendChild(div);
        }
      }
    }
    
    function OnLoad() {
		
		$.ajax( 
		{ 
			type: "GET", 
			url: "ajax_getNewsFeeds.php", 
			data: {}, 
			success: 
				function(t) 
				{ 
					var container = document.getElementById("content");
					container.innerHTML = '';
					var feeds = eval(t);
					for(i=0;i<feeds.length;i++) {
						console.log(feeds[i].feed_url);
						// Create a feed instance that will grab Digg's feed.
					  //var feed = new google.feeds.Feed("http://www.digg.com/rss/index.xml");
					  var feed = new google.feeds.Feed(feeds[i].feed_url);
					
					  feed.includeHistoricalEntries(); // tell the API we want to have old entries too
					  feed.setNumEntries(3); // we want a maximum of 250 entries, if they exist
					
					  // Calling load sends the request off.  It requires a callback function.
					  feed.load(feedLoaded);
					}
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
      
    }
    
    google.setOnLoadCallback(OnLoad);
    </script>
