<?php
if(! defined( 'ABSPATH' )) exit;	
if(function_exists('current_user_can'))
if(!current_user_can('manage_options')) {
die('Access Denied');
}	
if(!function_exists('current_user_can')){
	die('Access Denied');
}
require_once("hugeit_free_version.php");
function html_showhugeit_contacts( $rows,$pageNav,$sort,$cat_row,$a,$form_styles){
	global $wpdb;
	?>
<div class="wrap">
	<?php drawFreeBanner();?>
	<div id="poststuff">
		<div id="hugeit_contacts-list-page">
			<form method="post"  onkeypress="doNothing()" action="admin.php?page=hugeit_forms_main_page" id="admin_form" name="admin_form">
			<h2>Huge IT Forms
				<a onclick="window.location.href='<?php print wp_nonce_url(admin_url('admin.php?page=hugeit_forms_main_page&task=add_cat'), 'huge_it_add_cat', 'hugeit_forms_nonce');?>'" class="add-new-h2" >Add New Form</a>
			</h2>			
			<?php

			$serch_value='';
			if(!isset($_POST['search_events_by_title']))$_POST['search_events_by_title']='';
			if(isset($_POST['serch_or_not'])) {if($_POST['serch_or_not']=="search"){ $serch_value=esc_html(stripslashes($_POST['search_events_by_title'])); }else{$serch_value="";}} 
			$serch_fields='<div class="alignleft actions"">
									<label for="search_events_by_title" style="font-size:14px">Filter: </label>
									<input type="text" name="search_events_by_title" value="'.$serch_value.'" id="search_events_by_title" onchange="clear_serch_texts()">
							</div>				
							<div class="alignleft actions">
								<input type="button" value="Search" onclick="document.getElementById(\'page_number\').value=\'1\'; document.getElementById(\'serch_or_not\').value=\'search\';
								 document.getElementById(\'admin_form\').submit();" class="button-secondary action">
								 <input type="button" value="Reset" onclick="window.location.href=\'admin.php?page=hugeit_forms_main_page\'" class="button-secondary action">
							</div>';

			 print_html_nav($pageNav['total'],$pageNav['limit'],$serch_fields);
			?>
			<table class="wp-list-table widefat fixed pages" style="width:95%">
				<thead>
				 <tr>
					<th scope="col" id="id" style="width:30px" ><span>ID</span><span class="sorting-indicator"></span></th>
					<th scope="col" id="name" style="width:85px" ><span>Name</span><span class="sorting-indicator"></span></th>
					<th scope="col" id="prod_count"  style="width:75px;" ><span>Fields</span><span class="sorting-indicator"></span></th>
					<th style="width:40px">Delete</th>
				 </tr>
				</thead>
				<tbody>
				 <?php 
				 $trcount=1;
				  for($i=0; $i<count($rows);$i++){
					$trcount++;
					$ka0=0;
					$ka1=0;
					if(isset($rows[$i-1]->id)){
						  if($rows[$i]->hc_width==$rows[$i-1]->hc_width){
						  $x1=$rows[$i]->id;
						  $x2=$rows[$i-1]->id;
						  $ka0=1;
						  }
						  else
						  {
							  $jj=2;
							  while(isset($rows[$i-$jj]))
							  {
								  if($rows[$i]->hc_width==$rows[$i-$jj]->hc_width)
								  {
									  $ka0=1;
									  $x1=$rows[$i]->id;
									  $x2=$rows[$i-$jj]->id;
									   break;
								  }
								$jj++;
							  }
						  }
						  if($ka0){
							$move_up='<span><a href="#reorder" onclick="return listItemTask(\''.$x1.'\',\''.$x2.'\')" title="Move Up">   <img src="'.plugins_url('images/uparrow.png',__FILE__).'" width="16" height="16" border="0" alt="Move Up"></a></span>';
						  }
						  else{
							$move_up="";
						  }
					}else{$move_up="";}
					
					
					if(isset($rows[$i+1]->id)){
						
						if($rows[$i]->hc_width==$rows[$i+1]->hc_width){
						  $x1=$rows[$i]->id;
						  $x2=$rows[$i+1]->id;
						  $ka1=1;
						}
						else
						{
							  $jj=2;
							  while(isset($rows[$i+$jj]))
							  {
								  if($rows[$i]->hc_width==$rows[$i+$jj]->hc_width)
								  {
									  $ka1=1;
									  $x1=$rows[$i]->id;
									  $x2=$rows[$i+$jj]->id;
									  break;
								  }
								$jj++;
							  }
						}
						
						if($ka1){
							$move_down='<span><a href="#reorder" onclick="return listItemTask(\''.$x1.'\',\''. $x2.'\')" title="Move Down">  <img src="'.plugins_url('images/downarrow.png',__FILE__).'" width="16" height="16" border="0" alt="Move Down"></a></span>';
						}else{
							$move_down="";	
						}
					}

					$uncat=$rows[$i]->par_name;
					if(isset($rows[$i]->prod_count))
						$pr_count=$rows[$i]->prod_count;
					else
						$pr_count=0;


					?>
					<tr <?php if($trcount%2==0){ echo 'class="has-background"';}?>>
						<td><?php echo $rows[$i]->id; ?></td>
						<td><a  href="<?php print wp_nonce_url(admin_url('admin.php?page=hugeit_forms_main_page&task=edit_cat&id='.$rows[$i]->id.''), 'huge_it_edit_cat_'.$rows[$i]->id.'', 'hugeit_forms_nonce');?>"><?php echo esc_html(stripslashes($rows[$i]->name)); ?></a></td>
						<td>(<?php if(!($pr_count)){echo '0';} else{ echo $rows[$i]->prod_count;} ?>)</td>
						<td><a  href="<?php print wp_nonce_url(admin_url('admin.php?page=hugeit_forms_main_page&task=remove_cat&amp;id='.$rows[$i]->id.''), 'huge_it_remove_cat_'.$rows[$i]->id.'', 'hugeit_forms_nonce');?>">Delete</a></td>
					</tr> 
				 <?php } ?>
				</tbody>
			</table>
			 <input type="hidden" name="oreder_move" id="oreder_move" value="" />
			 <input type="hidden" name="asc_or_desc" id="asc_or_desc" value="<?php if(isset($_POST['asc_or_desc'])) echo $_POST['asc_or_desc'];?>"  />
			 <input type="hidden" name="order_by" id="order_by" value="<?php if(isset($_POST['order_by'])) echo $_POST['order_by'];?>"  />
			 <input type="hidden" name="saveorder" id="saveorder" value="" />
			</form>
		</div>
	</div>
</div>
    <?php

}
function Html_edithugeit_contact($id, $ord_elem, $count_ord,$images, $row, $cat_row, $rowim, $rowsld, $paramssld, $rowsposts, $rowsposts8, $postsbycat, $form_styles,$style_values){
 	global $wpdb;
	
	if(isset($_GET["addslide"])&&$_GET["addslide"] == 1){
		header('Location: admin.php?page=hugeit_forms_main_page&id='.$row->id.'&task=apply');
	}
	
	if(isset($_GET["inputtype"])&&$_GET["inputtype"]){
		header('Location: admin.php?page=hugeit_forms_main_page&id='.$row->id.'&task=apply');
	}	
?>
<script type="text/javascript">
function submitbuttonSave(pressbutton){
	window.onbeforeunload = null;
	if(!document.getElementById('huge_it_contact_formname').value){
		alert("Name is required.");
		return;
	}	
	document.getElementById("adminForm").action=document.getElementById("adminForm").action+"&task=apply&inputtype="+pressbutton+"";
	document.getElementById("adminForm").submit();	
}
function submitbuttonRemove(pressbutton){
	window.onbeforeunload = null;
	if(!document.getElementById('huge_it_contact_formname').value){
		alert("Name is required.");
		return;
	}	
	document.getElementById("adminForm").action=document.getElementById("adminForm").action+"&task=apply&removeslide="+pressbutton;
	document.getElementById("adminForm").submit();	
}
function submitbutton(pressbutton){
	window.onbeforeunload = null;
	if(!document.getElementById('huge_it_contact_formname').value){
		alert("Name is required.");
		return;
	}	
	document.getElementById("adminForm").action=document.getElementById("adminForm").action+"&task="+pressbutton;
	document.getElementById("adminForm").submit();	
}
function change_select(){

	submitbutton('apply');

}
</script>
<!-- GENERAL PAGE, ADD FIELDS PAGE -->
<div class="wrap">
<?php drawFreeBanner();?>
<form action="admin.php?page=hugeit_forms_main_page&id=<?php echo $id; ?>" method="post" name="adminForm" id="adminForm">
	<div id="poststuff" >
	<div class="hugeit_tabs_block">
		<ul id="" class="hugeit_contact_top_tabs">			
			<?php
			foreach($rowsld as $rowsldires){
				if($rowsldires->id != $_GET['id']){
				?>
					<li>
						<a href="#" onclick="window.location.href='<?php print wp_nonce_url(admin_url('admin.php?page=hugeit_forms_main_page&task=edit_cat&id='.$rowsldires->id.''), 'huge_it_edit_cat_'.$rowsldires->id.'', 'hugeit_forms_nonce');?>'" ><?php echo $rowsldires->name; ?></a>
					</li>
				<?php
				}
				else{  ?>
					<li class="active" onclick="this.firstElementChild.style.width = ((this.firstElementChild.value.length + 1) * 8) + 'px';" style="background-image:url(<?php echo plugins_url('../images/edit.png', __FILE__) ;?>);cursor:pointer;">
						<input class="text_area" onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text" name="name" id="huge_it_contact_formname" maxlength="250" value="<?php echo esc_html(stripslashes($row->name));?>" />
					</li>
				<?php	
				}
			}
			?>
			<li class="add-new">
				<a onclick="window.location.href='<?php print wp_nonce_url(admin_url('admin.php?page=hugeit_forms_main_page&task=add_cat'), 'huge_it_add_cat', 'hugeit_forms_nonce');?>'">+</a>
			</li>
		</ul>
	</div>
	<div id="post-body" class="metabox-holder huge_contacts columns-2">
		<!-- Content -->
		<div id="post-body-content">
		<?php add_thickbox(); ?>
			<div id="post-body-heading">
				<div id="save-button-block">
					<div class="saveSpinnerWrapper">
						<img src="<?php echo plugins_url( '../images/spinner.gif', __FILE__ ); ?>">		
					</div>			
					<input type="button" value="Save Form" id="save-buttom" class="button button-primary button-large">
					<button class="button" id="shortcode_toggle">Get Shortcode</button>
					<label for="select_form_theme">Select Theme</label>
					<select width="200" id="select_form_theme" name="select_form_theme" class="select-theme">
					<?php foreach($form_styles as $form_style){ ?>
						<option <?php if($form_style->id == $row->hc_yourstyle){ echo 'selected'; } ?> value="<?php echo $form_style->id; ?>"><?php echo $form_style->name; ?></option>
					<?php } ?>
					</select>
					<img class="themeSpinner" src="<?php echo plugins_url( '../images/spinner.gif', __FILE__ ); ?>">						
				</div>
				<div id="shortcode_fields">
					<div class="short_incl"><label for="short_text">Shortcode</label>
						<textarea id="short_text" readonly="readonly">[huge_it_forms id="<?php echo esc_html(stripslashes($id)); ?>"]</textarea>
					</div>
					<div class="templ_incl"><label for="temp_text">Template Include</label>
						<textarea id="temp_text" readonly="readonly">&lt;?php echo do_shortcode("[huge_it_forms id='<?php echo esc_html(stripslashes($id)); ?>']"); ?&gt;</textarea>
					</div>
				</div>
				<ul id="add-fields-block">
					<!-- <li>
						<strong>Ready-To-Go Fields</strong>
						<ul id="add-default-fields">
							<li><a href="admin.php?page=hugeit_forms_main_page&id=<?php echo $row->id; ?>&task=apply&inputtype=file_box" class="" id="">Name</a></li>
							<li><a href="admin.php?page=hugeit_forms_main_page&id=<?php echo $row->id; ?>&task=apply&inputtype=file_box" class="" id="">Phone</a></li>
							<li><a href="admin.php?page=hugeit_forms_main_page&id=<?php echo $row->id; ?>&task=apply&inputtype=file_box" class="" id="">Address</a></li>
							<li><a href="admin.php?page=hugeit_forms_main_page&id=<?php echo $row->id; ?>&task=apply&inputtype=file_box" class="" id="">Map</a></li>
							<li><a href="admin.php?page=hugeit_forms_main_page&id=<?php echo $row->id; ?>&task=apply&inputtype=file_box" class="" id="">Date</a></li>
						</ul>
					</li> -->
					<li class="spinnerLi" data-idForm="<?php echo $id;?>">
						<img src="<?php echo plugins_url( '../images/spinner.gif', __FILE__ ); ?>">
					</li>
					<li>
						<strong>Add Simple Fields</strong>
						<ul id="add-default-fields">
							<li><a onclick="" class="" id="text" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Text Box</a><li>
							<li><a onclick="" class="" id="textarea" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Textarea</a></li>
							<li><a onclick="" class="" id="e_mail" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Email</a></li>
							<li><a onclick="" class="" id="selectbox" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Selectbox</a></li>
							<li><a onclick="" class="" id="checkbox" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Checkbox</a></li>
							<li><a onclick=""  class="" id="radio_box" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Radio Box</a></li>
							<li><a onclick="" class="" id="file_box" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">File Box</a></li>
							<li><a onclick="submitbuttonSave('custom_text')" class="" id="custom_text" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Custom Text</a></li>
							<?php
							$fordisablebut = '0';
						
							foreach ($rowim as $key=>$rowimages){
								if($rowimages->conttype == 'buttons'){ 
								$fordisablebut = '1';
								}
							}	
							$fordisablecaptcha = '0';
							foreach ($rowim as $key=>$rowimages){
								if($rowimages->conttype == 'captcha'){ 
								$fordisablecaptcha = '1';
								}
							}
							
							?>
							<?php if($fordisablecaptcha==0){
							if($paramssld['form_captcha_public_key'] != '' and $paramssld['form_captcha_private_key'] != ''){
								?>
								<li class="bbdisabled"><a onclick="" class="captcha" id="captcha" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Captcha</a></li>
								<?php	}
								else { ?>
								<li class="bbdisabled"><a href="admin.php?page=hugeit_forms_main_page&task=captcha_keys&id=<?php echo $_GET['id']; ?>&TB_iframe=1"  id="Nocaptcha" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>" class="thickbox">Captcha</a></li>
								<?php
								}
							} else { ?>
								<li class="disabled"><a onclick="" class="captcha" id="captcha" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Captcha</a></li>
							<?php } ?>
							<?php if($fordisablebut==0){ ?>
								<li class=""><a onclick="" class="" id="buttons" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Buttons</a></li>
							<?php } else { ?>
								<li class="disabled"><a onclick="" class="" id="buttons" data-formId="<?php echo $id;?>" data-themeId="<?php echo $row->hc_yourstyle;?>">Buttons</a></li>
							<?php } ?>
						</ul>
					</li>
				</ul>
			</div>
			<?php //var_dump($style_values);
			function huge_wptiny($initArray){
					$initArray['height'] = '300px';
					$initArray['forced_root_block'] = false;
					$initArray['remove_linebreaks']=false;
				    $initArray['remove_redundant_brs'] = false;
				    $initArray['wpautop']=false;
					$initArray['setup'] ="function(ed) {
						ed.onKeyUp.add(function(ed, e) {
							if (jQuery('#wp-titleimage73-wrap').hasClass('tmce-active')){
							var value= tinyMCE.activeEditor.getContent();
								//alert(1)
							}else{
							var value= jQuery('#wp-titleimage73-wrap').val();
								//alert(2)
							}

							value=tinyMCE.activeEditor.getContent();
							editorchange(value);
						})

					}";
					return $initArray;
				}
				add_filter('tiny_mce_before_init', 'huge_wptiny');
				 ?>
			<div id="fields-list-block">
				<ul id="fields-list-left" class="fields-list">
				<?php
				$backColor=1;
				$rowim = array_reverse($rowim);				

				foreach ($rowim as $key=>$rowimages){
				if($rowimages->hc_left_right == 'left'){
					$inputtype = $rowimages->conttype;
					switch ($inputtype) {
						 case 'text':  //1
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?> data-fieldNum="<?php echo $rowimages->id; ?>">		
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Textbox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Textbox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
											<label class="input-block">Field Is Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" class="isactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>										
									</div>
									<div class="left">
										<div>
											<label class="input-block">Value If Empty:
												<input class="placeholder" class="placeholder" class="text_area" type="text" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  oldvalue="<?php echo $rowimages->name; ?>" value="<?php echo $rowimages->name; ?>">
											</label>
										</div>
										<div>
											<div class="input-block textbox_file_type">
												<div>Field type:</div>
												<label><input  type="radio" <?php if($rowimages->field_type == 'text'){ echo 'checked="checked"';} ?> name="field_type<?php echo $rowimages->id; ?>"  value="text" >Simple Text</label>
												<label><input  type="radio" <?php if($rowimages->field_type == 'number'){ echo 'checked="checked"';} ?> name="field_type<?php echo $rowimages->id; ?>"  value="number" >Number</label>
											</div>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'textarea':  //2
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Textarea"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Textarea";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
									</div>
									<div class="left">
										<div>
											<label class="input-block">Value If Empty:
												<input class="placeholder" type="text" id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" oldvalue="<?php echo $rowimages->name; ?>" value="<?php echo $rowimages->name; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block">Field Height Size:
												<input class="textarea-size" type="number" class="small" name="hc_other_field<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_other_field; ?>" />px
											</label>
										</div>
										<div>
											<label class="input-block">Field Resize Is Available:
												<input type="hidden" name="field_type<?php echo $rowimages->id; ?>" value=""/>
												<input class="textarea-resize" type="checkbox" <?php if($rowimages->field_type == 'on'){ echo 'checked="checked"';} ?> name="field_type<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'selectbox':  //3
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Selectbox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Selectbox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on"/>
											</label>
										</div>
									</div>
									<div class="left secondBlock">
										<label class="input-block">Field Options:
										<ul rel="<?php echo $rowimages->id; ?>" class="field-multiple-option-list selectbox">
										<?php
										 $options=explode(';;',$rowimages->name);
										 $i=0;
										 foreach($options as $opt_key=>$option){
										?>
											<li <?php if($rowimages->hc_input_show_default=='formsInsideAlign'&&$opt_key==0) echo "id='defaultSelect'";?>>
												<input id="" class="field-multiple-option" type="text" name="fieldoption<?php echo $rowimages->id; ?>" value="<?php echo $option; ?>" />
												<div class="set-active <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked';} ?>" >
													<input type="hidden" class="field-multiple-option-active-field" name="hc_other_field<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->hc_other_field; ?>" />
													<input type="radio" <?php if($rowimages->hc_other_field==$i){echo 'checked="checked"';} ?> />
												</div>
												<a href="#remove" class="remove-field-option">remove</a>
											</li>
										<?php $i++; } ?>
											<li>
												<input class="field-multiple-option-all-values" name="titleimage<?php echo $rowimages->id; ?>" type="hidden" value="<?php echo $rowimages->name; ?>" />
												<input class="add-new-name" type="text" id="titleimage"  value="" />
												<a href="#" class="add-new">+</a>
											</li>
										</ul>
										</label>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>

									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'checkbox':  //4
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Checkbox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Checkbox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>	
											<label class="input-block">Field(s) Is/Are Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>
											<label class="input-block">Columns Count:
												<input type="number" class="small field-columns-count" name="field_type<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->field_type; ?>" />
											</label>
										</div>
									</div>
									<div class="left secondBlock">
										<div>
											<label class="input-block">Field Options:
											<ul rel="<?php echo $rowimages->id; ?>" class="field-multiple-option-list checkbox">
											<?php
											 $options=explode(';;',$rowimages->name);
											 $actives=explode(';;',$rowimages->hc_other_field);
											 $i=0;
											 $j=0;
											 foreach($options as $key=>$option){
											?>
												<li>
													<input id="" class="field-multiple-option" type="text" value="<?php echo $option; ?>" />
													<div class="set-active <?php if(isset($actives[$j])&&$actives[$j]==''.$key.''){echo 'checked';$j++;} ?>" >
														<input type="hidden" class="field-multiple-option-active-field" name="hc_other_field<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->hc_other_field; ?>" />
														<input type="radio"  <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked="checked"';} ?> name="options_active_<?php echo $rowimages->id; ?>" value="<?php echo $i; ?>" />
													</div>
													<a href="#remove" class="remove-field-option">remove</a>
												</li>
											<?php $i++; } ?>
												<li>
													<input class="field-multiple-option-all-values" type="hidden" name="titleimage<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->name; ?>" />
													<input class="add-new-name" type="text" id="titleimage<?php echo $rowimages->id; ?>"  value="" />
													<a href="#" class="add-new">+</a>
												</li>
											</ul>
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'radio_box':  //5
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Radiobox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Radiobox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Columns Count:
												<input type="number" class="small field-columns-count" type="text" name="im_description<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->description; ?>" />
											</label>
										</div>
									</div>
									<div class="left secondBlock">
										<div>
											<label class="input-block">Field Options:
											<ul rel="<?php echo $rowimages->id; ?>" class="field-multiple-option-list radio">
											<?php
											 $options=explode(';;',$rowimages->name);
											 $i=0;
											 foreach($options as $option){
											?>
												<li>
													<input id="" class="field-multiple-option" type="text" name="fieldoption<?php echo $rowimages->id; ?>" value="<?php echo $option; ?>" />													
													<div class="set-active <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked';} ?>" >
														<input type="hidden" class="field-multiple-option-active-field" name="hc_other_field<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->hc_other_field; ?>" />
														<input type="radio" <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked="checked"';} ?> />
													</div>
													<a href="#remove" class="remove-field-option">remove</a>
												</li>
											<?php $i++; } ?>
												<li>
													<input class="field-multiple-option-all-values" type="hidden" name="titleimage<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->name; ?>" />
													<input class="add-new-name" type="text"  value="" />
													<a href="#" class="add-new">+</a>
												</li>
											</ul>
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'file_box':  //6
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Filebox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Filebox";} ?></h4>
								<div class="fields-options">
										
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label"  type="text" name="imagess<?php echo htmlspecialchars($rowimages->id); ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Allowed files:
												<textarea class="text_area" type="hidden" name="hc_other_field<?php echo $rowimages->id; ?>" rows="3" cols="45" name="text"><?php echo $rowimages->hc_other_field; ?></textarea>
											</label>
										</div>
									</div>
									<div class="left">
										<div>
											<label class="input-block">Field Maximum Size(MB):
												<input class="text_area" type="number" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->name; ?>">
											</label>
										</div>
										<div>
											<label class="input-block">Upload File Directory:
												<input class="text_area" type="text" name="field_type<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->field_type; ?>" >
											</label>
										</div>
										<div>
											<label>Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on"/>
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'custom_text':  //7											
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4>Custom Text</h4>
								<div class="fields-options">	
									<div class="left tinymce_custom_text">
										<?php	wp_editor($rowimages->name, "titleimage".$rowimages->id); ?>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
							<script>
									function editorchange(value){
										var fieldid=jQuery('.fields-list li.open').attr('id');
										var previewfield=jQuery('.hugeit-contact-column-block > div[rel="'+fieldid+'"]');										
										previewfield.html(value);
									}
									jQuery('#fields-list-block').on('keyup','#wp-titleimage'+<?php echo $rowimages->id; ?>+'-wrap',function(){
										var value=jQuery('#titleimage'+<?php echo $rowimages->id; ?>).val();
										editorchange(value);
									})													
							</script>
						<?php 
						break;
						case 'captcha':  //8
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>" data-fieldType="captcha">
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4>Captcha</h4>
								<div class="fields-options">
									<div class="left">
										<label class="input-block">Captcha Type
											<select name="titleimage<?php echo $rowimages->id; ?>">
												<option <?php if($rowimages->name == 'image'){ echo 'selected="selected"'; } ?> value="image">Image</option>
												<option <?php if($rowimages->name == 'audio'){ echo 'selected="selected"'; } ?> value="audio">Audio</option>
											</select>
										</label>
										<label class="input-block">Captcha Position
											<select class="captcha_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
												<option <?php if($rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="1">Right</option>
												<option <?php if($rowimages->hc_input_show_default == '2'){ echo 'selected="selected"'; } ?> value="2">Left</option>
											</select>
										</label>
									</div>	
									<div class="left">
										<label class="input-block">Captcha Theme
											<select class="hugeit_contact_captcha_theme" name="hc_required<?php echo $rowimages->id; ?>">
												<option <?php if($rowimages->hc_required == 'dark'){ echo 'selected="selected"'; } ?> value="dark">Dark</option>
												<option <?php if($rowimages->hc_required == 'light'){ echo 'selected="selected"'; } ?> value="light">Light</option>
											</select>
										</label>
									</div>	
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'buttons':  //9
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>" data-fieldType="buttons">
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4>Buttons</h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Submit Button Text:
												<input class="submitbutton" type="text" name="im_description<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->description; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block">Actions After Submission:
												<select id="form_checkbox_size" name="hc_other_field<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_other_field == 'go_to_url'){ echo 'selected="selected"'; } ?> value="go_to_url">Go To Url</option>
													<option <?php if($rowimages->hc_other_field == 'print_success_message'){ echo 'selected="selected"'; } ?> value="print_success_message">Print Success Message</option>
													<option <?php if($rowimages->hc_other_field == 'refresh_page'){ echo 'selected="selected"'; } ?> value="refresh_page">Refresh Page</option>
												</select>
											</label>							
										</div>
										<div id="go_to_url_field">
											<label class="input-block">Go To This Url:
												<input class="" type="text" name="field_type<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->field_type; ?>" />
											</label>
										</div>
									</div>
									<div class="left">
										<div>
											<label class="input-block">Reset Button Text:
												<input class="resetbutton" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label>Show Reset Button
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="showresetbutton" class="required" type="checkbox" <?php if($rowimages->hc_required == 'checked'){ echo 'checked';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="checked"/>
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'e_mail':  //10
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">		
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Email"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Email";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
											<label class="input-block">Field Is Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" class="isactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>										
									</div>
									<div class="left">
										<div>
											<label class="input-block">Value If Empty:
												<input class="placeholder" class="placeholder" class="text_area" type="text" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  oldvalue="<?php echo $rowimages->name; ?>"  value="<?php echo $rowimages->name; ?>">
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								
								<div class="clear"></div>
							</li>
						<?php 
						break;
						
					} 
				} 
				} ?>
				</ul>
				
				<ul id="fields-list-right" class="fields-list">		
				<?php
				foreach ($rowim as $key=>$rowimages){
				if($rowimages->hc_left_right == 'right'){
					$inputtype = $rowimages->conttype;
					switch ($inputtype) {
						 case 'text':  //1
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">		
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Textbox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Textbox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
											<label class="input-block">Field Is Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" class="isactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>										
									</div>
									<div class="left">
										<div>
											<label class="input-block">Value If Empty:
												<input class="placeholder" class="placeholder" class="text_area" type="text" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  oldvalue="<?php echo $rowimages->name; ?>" value="<?php echo $rowimages->name; ?>">
											</label>
										</div>
										<div>
											<div class="input-block textbox_file_type">
												<div>Field type:</div>
												<label><input  type="radio" <?php if($rowimages->field_type == 'text'){ echo 'checked="checked"';} ?> name="field_type<?php echo $rowimages->id; ?>"  value="text" >Simple Text</label>
												<label><input  type="radio" <?php if($rowimages->field_type == 'number'){ echo 'checked="checked"';} ?> name="field_type<?php echo $rowimages->id; ?>"  value="number" >Number</label>
											</div>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'textarea':  //2
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Textarea"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Textarea";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
									</div>
									<div class="left">
										<div>
											<label class="input-block">Value If Empty:
												<input class="placeholder" type="text" id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" oldvalue="<?php echo $rowimages->name; ?>" value="<?php echo $rowimages->name; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block">Field Height Size:
												<input class="textarea-size" type="number" class="small" name="hc_other_field<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_other_field; ?>" />px
											</label>
										</div>
										<div>
											<label class="input-block">Field Resize Is Available:
												<input type="hidden" name="field_type<?php echo $rowimages->id; ?>" value=""/>
												<input class="textarea-resize" type="checkbox" <?php if($rowimages->field_type == 'on'){ echo 'checked="checked"';} ?> name="field_type<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'selectbox':  //3
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Selectbox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Selectbox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on"/>
											</label>
										</div>
									</div>
									<div class="left secondBlock">
										<label class="input-block">Field Options:
										<ul rel="<?php echo $rowimages->id; ?>" class="field-multiple-option-list selectbox">
										<?php
										 $options=explode(';;',$rowimages->name);
										 $i=0;
										 foreach($options as $opt_key=>$option){
										?>
											<li  <?php if($rowimages->hc_input_show_default=='formsInsideAlign'&&$opt_key==0) echo "id='defaultSelect'";?>>
												<input id="" class="field-multiple-option" type="text" name="fieldoption<?php echo $rowimages->id; ?>" value="<?php echo $option; ?>" />
												<div class="set-active <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked';} ?>" >
													<input type="hidden" class="field-multiple-option-active-field" name="hc_other_field<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->hc_other_field; ?>" />
													<input type="radio" <?php if($rowimages->hc_other_field==$i){echo 'checked="checked"';} ?> />
												</div>
												<a href="#remove" class="remove-field-option">remove</a>
											</li>
										<?php $i++; } ?>
											<li>
												<input class="field-multiple-option-all-values" name="titleimage<?php echo $rowimages->id; ?>" type="hidden" value="<?php echo $rowimages->name; ?>" />
												<input class="add-new-name" type="text" id="titleimage"  value="" />
												<a href="#" class="add-new">+</a>
											</li>
										</ul>
										</label>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field"  href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'checkbox':  //4
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Checkbox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Checkbox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>	
											<label class="input-block">Field(s) Is/Are Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>
											<label class="input-block">Columns Count:
												<input type="number" class="small field-columns-count" name="field_type<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->field_type; ?>" />
											</label>
										</div>
									</div>
									<div class="left secondBlock">
										<div>
											<label class="input-block">Field Options:
											<ul rel="<?php echo $rowimages->id; ?>" class="field-multiple-option-list checkbox">
											<?php
											 $options=explode(';;',$rowimages->name);
											 $actives=explode(';;',$rowimages->hc_other_field);
											 $i=0;
											 $j=0;
											 foreach($options as $key=>$option){
											?>
												<li>
													<input id="" class="field-multiple-option" type="text" value="<?php echo $option; ?>" />
													<div class="set-active <?php if(isset($actives[$j])&&$actives[$j]==''.$key.''){echo 'checked';$j++;} ?>" >
														<input type="hidden" class="field-multiple-option-active-field" name="hc_other_field<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->hc_other_field; ?>" />
														<input type="radio"  <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked="checked"';} ?> name="options_active_<?php echo $rowimages->id; ?>" value="<?php echo $i; ?>" />
													</div>
													<a href="#remove" class="remove-field-option">remove</a>
												</li>
											<?php $i++; } ?>
												<li>
													<input class="field-multiple-option-all-values" type="hidden" name="titleimage<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->name; ?>" />
													<input class="add-new-name" type="text" id="titleimage<?php echo $rowimages->id; ?>"  value="" />
													<a href="#" class="add-new">+</a>
												</li>
											</ul>
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'radio_box':  //5
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Radiobox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Radiobox";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>
										<div>
											<label class="input-block">Columns Count:
												<input type="number" class="small field-columns-count" type="text" name="im_description<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->description; ?>" />
											</label>
										</div>
									</div>
									<div class="left secondBlock">
										<div>
											<label class="input-block">Field Options:
											<ul rel="<?php echo $rowimages->id; ?>" class="field-multiple-option-list radio">
											<?php
											 $options=explode(';;',$rowimages->name);
											 $i=0;
											 foreach($options as $option){
											?>
												<li>
													<input id="" class="field-multiple-option" type="text" name="fieldoption<?php echo $rowimages->id; ?>" value="<?php echo $option; ?>" />
													<div class="set-active <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked';} ?>" >
														<input type="hidden" class="field-multiple-option-active-field" name="hc_other_field<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->hc_other_field; ?>" />
														<input type="radio" <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked="checked"';} ?> />
													</div>
													<a href="#remove" class="remove-field-option">remove</a>
												</li>
											<?php $i++; } ?>
												<li>
													<input class="field-multiple-option-all-values" type="hidden" name="titleimage<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->name; ?>" />
													<input class="add-new-name" type="text"  value="" />
													<a href="#" class="add-new">+</a>
												</li>
											</ul>
											</label>
										</div>
									</div>

									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'file_box':  //6
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Filebox"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "File";} ?></h4>
								<div class="fields-options">
										
									<div class="left">
										<div>
											<label class="input-block">Field Label:
												<input class="label"  type="text" name="imagess<?php echo htmlspecialchars($rowimages->id); ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Allowed files:
												<textarea class="text_area" type="hidden" name="hc_other_field<?php echo $rowimages->id; ?>" rows="3" cols="45" name="text"><?php echo $rowimages->hc_other_field; ?></textarea>
											</label>
										</div>
									</div>
									<div class="left">
										<div>
											<label class="input-block">Field Maximum Size(MB):
												<input class="text_area" type="number" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->name; ?>">
											</label>
										</div>
										<div>
											<label class="input-block">Upload File Directory:
												<input class="text_area" type="text" name="field_type<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->field_type; ?>" >
											</label>
										</div>
										<div>
											<label>Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on"/>
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'custom_text':  //7
											
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">
								<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4>Custom Text</h4>
								<div class="fields-options">	
									<div class="left tinymce_custom_text">
										<?php	wp_editor($rowimages->name, "titleimage".$rowimages->id); ?>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#" ><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
							<script>
									
									//jQuery('#content').change(function(){
								///		editorchange(jQuery(this).val());
									//});
								
									function editorchange(value){
										var fieldid=jQuery('.fields-list li.open').attr('id');
										var previewfield=jQuery('.hugeit-contact-column-block > div[rel="'+fieldid+'"]');
										//alert(value+" "+previewfield+" "+fieldid);
										
										previewfield.html(value);
									}
													
							</script>
						<?php 
						break;
						case 'captcha':  //8
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>" data-fieldType="captcha">
								<input type="hidden" class="left-right-position"  name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4>Captcha</h4>
								<div class="fields-options">
									<div class="left">
										<label class="input-block">Captcha Type
											<select name="titleimage<?php echo $rowimages->id; ?>">
												<option <?php if($rowimages->name == 'image'){ echo 'selected="selected"'; } ?> value="image">Image</option>
												<option <?php if($rowimages->name == 'audio'){ echo 'selected="selected"'; } ?> value="audio">Audio</option>
											</select>
										</label>
										<label class="input-block">Captcha Position
											<select class="captcha_position"  name="hc_input_show_default<?php echo $rowimages->id; ?>">
												<option <?php if($rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="1">Right</option>
												<option <?php if($rowimages->hc_input_show_default == '2'){ echo 'selected="selected"'; } ?> value="2">Left</option>
											</select>
										</label>
									</div>	
									<div class="left">
										<label class="input-block">Captcha Theme
											<select class="hugeit_contact_captcha_theme" name="hc_required<?php echo $rowimages->id; ?>">
												<option <?php if($rowimages->hc_required == 'dark'){ echo 'selected="selected"'; } ?> value="dark">Dark</option>
												<option <?php if($rowimages->hc_required == 'light'){ echo 'selected="selected"'; } ?> value="light">Light</option>
											</select>
										</label>
									</div>	
									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'buttons':  //9
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>" data-fieldType="buttons">
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4>Buttons</h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Submit Button Text:
												<input class="submitbutton" type="text" name="im_description<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->description; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block">Actions After Submission:
												<select id="form_checkbox_size" name="hc_other_field<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_other_field == 'go_to_url'){ echo 'selected="selected"'; } ?> value="go_to_url">Go To Url</option>
													<option <?php if($rowimages->hc_other_field == 'print_success_message'){ echo 'selected="selected"'; } ?> value="print_success_message">Print Success Message</option>
													<option <?php if($rowimages->hc_other_field == 'refresh_page'){ echo 'selected="selected"'; } ?> value="refresh_page">Refresh Page</option>
												</select>
											</label>							
										</div>
										<div id="go_to_url_field">
											<label class="input-block">Go To This Url:
												<input class="" type="text" name="field_type<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->field_type; ?>" />
											</label>
										</div>
									</div>
									<div class="left">
										<div>
											<label class="input-block">Reset Button Text:
												<input class="resetbutton" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label>Show Reset Button
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="showresetbutton" class="required" type="checkbox" <?php if($rowimages->hc_required == 'checked'){ echo 'checked';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="checked"/>
											</label>
										</div>
									</div>

									<div class="field-top-options-block">
										<a class="remove-field" href="#" ><span><p>Remove Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
							<div class="clear"></div>
							</li>
						<?php 
						break;
						case 'e_mail':  //10
						?>
							<li id="huge-contact-field-<?php echo $rowimages->id; ?>" <?php if($backColor%2==0){echo "class='has-background'";}$backColor++?>  data-fieldNum="<?php echo $rowimages->id; ?>">		
								<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" fileType="Email"/>
								<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<h4><?php if($rowimages->hc_field_label!=''){echo $rowimages->hc_field_label;}else{ echo "Email";} ?></h4>
								<div class="fields-options">
									<div class="left">
										<div>
											<label class="input-block">Label:
												<input class="label" type="text" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_field_label; ?>" />
											</label>
										</div>
										<div>
											<label class="input-block" for="form_label_position">Label Position:
												<select id="form_label_position" name="hc_input_show_default<?php echo $rowimages->id; ?>">
													<option <?php if($rowimages->hc_input_show_default == 'formsLeftAlign' || $rowimages->hc_input_show_default == '1'){ echo 'selected="selected"'; } ?> value="formsLeftAlign">Left Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsRightAlign'){ echo 'selected="selected"'; } ?> value="formsRightAlign">Right Align</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsAboveAlign'){ echo 'selected="selected"'; } ?> value="formsAboveAlign">Above Field</option>
													<option <?php if($rowimages->hc_input_show_default == 'formsInsideAlign'){ echo 'selected="selected"'; } ?> value="formsInsideAlign">Inside Placeholder</option>
												</select>
											</label>
										</div>
										<div>
											<label class="input-block">Field Is Required:
												<input type="hidden" name="hc_required<?php echo $rowimages->id; ?>" value=""/>
												<input class="required" type="checkbox" <?php if($rowimages->hc_required == 'on'){ echo 'checked="checked"';} ?> name="hc_required<?php echo $rowimages->id; ?>" value="on" />
											</label>
											<label class="input-block">Field Is Active:
												<input type="hidden" name="im_description<?php echo $rowimages->id; ?>" value=""/>
												<input class="fieldisactive" class="isactive" type="checkbox" <?php if($rowimages->description == 'on'){ echo 'checked="checked"';} ?> name="im_description<?php echo $rowimages->id; ?>" value="on" />
											</label>
										</div>										
									</div>
									<div class="left">
										<div>
											<label class="input-block">Value If Empty:
												<input class="placeholder" class="placeholder" class="text_area" type="text" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  oldvalue="<?php echo $rowimages->name; ?>"  value="<?php echo $rowimages->name; ?>">
											</label>
										</div>
									</div>
									<div class="field-top-options-block">
										<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
										<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
										<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
									</div>
								</div>
								
								<div class="clear"></div>
							</li>
						<?php 
						break;
						
					} 
				} 
				} ?>
				</ul>
			<div class="clear"></div>
			
			</div>
			
			
			<!-- ################################################ LIVE PREVIEW GOESE TO FRONT END #################################################### -->
			
			<style id="formStyles">
			
			#hugeit-contact-wrapper {
				width:<?php echo $style_values['form_wrapper_width']; ?>%;
			
							
				<?php
					$color = explode(',', $style_values['form_wrapper_background_color']);
				 if($style_values['form_wrapper_background_type']=="color"){?>
						background:#<?php echo $color[0]; ?>;
				<?php }
					elseif($style_values['form_wrapper_background_type']=="gradient"){ ?>
						background: -webkit-linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* For Safari 5.1 to 6.0 */
						background: -o-linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* For Opera 11.1 to 12.0 */
						background: -moz-linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* For Firefox 3.6 to 15 */
						background: linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* Standard syntax */
				<?php
					}
				?>	
			}
			
			#hugeit-contact-wrapper > div {
				border:<?php echo $style_values['form_border_size']; ?>px solid #<?php echo $style_values['form_border_color']; ?>;
			}
			
			#hugeit-contact-wrapper > div > h3 {
				<?php if($style_values['form_show_title']=='on'):?>
				position:relative;
				display:block;
				clear:both !important;
				padding:5px 0px 10px 2% !important;
				font-size:<?php echo $style_values['form_title_size']; ?>px !important;
				line-height:<?php echo $style_values['form_title_size']; ?>px !important;
				color:#<?php echo $style_values['form_title_color']; ?> !important;
				margin: 10px 0 15px 0 !important;
				<?php else:?>
				display:none;
				<?php endif;?>
			}
			
			/*LABELS*/
			
			#hugeit-contact-wrapper label  {
				font-size:<?php echo $style_values['form_label_size']; ?>px;
				color:#<?php echo $style_values['form_label_color']; ?>;
				font-family:<?php echo $style_values['form_label_font_family']; ?>;
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div > label {
				display:block;
				width:38%;
				float:left;
				margin-right:2%;
				cursor: move;
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div .field-block {
				display:inline-block;
				width:60%;
				/*min-width:150px;*/
			}
			#hugeit-contact-wrapper label.error {
				color:#<?php echo $style_values['form_label_error_color']; ?>;
			}
			#hugeit-contact-wrapper label em.required-star{
				color: #<?php echo $style_values['form_label_required_color']; ?>;
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div .field-block ul li label span.sublable{vertical-align: super;}

			#hugeit-contact-wrapper .hugeit-contact-column-block > div > label.formsRightAlign{
				text-align: right !important;
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div > label.formsAboveAlign{
				width:100% !important;
				float:none !important;
				padding-bottom: 5px !important;
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div .formsAboveAlign {
				width:100% !important;				
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div > label.formsInsideAlign{
				display:none !important;				
			}
			#hugeit-contact-wrapper .hugeit-contact-column-block > div .formsInsideAlign {
				width:100% !important;
			}
			/*FIELDS CUSTOM STYLES*/
				/*############INPUT TEXT############*/

				.input-text-block input,.input-text-block input:focus {
					height:<?php echo $style_values['form_input_text_font_size']*2; ?>px;
					<?php if($style_values['form_input_text_has_background']=="on"){?>
					background:#<?php echo $style_values['form_input_text_background_color']; ?>;
					<?php }else { ?>
					background:none;
					<?php } ?>
					border:<?php echo $style_values['form_input_text_border_size']; ?>px solid #<?php echo $style_values['form_input_text_border_color']; ?> !important;
					box-shadow:none  !important ;
					border-radius:<?php echo $style_values['form_input_text_border_radius']; ?>px;
					font-size:<?php echo $style_values['form_input_text_font_size']; ?>px;
					color:#<?php echo $style_values['form_input_text_font_color']; ?>;
					margin:0px !important;
					outline:none;
				}
				/*############TEXTAREA############*/

				.textarea-block textarea {
					<?php if($style_values['form_textarea_has_background']=="on"){?>
					background:#<?php echo $style_values['form_textarea_background_color']; ?>;
					<?php }else { ?>
					background:none;
					<?php } ?>
					border:<?php echo $style_values['form_textarea_border_size']; ?>px solid #<?php echo $style_values['form_textarea_border_color']; ?>;
					border-radius:<?php echo $style_values['form_textarea_border_radius']; ?>px;
					font-size:<?php echo $style_values['form_textarea_font_size']; ?>px;
					color:#<?php echo $style_values['form_textarea_font_color']; ?>;
					margin:0px !important;
				}
				
				/*############CHECKBOX RADIOBOX############ */

				 .hugeit-checkbox-list li {
					width:<?php echo $rowimages->id; ?>px;
				 }
			
			
				.radio-block, .checkbox-block {
					position:relative;
					float:left;
					margin:0px 5px 0px 5px;
					display: block;
				}
				
				.radio-block input, .checkbox-block input {
					visibility:hidden;
					position:absolute;
					top:0px;
					left:0px;
				}
				
				.radio-block i {
					display:inline-block;
					float:left;
					width:20px;
					color:#<?php echo $style_values['form_radio_color']; ?>;
				}
				
				 .checkbox-block i {
					display:inline-block;
					float:left;
					width:20px;
					color:#<?php echo $style_values['form_checkbox_color']; ?>;
				 }
				
				#hugeit-contact-wrapper.big-radio .radio-block i ,#hugeit-contact-wrapper.big-checkbox .checkbox-block i {font-size:24px;}
				#hugeit-contact-wrapper.medium-radio .radio-block i ,#hugeit-contact-wrapper.medium-checkbox .checkbox-block i {font-size:20px;}
				#hugeit-contact-wrapper.small-radio .radio-block i ,#hugeit-contact-wrapper.small-checkbox .checkbox-block i {font-size:15px;}
				
				.radio-block i:hover {
					color:#<?php echo $style_values['form_radio_hover_color']; ?>;
				}
				
				.checkbox-block i:hover {
					color:#<?php echo $style_values['form_checkbox_hover_color']; ?>;
				}
				
				.radio-block i.active, .checkbox-block i.active {display:none;}
				.radio-block input:checked + i.active + i.passive, .checkbox-block  input:checked + i.active + i.passive {display:none;}
				
				.radio-block input:checked + i.active, .radio-block input:checked + i.active:hover {
					display:inline-block;
					color:#<?php echo $style_values['form_radio_active_color']; ?>;
				}
				
				.checkbox-block	input:checked + i.active, .checkbox-block input:checked + i.active:hover {
					display:inline-block;
					color:#<?php echo $style_values['form_checkbox_active_color']; ?>;
				}
				
				
				
				/*############SELECTBOX#############*/
				
				.selectbox-block {
					position:relative;
					height:<?php echo $style_values['form_selectbox_font_size']*2+$style_values['form_selectbox_border_size']; ?>px;
				}
				
				.selectbox-block select {
					position:relative;
					height:<?php echo $style_values['form_selectbox_font_size']*2-$style_values['form_selectbox_border_size']*2; ?>px;
					margin:<?php echo $style_values['form_selectbox_border_size']; ?>px 0px 0px 1px !important;
					opacity:0;
					z-index:2;
				}
				
				.selectbox-block .textholder {
					position:absolute;
					height:<?php echo $style_values['form_selectbox_font_size']*2; ?>px;
					width:90%;
					padding-right:10%;
					margin:0px !important;
					top;0px;
					left:0px;
					border:0px;
					color:#<?php echo $style_values['form_selectbox_font_color']; ?>; 
					background:none;
					border:<?php echo $style_values['form_selectbox_border_size']; ?>px solid #<?php echo $style_values['form_selectbox_border_color']; ?>;
					border-radius:<?php echo $style_values['form_selectbox_border_radius']; ?>px;
					color:#<?php echo $style_values['form_selectbox_font_color']; ?>;
					font-size:<?php echo $style_values['form_selectbox_font_size']; ?>px;
					<?php if($style_values['form_selectbox_has_background']=="on"){?>
					background:#<?php echo $style_values['form_selectbox_background_color']; ?>;
					<?php  }else { ?>
					background:none;
					<?php } ?>
				}
				
				.selectbox-block i {
					position:absolute;
					top:<?php echo $style_values['form_selectbox_font_size']/2+$style_values['form_selectbox_border_size']/4; ?>px;
					right:10px;
					z-index:0;
					color:#<?php echo $style_values['form_selectbox_arrow_color']; ?>;
					font-size:<?php echo $style_values['form_selectbox_font_size']; ?>px;
				}
				
				/*############FILE#############*/
				
				
				.file-block {
					position:relative;
					cursor:pointer;
				}
								
				.file-block .textholder {
					position:relative;
					float:left;
					width:calc(60% - <?php echo $style_values['form_file_border_size']*2 + 5; ?>px) !important;
					height:<?php echo $style_values['form_file_font_size']*2; ?>px;
					margin:0px;
					border:<?php echo $style_values['form_file_border_size']; ?>px solid #<?php echo $style_values['form_file_border_color']; ?> !important;
					border-radius:<?php echo $style_values['form_file_border_radius']; ?>px !important;
					font-size:<?php echo $style_values['form_file_font_size']; ?>px;
					color:#<?php echo $style_values['form_file_font_color']; ?>;
					<?php if($style_values['form_file_has_background']=="on"){?>
					background:#<?php echo $style_values['form_file_background']; ?>;
					<?php  }else { ?>
					background:none;
					<?php } ?>
					padding:0px 40% 0px 5px !important;
					box-sizing: content-box;
					-moz-box-sizing: content-box;
				}
				
				.file-block .uploadbutton {	
					position:absolute;
					top:0px;
					right:0px;
					width:38%;
					border-top:<?php echo $style_values['form_file_border_size']; ?>px solid #<?php echo $style_values['form_file_border_color']; ?> !important;
					border-bottom:<?php echo $style_values['form_file_border_size']; ?>px solid #<?php echo $style_values['form_file_border_color']; ?> !important;
					border-right:<?php echo $style_values['form_file_border_size']; ?>px solid #<?php echo $style_values['form_file_border_color']; ?> !important;
					border-top-right-radius:<?php echo $style_values['form_file_border_radius']; ?>px !important;
					border-bottom-right-radius:<?php echo $style_values['form_file_border_radius']; ?>px !important;
					<?php $fileheight=$style_values['form_file_font_size']*2; ?>
					height:<?php echo $fileheight; ?>px;
					padding:0px 1%;
					margin:0px;
					overflow: hidden;
					font-size:<?php echo $style_values['form_file_font_size']; ?>px;
					line-height:<?php echo $style_values['form_file_font_size']*2; ?>px;
					color:#<?php echo $style_values['form_file_button_text_color']; ?>;
					background:#<?php echo $style_values['form_file_button_background_color']; ?>;
					text-align:center;
					-webkit-transition: all 0.5s ease;
					transition: all 0.5s ease;		
					box-sizing:content-box;
					
				}
				
				.file-block:hover .uploadbutton {	
					color:#<?php echo $style_values['form_file_button_text_color']; ?>;
					background:#<?php echo $style_values['form_file_button_background_color']; ?>;
					vertical-align: baseline;
				}
				
				.file-block .uploadbutton i {
					color:#<?php echo $style_values['form_file_icon_color']; ?>;
					font-size:<?php echo $style_values['form_file_font_size']; ?>px;
					vertical-align: baseline;
					-webkit-transition: all 0.5s ease;
					transition: all 0.5s ease;
				}
				
				.file-block:hover .uploadbutton {
					color:#<?php echo $style_values['form_file_button_text_hover_color']; ?>;
					background:#<?php echo $style_values['form_file_button_background_hover_color']; ?>;
				}
				
				.file-block:hover .uploadbutton i {
					color:#<?php echo $style_values['form_file_icon_hover_color']; ?>;
				}
							
				.file-block input[type='file'] {
					height:30px;
					width:100%;
					position:absolute;
					top:0px;
					left:0px;
					opacity:0;
					cursor:pointer;
				}
				
				
				/*###########CAPTCHA#############*/
				.captcha-block div {
					margin-right:-1px;
				}
				
				/*############BUTTONS#############*/
				
				
				.buttons-block  {
					<?php
						if($style_values['form_button_position']=="left"){echo "text-align:left;";}
						else if ($style_values['form_button_position']=="right"){echo "text-align:right;";}
						else {echo "text-align:center;";}
					?>
					
				}

				.buttons-block button {
					height:auto;
					padding:<?php echo $style_values['form_button_padding']; ?>px <?php echo $style_values['form_button_padding']*2; ?>px <?php echo $style_values['form_button_padding']; ?>px <?php echo $style_values['form_button_padding']*2; ?>px;
					cursor:pointer;
					text-transform: none;
					<?php
						if($style_values['form_button_fullwidth']=="on"){
					?>
						clear:both;
						width:100%;
						padding-left:0px;
						padding-right:0px;
						margin:0px 0px 0px 0px !important;
						padding-left:0px;
						padding-right:0px;
					<?php } ?>
					font-size:<?php echo $style_values['form_button_font_size']; ?>px;
				}
				
				.buttons-block button.submit {
					color:#<?php echo $style_values['form_button_submit_font_color']; ?> !important;
					background-color:#<?php echo $style_values['form_button_submit_background']; ?> !important;
					border:<?php echo $style_values['form_button_submit_border_size']; ?>px solid #<?php echo $style_values['form_button_submit_border_color']; ?> !important;
					border-radius:<?php echo $style_values['form_button_submit_border_radius']; ?>px !important;
					-webkit-transition: all 0.5s ease !important;
					transition: all 0.5s ease !important;
					margin:0px 0px 5px 0px !important;
				}
				
				.buttons-block button.submit:hover {
					color:#<?php echo $style_values['form_button_submit_font_hover_color']; ?> !important;
					background:#<?php echo $style_values['form_button_submit_hover_background']; ?> !important;
				}
				
				.buttons-block button.submit i {
					color:#<?php echo $style_values['form_button_submit_icon_color']; ?> !important;
					vertical-align: baseline !important;
					font-size:<?php echo $style_values['form_button_font_size']; ?>px !important;
					-webkit-transition: all 0.5s ease !important;
					transition: all 0.5s ease !important;
				}
				
				.buttons-block button.submit:hover i {
					color:#<?php echo $style_values['form_button_submit_icon_hover_color']; ?> !important;
				}
	
				.buttons-block button.reset {
					color:#<?php echo $style_values['form_button_reset_font_color']; ?> !important;
					background-color:#<?php echo $style_values['form_button_reset_background']; ?> !important;
					border:<?php echo $style_values['form_button_reset_border_size']; ?>px solid #<?php echo $style_values['form_button_reset_border_color']; ?> !important;
					border-radius:<?php echo $style_values['form_button_reset_border_radius']; ?>px !important;
					-webkit-transition: all 0.5s ease !important;
					transition: all 0.5s ease !important;
				}
				
				.buttons-block button.reset:hover {
					color:#<?php echo $style_values['form_button_reset_font_hover_color']; ?> !important;
					background:#<?php echo $style_values['form_button_reset_hover_background']; ?> !important;
				}
				
				.buttons-block button.reset i {
				
					color:#<?php echo $style_values['form_button_reset_icon_color']; ?> !important;
					vertical-align: baseline !important;
					font-size:<?php echo $style_values['form_button_font_size']; ?>px !important;
					-webkit-transition: all 0.5s ease !important;
					transition: all 0.5s ease !important;
				}
				
				.buttons-block button.reset:hover i {
					color:#<?php echo $style_values['form_button_reset_icon_hover_color']; ?> !important;
				}

			</style>
			<script>
				jQuery(document).ready(function () {					
						
					/*FRONT END PREVIEW FROM ADMIN JS*/
					
					jQuery(".hugeit-contact-column-block input[type='file']").on('change',function(){
						var value=jQuery(this).val().substr(jQuery(this).val().indexOf('fakepath')+9);
						jQuery(this).parent().find('input[type="text"]').val(value);
					});
					
					jQuery(".hugeit-contact-column-block select").on('change',function(){
						jQuery(this).prev('.textholder').val(jQuery(this).val());
					});
					jQuery(".submit").on('click',function(e){
						e.preventDefault();
    					//return false;

					});
				});
			</script>
			<!--LIVE PREVIEW-->
			<div id="hugeit-contact-preview-container">
				<form onkeypress="doNothing()" id="hugeit-contact-preview-form">
					<div id="hugeit-contact-wrapper" class="<?php echo $style_values['form_radio_size']; ?>-radio <?php echo $style_values['form_checkbox_size']; ?>-checkbox">
					<div <?php foreach ($rowim as $key=>$rowimages){if($rowimages->hc_left_right == 'right'){echo 'class="multicolumn"';}} ?>>
						<?php foreach($rowsld as $key=>$rowsldires) {if($id==$rowsldires->id) {echo "<h3>".$rowsldires->name."</h3>";}} ?>
						<div class="hugeit-contact-column-block hugeit-contact-block-left" id="hugeit-contact-block-left">
							<?php
								$i=2;
								foreach ($rowim as $key=>$rowimages){
									if($rowimages->hc_left_right == 'left'){
										$inputtype = $rowimages->conttype;
										switch ($inputtype) {
											case 'text'://1
												?>
													<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
														<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?> </label>
														<div class="field-block input-text-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
															<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="<?php echo $rowimages->field_type;?>" placeholder="<?php echo $rowimages->name;?>" class="<?php if($rowimages->hc_required == 'on'){echo 'required';}?>"  <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?>/>
														</div>
														<span class="hugeit-error-message"></span>
														<span class="hugeOverlay"></span>
														<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
														<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
													</div>
												<?php
												
											break;
											case 'textarea'://2
												?>
													<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
														<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
														<div class="field-block textarea-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
															<textarea style="height:<?php echo $rowimages->hc_other_field;?>px;resize:<?php if($rowimages->field_type=='on'){echo 'vertical';}else{ echo 'none';}?>;" id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?> placeholder="<?php echo $rowimages->name; ?>"></textarea>
														</div>
														<span class="hugeit-error-message"></span>
														<span class="hugeOverlay"></span>
														<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
														<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
													</div>
												<?php 
											break;
											case 'selectbox'://3
											?>
												<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
													<div class="field-block selectbox-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
														<?php
															 $options=explode(';;',$rowimages->name);
															 $j=0;
															 foreach($options as $option){
															 if($rowimages->hc_other_field==$j){
														?>
															<input type="text" disabled="disabled" class="textholder" value="<?php echo $option; ?>" />
														<?php } $j++; } ?>
														
														<select id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" >
															<?php
															 $options=explode(';;',$rowimages->name);
															 $i=0;
															 foreach($options as $opt_key=>$option){
															?>
																<option <?php if($rowimages->hc_input_show_default=='formsInsideAlign'&&$opt_key==0) echo 'class="selectDefault" disabled ';?><?php if($rowimages->hc_other_field==$i){echo 'selected="selected"';} ?>><?php echo $option; ?></option>
															<?php $i++; } ?>
														</select>
														<i class="hugeicons-chevron-down"></i>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php	
											break;
											case 'checkbox':  //4
											?>
												<div class="hugeit-field-block hugeit-check-field" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
													<div class="field-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign')echo $rowimages->hc_input_show_default;?>">
														<ul id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" class="hugeit-checkbox-list">
															<?php
															 $options=explode(';;',$rowimages->name);
															 $actives=explode(';;',$rowimages->hc_other_field);															
															 $i=0;
															 $j=0;
															 foreach($options as $key=>$option){?>
																<li style="width:<?php if($rowimages->field_type!=0){echo 100/intval($rowimages->field_type);}?>%;">
																	<label class="secondary-label">
																		<div class="checkbox-block big">
																		<input <?php if(isset($actives[$j])&&$actives[$j]==''.$key.''){echo 'checked="checked"';$j++;} ?> type="checkbox" value="" <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?>/>
																			<?php if($style_values['form_checkbox_type']=='circle'){ ?>
																				<i class="hugeicons-dot-circle-o active"></i>
																				<i class="hugeicons-circle-o passive"></i>
																			<?php }else{ ?>			
																				<i class="hugeicons-check-square active"></i>
																				<i class="hugeicons-square-o passive"></i>
																			<?php }?>	
																		</div>
																		<span class="sublable"><?php echo $option; ?></span>
																	</label>
																</li>
															<?php $i++; } ?>
														</ul>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php
											break;
											case 'radio_box':  //5
											?>
												<div class="hugeit-field-block hugeit-radio-field" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';}?></label>
													<div class="field-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign')echo $rowimages->hc_input_show_default;?>">
														<ul id="hugeit_preview_textbox_<?php echo $rowimages->id;?>">
															<?php
															 $options=explode(';;',$rowimages->name);
															 $i=0;
															 foreach($options as $option){
															?>
																<li style="width:<?php if($rowimages->description!=0){echo 100/$rowimages->description;}?>%;">
																	<label class="secondary-label">
																		<div class="radio-block big">
																		<input <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked="checked"';} ?> type="radio" name="preview_radio_<?php echo $rowimages->id; ?>" >
																		
																			<?php if($style_values['form_radio_type']=='circle'){ ?>
																				<i class="hugeicons-dot-circle-o active"></i>
																				<i class="hugeicons-circle-o passive"></i>
																			<?php }else{ ?>			
																				<i class="hugeicons-check-square active"></i>
																				<i class="hugeicons-square-o passive"></i>
																			<?php }?>	
																		</div>
																		<span class="sublable"><?php echo $option; ?></span>
																	</label>
																</li>
															<?php $i++; } ?>
														</ul>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php 
											break;
											case 'file_box':  //6
											?>
												<script>
												jQuery(document).ready(function(){
													function mbToBytes(mb){
														var convertedByte=Math.round(mb*1048576*100000)/100000;
														return convertedByte;
													}
													var byteRes=mbToBytes(<?php echo $rowimages->name;?>);
													jQuery(".hugeit-contact-column-block input[name='MAX_FILE_SIZE']").attr('value',byteRes);
												});													
												</script>
												<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo htmlspecialchars($rowimages->id);?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
													<div class="field-block file-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
														<input type="text" class="textholder" placeholder="<?php if($rowimages->hc_input_show_default=='formsInsideAlign') echo $rowimages->hc_field_label;?>"/>
														<span class="uploadbutton">
															<?php if($style_values['form_file_has_icon']=='on'):?>
															<?php if($style_values['form_file_icon_position']=="left"){?><i class="<?php echo $style_values['form_file_icon_style']; ?>"></i><?php } ?>
															<?php endif;?>
															<?php echo $style_values['form_file_button_text'];?>
															<?php if($style_values['form_file_has_icon']=='on'):?>
															<?php if($style_values['form_file_icon_position']=="right"){?><i class="<?php echo $style_values['form_file_icon_style']; ?>"></i><?php }?>
															<?php endif;?>
														</span>
														<input type="hidden" name="MAX_FILE_SIZE" value="" />
														<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="file" name="userfile"/>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php 
											break;
											case 'custom_text':  //7
											?>
												<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<?php echo $rowimages->name; ?>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php 
											break;
											case 'captcha' //8
											?>
												<div class="hugeit-field-block captcha-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<script type="text/javascript">
													  var verifyCallback = function(response) {
													  };
													  var onloadCallback = function() {
														//alert('good');
														grecaptcha.render('democaptchalight', {
														  'sitekey' : '<?php echo $paramssld['form_captcha_public_key']; ?>',
														  'callback' : verifyCallback,
														  'theme' : 'light',
														  'type' : '<?php echo $rowimages->name; ?>'
														});
														
														grecaptcha.render('democaptchadark', {
														  'sitekey' : '<?php echo $paramssld['form_captcha_public_key']; ?>',
														  'callback' : verifyCallback,
														  'theme' : 'dark',
														  'type' : '<?php echo $rowimages->name; ?>'
														});
													  };
													 
													</script>
													<?php $capPos='right';if($rowimages->hc_input_show_default=='2')$capPos="left";?>
													<div <?php if($rowimages->hc_required=='dark'){echo 'style="display:none"';}else{echo 'style="float:'.$capPos.'"';}?> id="democaptchalight"></div>
													<div <?php if($rowimages->hc_required=='light'){echo 'style="display:none"';}else{echo 'style="float:'.$capPos.'"';}?> id="democaptchadark"></div>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php
											break;
											case 'buttons' //9									
											?>
												<div class="hugeit-field-block buttons-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<button type="submit" class="submit" id="hugeit_preview_button__submit_<?php echo $rowimages->id;?>" value="Submit">
														<?php if($style_values['form_button_icons_position']=="left" and $style_values['form_button_submit_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_submit_icon_style']; ?>"></i><?php }?>
														<?php echo $rowimages->description; ?>
														<?php if($style_values['form_button_icons_position']=="right" and $style_values['form_button_submit_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_submit_icon_style']; ?>"></i><?php }?>
													</button>
													<button type="reset" class="reset" <?php if($rowimages->hc_required!='checked') echo 'style="display: none;"'?> id="hugeit_preview_button_reset_<?php echo $rowimages->id;?>" value="Reset">													
														<?php if($style_values['form_button_icons_position']=="left" and $style_values['form_button_reset_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_reset_icon_style']; ?>"></i><?php }?>
														<?php echo $rowimages->hc_field_label; ?>
														<?php if($style_values['form_button_icons_position']=="right" and $style_values['form_button_reset_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_reset_icon_style']; ?>"></i><?php }?>
													</button>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php
											break;
											case 'e_mail':  //10
												?>
													<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
														<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?> </label>
														<div class="field-block input-text-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
															<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="<?php echo $rowimages->field_type;?>" placeholder="<?php echo $rowimages->name;?>" class="<?php if($rowimages->hc_required == 'on'){echo 'required';}?>"  <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?>/>
														</div>
														<span class="hugeit-error-message"></span>
														<span class="hugeOverlay"></span>
														<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
														<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
													</div>
												<?php
												
											break;
										}
									}
								}
							?>
						</div>
					
						<div class="hugeit-contact-column-block hugeit-contact-block-right" id="hugeit-contact-block-right">
						
						<?php	
								$i=2;
								foreach ($rowim as $key=>$rowimages){
									if($rowimages->hc_left_right == 'right'){
										$inputtype = $rowimages->conttype;
										switch ($inputtype) {
											case 'text':  //1
												?>
													<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
														<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?> </label>
														<div class="field-block input-text-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
															<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="<?php echo $rowimages->field_type;?>" placeholder="<?php echo $rowimages->name;?>" class="<?php if($rowimages->hc_required == 'on'){echo 'required';}?>"  <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?>/>
														</div>
														<span class="hugeit-error-message"></span>
														<span class="hugeOverlay"></span>
														<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
														<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
													</div>
												<?php
												
											break;
											case 'textarea':  //2
												?>
													<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
														<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
														<div class="field-block textarea-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
															<textarea style="height:<?php echo $rowimages->hc_other_field;?>px;resize:<?php if($rowimages->field_type=='on'){echo 'vertical';}else{ echo 'none';}?>;" id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?> placeholder="<?php echo $rowimages->name; ?>"></textarea>
														</div>
														<span class="hugeit-error-message"></span>
														<span class="hugeOverlay"></span>
														<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
														<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
													</div>
												<?php 
											break;
											case 'selectbox':  //3
											?>
												<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>"  for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
													<div class="field-block selectbox-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
														<?php
															 $options=explode(';;',$rowimages->name);
															 $j=0;
															 foreach($options as $option){
															 if($rowimages->hc_other_field==$j){
														?>
															<input type="text" disabled="disabled" class="textholder" value="<?php echo $option; ?>" />
														<?php } $j++; } ?>
														
														<select id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" >
															<?php
															 $options=explode(';;',$rowimages->name);
															 $i=0;
															 foreach($options as $option){
															?>
																<option <?php if($rowimages->hc_input_show_default=='formsInsideAlign'&&$opt_key==0) echo 'class="selectDefault" disabled ';?><?php if($rowimages->hc_other_field==$i){echo 'selected="selected"';} ?>><?php echo $option; ?></option>
															<?php $i++; } ?>
														</select>
														<i class="hugeicons-chevron-down"></i>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php	
											break;
											case 'checkbox':  //4
											?>
												<div class="hugeit-field-block hugeit-check-field" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
									
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
													<div class="field-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign')echo $rowimages->hc_input_show_default;?>">
														<ul id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" class="hugeit-checkbox-list">
															<?php
															 $options=explode(';;',$rowimages->name);
															 $actives=explode(';;',$rowimages->hc_other_field);															
															 $i=0;
															 $j=0;
															 foreach($options as $key=>$option){
															?>
																<li style="width:<?php if($rowimages->field_type!=0){echo 100/intval($rowimages->field_type);}?>%;">
																	<label class="secondary-label">
																		<div class="checkbox-block big">
																		<input <?php if(isset($actives[$j])&&$actives[$j]==''.$key.''){echo 'checked="checked"';$j++;} ?> type="checkbox" value="" <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?>/>
																			<?php if($style_values['form_checkbox_type']=='circle'){ ?>
																				<i class="hugeicons-dot-circle-o active"></i>
																				<i class="hugeicons-circle-o passive"></i>
																			<?php }else{ ?>			
																				<i class="hugeicons-check-square active"></i>
																				<i class="hugeicons-square-o passive"></i>
																			<?php }?>	
																		</div>
																		<span class="sublable"><?php echo $option; ?></span>
																	</label>
																</li>
															<?php $i++; } ?>
														</ul>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php
											break;
											case 'radio_box':  //5
											?>
												<div class="hugeit-field-block hugeit-radio-field" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';}?></label>
													<div class="field-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign')echo $rowimages->hc_input_show_default;?>">
														<ul id="hugeit_preview_textbox_<?php echo $rowimages->id;?>">
															<?php
															 $options=explode(';;',$rowimages->name);
															 $i=0;
															 foreach($options as $option){
															?>
																<li style="width:<?php if($rowimages->description!=0){echo 100/$rowimages->description;}?>%;">
																	<label class="secondary-label">
																		<div class="radio-block big">
																		<input <?php if(trim($rowimages->hc_other_field)==$i){echo 'checked="checked"';} ?> type="radio" name="preview_radio_<?php echo $rowimages->id; ?>" >
																		
																			<?php if($style_values['form_radio_type']=='circle'){ ?>
																				<i class="hugeicons-dot-circle-o active"></i>
																				<i class="hugeicons-circle-o passive"></i>
																			<?php }else{ ?>			
																				<i class="hugeicons-check-square active"></i>
																				<i class="hugeicons-square-o passive"></i>
																			<?php }?>	
																		</div>
																		<span class="sublable"><?php echo $option; ?></span>
																	</label>
																</li>
															<?php $i++; } ?>
														</ul>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php 
											break;
											case 'file_box':  //6
											?>
												<script>
												jQuery(document).ready(function(){
													function mbToBytes(mb){
														var convertedByte=Math.round(mb*1048576*100000)/100000;
														return convertedByte;
													}
													var byteRes=mbToBytes(<?php echo $rowimages->name;?>);
													jQuery(".hugeit-contact-column-block input[name='MAX_FILE_SIZE']").attr('value',byteRes);
												})
													
												</script>
												<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo htmlspecialchars($rowimages->id);?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?></label>
													<div class="field-block file-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
														<input type="text" class="textholder" placeholder="<?php if($rowimages->hc_input_show_default=='formsInsideAlign') echo $rowimages->hc_field_label;?>"/>
														<span class="uploadbutton">
															<?php if($style_values['form_file_has_icon']=='on'):?>
															<?php if($style_values['form_file_icon_position']=="left"){?><i class="<?php echo $style_values['form_file_icon_style']; ?>"></i><?php } ?>
															<?php endif;?>
															<?php echo $style_values['form_file_button_text'];?>
															<?php if($style_values['form_file_has_icon']=='on'):?>
															<?php if($style_values['form_file_icon_position']=="right"){?><i class="<?php echo $style_values['form_file_icon_style']; ?>"></i><?php }?>
															<?php endif;?>
														</span>
														<input type="hidden" name="MAX_FILE_SIZE" value="" />
														<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="file" name="userfile"/>
													</div>
													<span class="hugeit-error-message"></span>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php 
											break;
											case 'custom_text':  //7
											?>
												<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<?php echo $rowimages->name; ?>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php 
											break;
											case 'captcha' //8
											?>
												<div class="hugeit-field-block captcha-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<script type="text/javascript">
													  var verifyCallback = function(response) {
													  };
													  var onloadCallback = function() {
														grecaptcha.render('democaptchalight', {
														  'sitekey' : '<?php echo $paramssld['form_captcha_public_key']; ?>',
														  'callback' : verifyCallback,
														  'theme' : 'light',
														  'type' : '<?php echo $rowimages->name; ?>'
														});
														
														grecaptcha.render('democaptchadark', {
														  'sitekey' : '<?php echo $paramssld['form_captcha_public_key']; ?>',
														  'callback' : verifyCallback,
														  'theme' : 'dark',
														  'type' : '<?php echo $rowimages->name; ?>'
														});
													  };

													</script>
													<?php $capPos='right';if($rowimages->hc_input_show_default=='2')$capPos="left";?>
													<div <?php if($rowimages->hc_required=='dark'){echo 'style="display:none"';}else{echo 'style="float:'.$capPos.'"';}?> id="democaptchalight"></div>
													<div <?php if($rowimages->hc_required=='light'){echo 'style="display:none"';}else{echo 'style="float:'.$capPos.'"';}?> id="democaptchadark"></div>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php
											break;
											case 'buttons' //9
											?>
												<div class="hugeit-field-block buttons-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
													<button type="submit" class="submit" id="hugeit_preview_button__submit_<?php echo $rowimages->id;?>" value="Submit">
														<?php if($style_values['form_button_icons_position']=="left" and $style_values['form_button_submit_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_submit_icon_style']; ?>"></i><?php }?>
														<?php echo $rowimages->description; ?>
														<?php if($style_values['form_button_icons_position']=="right" and $style_values['form_button_submit_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_submit_icon_style']; ?>"></i><?php }?>
													</button>
													<button type="reset" class="reset" <?php if($rowimages->hc_required!='checked') echo 'style="display: none;"'?> id="hugeit_preview_button_reset_<?php echo $rowimages->id;?>" value="Reset">													
														<?php if($style_values['form_button_icons_position']=="left" and $style_values['form_button_reset_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_reset_icon_style']; ?>"></i><?php }?>
														<?php echo $rowimages->hc_field_label; ?>
														<?php if($style_values['form_button_icons_position']=="right" and $style_values['form_button_reset_has_icon']=="on"){?><i class="<?php echo $style_values['form_button_reset_icon_style']; ?>"></i><?php }?>
													</button>
													<span class="hugeOverlay"></span>
													<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
													<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
												</div>
											<?php
											break;
											case 'e_mail':  //10
												?>
													<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
														<label class="<?php if($rowimages->hc_input_show_default!='1') echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?> </label>
														<div class="field-block input-text-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
															<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="<?php echo $rowimages->field_type;?>" placeholder="<?php echo $rowimages->name;?>" class="<?php if($rowimages->hc_required == 'on'){echo 'required';}?>" <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?> />
														</div>
														<span class="hugeit-error-message"></span>
														<span class="hugeOverlay"></span>
														<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
														<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
													</div>
												<?php
												
											break;
										}
									}
								}
							?>
						</div>
					<div class="clear"></div>
					</div>
				</div>
				</form>
			</div>
			<!-- ################################################ LIVE PREVIEW GOESE TO FRONT END #################################################### -->	
		</div>
	</div>
	<input type="hidden" name="task" value="" />
	<?php @session_start();
		  $hugeItFormCSRFToken = $_SESSION["csrf_token_hugeit_forms"] = md5(time());
	?>
	<input type="hidden" name="csrf_token_hugeit_forms" value="<?php echo $hugeItFormCSRFToken; ?>" />
</form>
</div>

<?php

}

?>

<?php
function html_captcha_keys($param_values){
	global $wpdb;

?>
	<style>
		html.wp-toolbar {
			padding:0px !important;
		}
		#wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
			display:none;
		}
		#wpbody-content {
			padding-bottom:30px;
		}
		#adminmenuwrap {display:none !important;}
		.auto-fold #wpcontent, .auto-fold #wpfooter {
			margin-left: 0px;
		}
		#wpfooter {display:none;}
		iframe {height:250px !important;}
		#TB_window {height:250px !important;}
		#adminFormPopup label{
			width: 20% !important;
    		display: inline-block !important;
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {			

			jQuery('.huge-it-insert-post-button').on('click', function() {
				var ID1 = jQuery('#huge_it_add_video_input').val();
				if(ID1==""){alert("Please copy and past url form Youtobe or Vimeo to insert into slider.");return false;}
				
				window.parent.uploadID.val(ID1);
				
				tb_remove();
				jQuery("#save-buttom").click();
			});
								
			jQuery('.updated').css({"display":"none"});
			<?php	if(isset($_GET["closepop"])&&$_GET["closepop"] == 1){ ?>
				jQuery("#closepopup").click();
				self.parent.location.reload();
			<?php	} ?>
			

			

		});		
	</script>
	<a id="closepopup"  onclick=" parent.eval('tb_remove()')" style="display:none;" > [X] </a>

	<div id="huge_it_contacts_captcha_keys">
		<div id="huge_it_contacts_captcha_keys_wrap">
			<h2>Captcha Keys</h2>
			<div class="control-panel">
				<p>Please register your blog through the <a href="https://www.google.com/recaptcha/admin" target="_blank">Google reCAPTCHA admin page</a> and enter the public and private key in the fields below.</p>			
				<form method="post" action="admin.php?page=hugeit_forms_main_page" id="adminFormPopup" name="admin_form">
					<div>
						<label for="form_captcha_public_key">Captcha Public Key</label>
						<input type="text" id="form_captcha_public_key" name="params[form_captcha_public_key]" value="<?php echo $param_values['form_captcha_public_key']; ?>" />
					</div>
					<div>
						<label for="form_captcha_private_key">Captcha Private Key</label>
						<input type="text" id="form_captcha_private_key" name="params[form_captcha_private_key]" value="<?php echo $param_values['form_captcha_private_key']; ?>" />
					</div>
					<button onclick="submitbutton(<?php echo $_GET['id']; ?>)" class='button-primary'>Save</button>
				</form>
				<p><a href="https://developers.google.com/recaptcha/intro">What is this all about?</a></p>
				<p>Please be known you may always change it from <a target="blank" href="admin.php?page=hugeit_forms_general_options&closepop=1">General Options</a></p>
			</div>
		</div>	
	</div>
	<script>
		function submitbutton(pressbutton){
			window.onbeforeunload = null;	
			document.getElementById("adminFormPopup").action=document.getElementById("adminFormPopup").action+"&task=captcha_keys&id="+pressbutton+"&closepop=1";
			document.getElementById("adminFormPopup").submit();	
		}		
	</script>
<?php

	
	
	
}
?>
