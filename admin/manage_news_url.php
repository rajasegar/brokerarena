<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<h1>Manage News</h1>
				<table class="table table-striped">
				<tr><th>Site</th><th>Url</th><th>Feed</th><th>Edit</th><th>Delete</th></tr>
				<?php
				$news = $db->select('news');
				foreach($news as $news_item)
				{
					echo "<tr>";
					echo "<td>".$news_item['site_name']."</td>";
					echo "<td>".$news_item['site_url']."</td>";
					echo "<td>".$news_item['feed_url']."</td>";
					echo "<td><a class='btn' href='update_user.php?id=".$news_item['id']."' ><i class='icon icon-cog'></i>Edit</a></td>";
					echo "<td><a class='btn' href='delete_user.php?id=".$news_item['id']."' ><i class='icon icon-remove'></i>Delete</a></td>";
					echo "</tr>";
				}
				?>
				</table>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
