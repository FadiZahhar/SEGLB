<?php $rows = $this->model->getorderingList();
?>
</style>
<?php $path_site_ord = plugins_url("", __FILE__); ?>
	<div class="ordering-options-head">
		<div style="float: left;">
			<div><a href="http://huge-it.com/wordpress-plugins-ordering-user-manual/" target="_blank">User Manual</a></div>
			<div>This section allows you to configure the Ordering options. <a href="http://huge-it.com/wordpress-plugins-ordering-user-manual/" target="_blank">More...</a></div>
		</div>
		<div style="float: right;">
			<a class="header-logo-text" href="http://huge-it.com/ordering/" target="_blank">
				<div><img width="250px" src="<?php echo $path_site_ord; ?>../../../images/huge-it1.png" /></div>
				<div>Get the full version</div>
			</a>
		</div>
	</div>
<h3 style="clear:both;">Huge IT Ordering</h3>
<form action="admin.php?page=huge_it_ordering&hugeit_task=save" method="post" name="adminForm" id="adminForm">
<div class="tablenav top">
	<div class="alignleft actions">
		<select name="cat" id="cat" class="postform" onchange="this.form.submit()">
			<option value="0">View all categories</option>
			<?php $categories = get_categories(  ); 
			foreach ($categories as $strcategories){
			if(isset($_POST["cat"])){
			?>
			<option value="<?php echo $strcategories->cat_ID; ?>" <?php if($strcategories->cat_ID == $_POST["cat"]){echo 'selected="selected"';} ?>><?php echo $strcategories->cat_name; ?></option>';
			<?php }
			else
			{
			?>
			<option value="<?php echo $strcategories->cat_ID; ?>"><?php echo $strcategories->cat_name; ?></option>';
			<?php
			}
			}
			?>
		</select>
		<?php 
		global $wpdb;
		$orderht = $wpdb->get_row("SELECT * from ".$wpdb->prefix."hugeit_ordering ");
		?>
		<select name="orderby" class="orderby postform">
			<option <?php if($orderht->orderby == 'menu_order'){echo 'selected="selected"';} ?> value="menu_order">Ordering</option>
			<option <?php if($orderht->orderby == 'ID'){echo 'selected="selected"';} ?> value="ID">id</option>
			<option <?php if($orderht->orderby == 'post_title'){echo 'selected="selected"';} ?> value="post_title">Title</option>
			<option <?php if($orderht->orderby == 'post_date'){echo 'selected="selected"';} ?> value="post_date">Date</option>
		</select>
		<select name="ordering" class="ordering postform">
			<option <?php if($orderht->ordering == 'ASC'){echo 'selected="selected"';} ?> value="ASC">Asceding</option>
			<option <?php if($orderht->ordering == 'DESC'){echo 'selected="selected"';} ?> value="DESC">Desceding</option>
		</select>
		<input type="submit" name="" id="post-query-submit" class="button" value="Save">
	</div>
</div>



<table class="wp-list-table widefat fixed posts">
	<thead>
		<tr>
			<th scope="col" class="column_id" style="">ID</th>
			<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></th>
			<th scope="col" id="title" class="manage-column column-title sortable desc" style="">
				<span>Title</span><span class="sorting-indicator"></span>
			</th>
			<th scope="col" id="categories" class="manage-column column-categories" style="">Publish Date</th>
			<th scope="col" id="categories" class="manage-column column-categories" style="">Categories</th>
			<th scope="col" id="tags" class="manage-column column-tags sortable desc" style="">
			<span>Ordering</span><span class="sorting-indicator"></span>
			</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th scope="col" class="column_id" style="">ID</th>
			<th scope="col" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></th>
			<th scope="col" class="manage-column column-title sortable desc" style="">
				<a href="admin.php?page=huge_it_ordering&orderby=title&order=<?php echo $order; ?>"><span>Title</span><span class="sorting-indicator"></span></a>
			</th>
			<th scope="col" class="manage-column column-categories" style="">Publish Date</th>
			<th scope="col" class="manage-column column-categories" style="">Categories</th>
			<th scope="col" class="manage-column column-tags sortable desc" style="">
				<a href="admin.php?page=huge_it_ordering&orderby=menu_order&order=<?php echo $order; ?>"><span>Ordering</span><span class="sorting-indicator"></span></a>
			</th>
		</tr>
	</tfoot>

	<tbody id="the-list">
	<?php 
	global $wpdb;
	$catid = 0;
	if(isset($_POST["cat"]))
	{
	$catid = $_POST["cat"];
	if($catid != 0){
	$rowspostsid = $wpdb->get_results($wpdb->prepare("SELECT * from ".$wpdb->prefix."term_relationships where term_taxonomy_id = %s", $catid));
	}
	else
	{
	$rowspostsid = $wpdb->get_results("SELECT * from ".$wpdb->prefix."term_relationships");
	}
	}
	else
	{
	$rowspostsid = $wpdb->get_results("SELECT * from ".$wpdb->prefix."term_relationships");
	}
	$i=2;
	$strID = 0;
	foreach($rows as $key=>$row){
		
		foreach($rowspostsid as $rowspostsids){ 
			if($row->ID == $rowspostsids->object_id){
			
			?>
				<tr  id="post-1" class="<?php if($i%2==0){echo "has-background";}$i++; ?> post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
					<td class="categories column-categories"><?php echo $row->ID; ?></td>
					<th scope="row" class="check-column">
						<label class="screen-reader-text" for="cb-select-1">Select <?php echo $row->post_title; ?></label>
						<input id="cb-select-1" type="checkbox" name="post[]" value="1">
						<div class="locked-indicator"></div>
					</th>
					<td class="post-title page-title column-title">
						<strong>
							<a class="row-title" href="post.php?post=<?php echo $row->ID; ?>&action=edit" title="Edit “<?php echo $row->post_title; ?>”"><?php echo $row->post_title; ?></a>
						</strong>
						<div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
							<span class="edit"><a href="post.php?post=<?php echo $row->ID; ?>&action=edit" title="Edit this item">Edit</a> | </span><span class="view"><a href="<?php echo get_permalink( $row->ID ); ?>" title="View “<?php echo $row->post_title; ?>”" rel="permalink">View</a></span>
						<div class="row-actions">
						</div>
					</td>
					<?php $category = get_the_category($row->ID); 
					?>
					<td class="categories column-categories"><?php echo $row->post_date; ?></td>
					<td class="categories column-categories"><?php echo $category[0]->cat_name; ?></td>
					<td class="tags column-tags"><input name="ht_menuorder_<?php echo $row->ID; ?>" class="orderID" style="width: 50px;" value="<?php echo $strID; ?>"></td>		
				</tr>
		<?php 
		}
		
	}
	$strID++;
	} ?>
	</tbody>
</table>
</form>