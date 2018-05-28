<?php
if(! defined( 'ABSPATH' )) exit;
function hugeit_contact_formBuilder_ajax_action_callback(){
	global $wpdb;
	//Draw the form
	function drawThemeNew($themeId) { ob_start(); 
		global $wpdb;
		$query = "SELECT *  from " . $wpdb->prefix . "huge_it_contact_style_fields where options_name = '".$themeId."' ";
	    $rows = $wpdb->get_results($query);
	    $style_values = array();
	    foreach ($rows as $row) {
	        $key = $row->name;
	        $value = $row->value;
	        $style_values[$key] = $value;
	    }

		//return $newCss;		
	?>
	    	    #hugeit-contact-wrapper { width:<?php echo $style_values["form_wrapper_width"]; ?>%; <?php $color = explode(",", $style_values["form_wrapper_background_color"]); if($style_values["form_wrapper_background_type"]=="color"){?> background:#<?php echo $color[0]; ?>; <?php } elseif($style_values["form_wrapper_background_type"]=="gradient"){ ?> background: -webkit-linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* For Firefox 3.6 to 15 */ background: linear-gradient(#<?php echo $color[0]; ?>, #<?php echo $color[1]; ?>); /* Standard syntax */ <?php } ?> } #hugeit-contact-wrapper > div { border:<?php echo $style_values["form_border_size"]; ?>px solid #<?php echo $style_values["form_border_color"]; ?>; } #hugeit-contact-wrapper > div > h3 { <?php if($style_values["form_show_title"]=="on"):?>position:relative; display:block; clear:both !important; padding:5px 0px 10px 2% !important; font-size:<?php echo $style_values["form_title_size"]; ?>px !important; line-height:<?php echo $style_values["form_title_size"]; ?>px !important; color:#<?php echo $style_values["form_title_color"]; ?> !important; margin: 10px 0 15px 0 !important;<?php else:?>display:none;<?php endif;?> } #hugeit-contact-wrapper label { font-size:<?php echo $style_values["form_label_size"]; ?>px; color:#<?php echo $style_values["form_label_color"]; ?>; font-family:<?php echo $style_values["form_label_font_family"]; ?>; } #hugeit-contact-wrapper .hugeit-contact-column-block > div > label { display:block; width:38%; float:left; margin-right:2%; cursor: move; } #hugeit-contact-wrapper .hugeit-contact-column-block > div .field-block { display:inline-block; width:60%; /*min-width:150px;*/ } #hugeit-contact-wrapper label.error { color:#<?php echo $style_values["form_label_error_color"]; ?>; } #hugeit-contact-wrapper label em.required-star{ color: #<?php echo $style_values["form_label_required_color"]; ?>; } #hugeit-contact-wrapper .hugeit-contact-column-block > div .field-block ul li label span.sublable{vertical-align: super;} #hugeit-contact-wrapper .hugeit-contact-column-block > div > label.formsRightAlign{ text-align: right !important; } #hugeit-contact-wrapper .hugeit-contact-column-block > div > label.formsAboveAlign{ width:100% !important; float:none !important; padding-bottom: 5px !important; } #hugeit-contact-wrapper .hugeit-contact-column-block > div .formsAboveAlign { width:100% !important; } #hugeit-contact-wrapper .hugeit-contact-column-block > div > label.formsInsideAlign{ display:none !important; } #hugeit-contact-wrapper .hugeit-contact-column-block > div .formsInsideAlign { width:100% !important; } .input-text-block input,.input-text-block input:focus { height:<?php echo $style_values["form_input_text_font_size"]*2; ?>px; <?php if($style_values["form_input_text_has_background"]=="on"){?> background:#<?php echo $style_values["form_input_text_background_color"]; ?>; <?php }else { ?> background:none; <?php } ?> border:<?php echo $style_values["form_input_text_border_size"]; ?>px solid #<?php echo $style_values["form_input_text_border_color"]; ?> !important; box-shadow:none !important ; border-radius:<?php echo $style_values["form_input_text_border_radius"]; ?>px; font-size:<?php echo $style_values["form_input_text_font_size"]; ?>px; color:#<?php echo $style_values["form_input_text_font_color"]; ?>; margin:0px !important; outline:none; }.textarea-block textarea { <?php if($style_values["form_textarea_has_background"]=="on"){?> background:#<?php echo $style_values["form_textarea_background_color"]; ?>; <?php }else { ?> background:none; <?php } ?> border:<?php echo $style_values["form_textarea_border_size"]; ?>px solid #<?php echo $style_values["form_textarea_border_color"]; ?>; border-radius:<?php echo $style_values["form_textarea_border_radius"]; ?>px; font-size:<?php echo $style_values["form_textarea_font_size"]; ?>px; color:#<?php echo $style_values["form_textarea_font_color"]; ?>; margin:0px !important; } .radio-block, .checkbox-block { position:relative; float:left; margin:0px 5px 0px 5px; display: block; } .radio-block input, .checkbox-block input { visibility:hidden; position:absolute; top:0px; left:0px; } .radio-block i { display:inline-block; float:left; width:20px; color:#<?php echo $style_values["form_radio_color"]; ?>; } .checkbox-block i { display:inline-block; float:left; width:20px; color:#<?php echo $style_values["form_checkbox_color"]; ?>; } #hugeit-contact-wrapper.big-radio .radio-block i ,#hugeit-contact-wrapper.big-checkbox .checkbox-block i {font-size:24px;} #hugeit-contact-wrapper.medium-radio .radio-block i ,#hugeit-contact-wrapper.medium-checkbox .checkbox-block i {font-size:20px;} #hugeit-contact-wrapper.small-radio .radio-block i ,#hugeit-contact-wrapper.small-checkbox .checkbox-block i {font-size:15px;} .radio-block i:hover { color:#<?php echo $style_values["form_radio_hover_color"]; ?>; } .checkbox-block i:hover { color:#<?php echo $style_values["form_checkbox_hover_color"]; ?>; } .radio-block i.active, .checkbox-block i.active {display:none;} .radio-block input:checked + i.active + i.passive, .checkbox-block input:checked + i.active + i.passive {display:none;} .radio-block input:checked + i.active, .radio-block input:checked + i.active:hover { display:inline-block; color:#<?php echo $style_values["form_radio_active_color"]; ?>; } .checkbox-block input:checked + i.active, .checkbox-block input:checked + i.active:hover { display:inline-block; color:#<?php echo $style_values["form_checkbox_active_color"]; ?>; } .selectbox-block { position:relative; height:<?php echo $style_values["form_selectbox_font_size"]*2+$style_values["form_selectbox_border_size"]; ?>px; } .selectbox-block select { position:relative; height:<?php echo $style_values["form_selectbox_font_size"]*2-$style_values["form_selectbox_border_size"]*2; ?>px; margin:<?php echo $style_values["form_selectbox_border_size"]; ?>px 0px 0px 1px !important; opacity:0; z-index:2; } .selectbox-block .textholder { position:absolute; height:<?php echo $style_values["form_selectbox_font_size"]*2; ?>px; width:90%; padding-right:10%; margin:0px !important; top;0px; left:0px; border:0px; color:#<?php echo $style_values["form_selectbox_font_color"]; ?>; background:none; border:<?php echo $style_values["form_selectbox_border_size"]; ?>px solid #<?php echo $style_values["form_selectbox_border_color"]; ?>; border-radius:<?php echo $style_values["form_selectbox_border_radius"]; ?>px; color:#<?php echo $style_values["form_selectbox_font_color"]; ?>; font-size:<?php echo $style_values["form_selectbox_font_size"]; ?>px; <?php if($style_values["form_selectbox_has_background"]=="on"){?> background:#<?php echo $style_values["form_selectbox_background_color"]; ?>; <?php }else { ?> background:none; <?php } ?> } .selectbox-block i { position:absolute; top:<?php echo $style_values["form_selectbox_font_size"]/2+$style_values["form_selectbox_border_size"]/4; ?>px; right:10px; z-index:0; color:#<?php echo $style_values["form_selectbox_arrow_color"]; ?>; font-size:<?php echo $style_values["form_selectbox_font_size"]; ?>px; } .file-block { position:relative; cursor:pointer; } .file-block .textholder { position:relative; float:left; width:calc(60% - <?php echo $style_values["form_file_border_size"]*2 + 5; ?>px) !important; height:<?php echo $style_values["form_file_font_size"]*2; ?>px; margin:0px; border:<?php echo $style_values["form_file_border_size"]; ?>px solid #<?php echo $style_values["form_file_border_color"]; ?> !important; border-radius:<?php echo $style_values["form_file_border_radius"]; ?>px !important; font-size:<?php echo $style_values["form_file_font_size"]; ?>px; color:#<?php echo $style_values["form_file_font_color"]; ?>; <?php if($style_values["form_file_has_background"]=="on"){?> background:#<?php echo $style_values["form_file_background"]; ?>; <?php }else { ?> background:none; <?php } ?> padding:0px 40% 0px 5px !important; box-sizing: content-box; -moz-box-sizing: content-box; } .file-block .uploadbutton { position:absolute; top:0px; right:0px; width:38%; border-top:<?php echo $style_values["form_file_border_size"]; ?>px solid #<?php echo $style_values["form_file_border_color"]; ?> !important; border-bottom:<?php echo $style_values["form_file_border_size"]; ?>px solid #<?php echo $style_values["form_file_border_color"]; ?> !important; border-right:<?php echo $style_values["form_file_border_size"]; ?>px solid #<?php echo $style_values["form_file_border_color"]; ?> !important; border-top-right-radius:<?php echo $style_values["form_file_border_radius"]; ?>px !important; border-bottom-right-radius:<?php echo $style_values["form_file_border_radius"]; ?>px !important; <?php $fileheight=$style_values["form_file_font_size"]*2; ?> height:<?php echo $fileheight; ?>px; padding:0px 1%; margin:0px; overflow: hidden; font-size:<?php echo $style_values["form_file_font_size"]; ?>px; line-height:<?php echo $style_values["form_file_font_size"]*2; ?>px; color:#<?php echo $style_values["form_file_button_text_color"]; ?>; background:#<?php echo $style_values["form_file_button_background_color"]; ?>; text-align:center; -webkit-transition: all 0.5s ease; transition: all 0.5s ease; box-sizing:content-box; } .file-block:hover .uploadbutton { color:#<?php echo $style_values["form_file_button_text_color"]; ?>; background:#<?php echo $style_values["form_file_button_background_color"]; ?>; vertical-align: baseline; } .file-block .uploadbutton i { color:#<?php echo $style_values["form_file_icon_color"]; ?>; font-size:<?php echo $style_values["form_file_font_size"]; ?>px; vertical-align: baseline; -webkit-transition: all 0.5s ease; transition: all 0.5s ease; } .file-block:hover .uploadbutton { color:#<?php echo $style_values["form_file_button_text_hover_color"]; ?>; background:#<?php echo $style_values["form_file_button_background_hover_color"]; ?>; } .file-block:hover .uploadbutton i { color:#<?php echo $style_values["form_file_icon_hover_color"]; ?>; } .file-block input[type="file"] { height:30px; width:100%; position:absolute; top:0px; left:0px; opacity:0; cursor:pointer; } .captcha-block div { margin-right:-1px; } .buttons-block { <?php if($style_values["form_button_position"]=="left"){echo "text-align:left;";} else if ($style_values["form_button_position"]=="right"){echo "text-align:right;";} else {echo "text-align:center;";} ?> } .buttons-block button { height:auto; padding:<?php echo $style_values["form_button_padding"]; ?>px <?php echo $style_values["form_button_padding"]*2; ?>px <?php echo $style_values["form_button_padding"]; ?>px <?php echo $style_values["form_button_padding"]*2; ?>px; cursor:pointer; text-transform: none; <?php if($style_values["form_button_fullwidth"]=="on"){ ?> clear:both; width:100%; padding-left:0px; padding-right:0px; margin:0px 0px 0px 0px !important; padding-left:0px; padding-right:0px; <?php } ?> font-size:<?php echo $style_values["form_button_font_size"]; ?>px; } .buttons-block button.submit { color:#<?php echo $style_values["form_button_submit_font_color"]; ?> !important; background-color:#<?php echo $style_values["form_button_submit_background"]; ?> !important; border:<?php echo $style_values["form_button_submit_border_size"]; ?>px solid #<?php echo $style_values["form_button_submit_border_color"]; ?> !important; border-radius:<?php echo $style_values["form_button_submit_border_radius"]; ?>px !important; -webkit-transition: all 0.5s ease !important; transition: all 0.5s ease !important; margin:0px 0px 5px 0px !important; } .buttons-block button.submit:hover { color:#<?php echo $style_values["form_button_submit_font_hover_color"]; ?> !important; background:#<?php echo $style_values["form_button_submit_hover_background"]; ?> !important; } .buttons-block button.submit i { color:#<?php echo $style_values["form_button_submit_icon_color"]; ?> !important; vertical-align: baseline !important; font-size:<?php echo $style_values["form_button_font_size"]; ?>px !important; -webkit-transition: all 0.5s ease !important; transition: all 0.5s ease !important; } .buttons-block button.submit:hover i { color:#<?php echo $style_values["form_button_submit_icon_hover_color"]; ?> !important; } .buttons-block button.reset { color:#<?php echo $style_values["form_button_reset_font_color"]; ?> !important; background-color:#<?php echo $style_values["form_button_reset_background"]; ?> !important; border:<?php echo $style_values["form_button_reset_border_size"]; ?>px solid #<?php echo $style_values["form_button_reset_border_color"]; ?> !important; border-radius:<?php echo $style_values["form_button_reset_border_radius"]; ?>px !important; -webkit-transition: all 0.5s ease !important; transition: all 0.5s ease !important; } .buttons-block button.reset:hover { color:#<?php echo $style_values["form_button_reset_font_hover_color"]; ?> !important; background:#<?php echo $style_values["form_button_reset_hover_background"]; ?> !important; } .buttons-block button.reset i { color:#<?php echo $style_values["form_button_reset_icon_color"]; ?> !important; vertical-align: baseline !important; font-size:<?php echo $style_values["form_button_font_size"]; ?>px !important; -webkit-transition: all 0.5s ease !important; transition: all 0.5s ease !important; } .buttons-block button.reset:hover i { color:#<?php echo $style_values["form_button_reset_icon_hover_color"]; ?> !important; }

	<?php
	    return ob_get_clean();
	}
	//1 Textbox //
	function textBoxHtml($rowimages) { ob_start(); ?>
	    <div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
			<label class="<?php if($rowimages->hc_input_show_default!='1')echo $rowimages->hc_input_show_default;?>" for="hugeit_preview_textbox_<?php echo $rowimages->id;?>"><?php echo $rowimages->hc_field_label; if($rowimages->hc_required == 'on'){ echo '<em class="required-star">*</em>';} ?> </label>
			<div class="field-block input-text-block <?php if($rowimages->hc_input_show_default=='formsAboveAlign'||$rowimages->hc_input_show_default=='formsInsideAlign')echo $rowimages->hc_input_show_default;?>">
				<input id="hugeit_preview_textbox_<?php echo $rowimages->id;?>" type="text" placeholder="<?php echo $rowimages->name;?>" class="<?php if($rowimages->hc_required == 'on'){echo 'required';}?>"  <?php if($rowimages->description != 'on'){echo 'disabled="disabled"';}?>/>
			</div>
			<span class="hugeit-error-message"></span>
			<span class="hugeOverlay"></span>
			<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
			<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
		</div>
	<?php
	    return ob_get_clean();
	}
	function textBoxSettingsHtml($rowimages){ob_start(); ?>
		<li id="huge-contact-field-<?php echo $rowimages->id; ?>"  data-fieldNum="<?php echo $rowimages->id; ?>">	
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
			
			<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}

	//2 Textarea //
    function textareaHtml($rowimages) { ob_start(); ?>
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
	    return ob_get_clean();
	}

	function textareaSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"  data-fieldNum="<?php echo $rowimages->id; ?>">
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
			<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//3 Selectbox //
	function selectboxHtml($rowimages) { ob_start(); ?>
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
	    return ob_get_clean();
	}

	function selectboxSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"  data-fieldNum="<?php echo $rowimages->id; ?>">
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>

				</div>
			</div>
		<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//4 Checkbox //
	function checkboxHtml($rowimages,$themeId) { ob_start(); 
		global $wpdb;
		$query = "SELECT *  from " . $wpdb->prefix . "huge_it_contact_style_fields where options_name = '".$themeId."' ";
	    $rows = $wpdb->get_results($query);
	    $style_values = array();
	    foreach ($rows as $row) {
	        $key = $row->name;
	        $value = $row->value;
	        $style_values[$key] = $value;
	    }?>
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
	    return ob_get_clean();
	}

	function checkboxSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"  data-fieldNum="<?php echo $rowimages->id; ?>">
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
		<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//5 Radiobox //
	function radioboxHtml($rowimages,$themeId) { ob_start(); 
		global $wpdb;
		$query = "SELECT *  from " . $wpdb->prefix . "huge_it_contact_style_fields where options_name = '".$themeId."' ";
	    $rows = $wpdb->get_results($query);
	    $style_values = array();
	    foreach ($rows as $row) {
	        $key = $row->name;
	        $value = $row->value;
	        $style_values[$key] = $value;
	    }?>
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
	    return ob_get_clean();
	}

	function radioboxSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"   data-fieldNum="<?php echo $rowimages->id; ?>">
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
		<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//6 Filebox //
	function fileboxHtml($rowimages,$themeId) { ob_start(); 
		global $wpdb;
		$query = "SELECT *  from " . $wpdb->prefix . "huge_it_contact_style_fields where options_name = '".$themeId."' ";
	    $rows = $wpdb->get_results($query);
	    $style_values = array();
	    foreach ($rows as $row) {
	        $key = $row->name;
	        $value = $row->value;
	        $style_values[$key] = $value;
	    }?>
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
	    return ob_get_clean();
	}

	function fileboxSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"  data-fieldNum="<?php echo $rowimages->id; ?>">
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
		<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//7 Custom Text //
	function cutomtextHtml($rowimages) { ob_start(); ?>
		<div class="hugeit-field-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
			<?php echo $rowimages->name; ?>
			<span class="hugeOverlay"></span>
			<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
			<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
		</div>
	<?php
	    return ob_get_clean();
	}

	function cutomtextSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"   data-fieldNum="<?php echo $rowimages->id; ?>">
			<input type="hidden" class="left-right-position"   name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
			<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
			<h4>Custom Text</h4>
			<div class="fields-options">	
				<div class="left tinymce_custom_text">
					<?php	wp_editor($rowimages->name, "titleimage".$rowimages->id); ?>
				</div>
				<div class="field-top-options-block">
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="copy-field" href="#"><span><p>Duplicate Field</p></span></a>
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
	    return ob_get_clean();
	}
	//8 Captcha //
	function captchaHtml($rowimages) { ob_start(); ?>
		<div class="hugeit-field-block captcha-block" rel="huge-contact-field-<?php echo $rowimages->id; ?>">
			<?php $capPos='right';if($rowimages->hc_input_show_default=='2')$capPos="left";?>
			<div <?php if($rowimages->hc_required=='dark'){echo 'style="display:none"';}else{echo 'style="float:'.$capPos.'"';}?> id="democaptchalight"></div>
			<div <?php if($rowimages->hc_required=='light'){echo 'style="display:none"';}else{echo 'style="float:'.$capPos.'"';}?> id="democaptchadark"></div>
			<span class="hugeOverlay"></span>
			<input type="hidden" class="ordering" name="hc_ordering<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>">
			<input type="hidden" class="left-right-position" name="hc_left_right<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->hc_left_right; ?>" />
		</div>
	<?php
	    return ob_get_clean();
	}

	function captchaSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"  data-fieldNum="<?php echo $rowimages->id; ?>" data-fieldType="captcha">
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
			<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//9 Buttons //
	function buttonsHtml($rowimages,$themeId) { ob_start(); 
		global $wpdb;
		$query = "SELECT * from " . $wpdb->prefix . "huge_it_contact_style_fields where options_name = '".$themeId."' ";
	    $rows = $wpdb->get_results($query);
	    $style_values = array();
	    foreach ($rows as $row) {
	        $key = $row->name;
	        $value = $row->value;
	        $style_values[$key] = $value;
	    }
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
	    return ob_get_clean();
	}

	function buttonsSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"   data-fieldNum="<?php echo $rowimages->id; ?>" data-fieldType="buttons">
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
					<div id="go_to_url_field" <?php if($rowimages->hc_other_field != 'go_to_url'){ echo "style='display:none;'";}?>>
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
					<a class="remove-field" href="#"><span><p>Remove Field</p></span></a>
					<a class="open-close" href="#"><span><p>Edit Field</p></span></a>
				</div>
			</div>
			<div class="clear"></div>
		</li>
	<?php
	    return ob_get_clean();
	}
	//10 Email //
	function emailHtml($rowimages) { ob_start(); ?>
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
	    return ob_get_clean();
	}

	function emailSettingsHtml($rowimages) { ob_start(); ?>
    	<li id="huge-contact-field-<?php echo $rowimages->id; ?>"   data-fieldNum="<?php echo $rowimages->id; ?>">		
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
	    return ob_get_clean();
	}
	//ADD FIELDS
	if(isset($_POST['task'])&&$_POST['task']=='addFieldsTask'){
		if(isset($_POST['nonce'])){
			$nonce = $_POST['nonce'];
		}else{
			$nonce ='';
		}		
		if ( !wp_verify_nonce( $nonce, 'builder_nonce' ) )return;
		$formId=$_POST['formId'];
		$inputtype=$_POST['inputType'];
		$themeId=$_POST['themeId'];
		switch ($inputtype) {
		    case 'text':
		        $inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			    $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'Placeholder', '".$formId."', 'on', '".$inputtype."', 'Textbox', '','text','', '0', 2, '1', 'left' )";
		        $wpdb->query($sql_type_text);

		        $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>textBoxHtml($rowimages[0]),"outputFieldSettings"=>textBoxSettingsHtml($rowimages[0])));
		        break;

		    case 'textarea':
			    $inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			    $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'Placeholder', '".$formId."', 'on', '".$inputtype."', 'Textarea', '80','on','on', '0', 2, '1', 'left' )";		   
			      $wpdb->query($sql_type_text);

			    $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>textareaHtml($rowimages[0]),"outputFieldSettings"=>textareaSettingsHtml($rowimages[0])));
		        break;

		    case 'selectbox':
		        $inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			    $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'Option 1;;Option 2', '".$formId."', '', '".$inputtype."', 'Selectbox', 'Option 2', 'par_TV', 2, '1', 'left' )";		   
			     $wpdb->query($sql_type_text);

			    $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>selectboxHtml($rowimages[0]),"outputFieldSettings"=>selectboxSettingsHtml($rowimages[0])));
		     	break;

		     case 'checkbox':
			     $inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			     $sql_type_text = "
				 INSERT INTO 
				 `" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`, `published`, `hc_input_show_default`,`hc_required`, `hc_left_right`) VALUES
				 ( 'On', '".$formId."', 'on', '".$inputtype."', 'Checkbox', '', '1', 2, '1','on', 'left' )";		   
			     $wpdb->query($sql_type_text);

			    $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>checkboxHtml($rowimages[0],$themeId),"outputFieldSettings"=>checkboxSettingsHtml($rowimages[0])));
		     	break;

	     	case 'radio_box':
		     	$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			    $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`, `hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'option 1;;option 2', '".$formId."', '2', '".$inputtype."', 'Radio Box', 'option 1', '1', 'text', 'par_TV', '2', '1', 'left' )";		   
		      	$wpdb->query($sql_type_text);

		      	$queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>radioboxHtml($rowimages[0],$themeId),"outputFieldSettings"=>radioboxSettingsHtml($rowimages[0])));
		     	break;

	     	case 'file_box':
		     	$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
		   		 $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` (`name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( '5', '".$formId."', 'on', '".$inputtype."', 'Filebox', 'jpg, jpeg, gif, png, docx, xlsx, pdf','','', 'par_TV', 2, '1', 'left' )";		   
		      	$wpdb->query($sql_type_text);

		      	$queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>fileboxHtml($rowimages[0],$themeId),"outputFieldSettings"=>fileboxSettingsHtml($rowimages[0])));
		     	break;

	     	case 'custom_text':
		     	$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			    $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'Placeholder', '".$formId."', 'on', '".$inputtype."', 'Label', '80','on','on', 'par_TV', 2, '1', 'left' )";				   
		        $wpdb->query($sql_type_text);

		        $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    echo json_encode(array("outputField"=>cutomtextHtml($rowimages[0]),"outputFieldSettings"=>cutomtextSettingsHtml($rowimages[0]),"customText"=>"titleimage".$fieldID.""));
		     	break;

	     	case 'captcha':
	     		$query = "SELECT *  from " . $wpdb->prefix . "huge_it_contact_general_options ";
			    $rowspar = $wpdb->get_results($query);
			    $paramssld = array();
			    foreach ($rowspar as $rowpar) {
			        $key = $rowpar->name;
			        $value = $rowpar->value;
			        $paramssld[$key] = $value;
			    }
			    $capKeyPub=$paramssld['form_captcha_public_key'];
			    $capKeyPriv=$paramssld['form_captcha_private_key'];
			    if($capKeyPub != '' && $capKeyPriv != ''){
					$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
				    $sql_type_text = "
					INSERT INTO 
					`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
					( 'image', '".$formId."', '', '".$inputtype."', '', '','', 'light', '0', 2, '1', 'left' )";		   
			      	$wpdb->query($sql_type_text);

			      	$queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
				    $row8=$wpdb->get_results($queryMax);
				    $fieldID=$row8[0]->resId;
				    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
				    $rowimages=$wpdb->get_results($fieldQuery);
				    $query = "SELECT *  from " . $wpdb->prefix . "huge_it_contact_general_options ";
				    $rowspar = $wpdb->get_results($query);
				    $paramssld = array();
				    foreach ($rowspar as $rowpar) {
				        $key = $rowpar->name;
				        $value = $rowpar->value;
				        $paramssld[$key] = $value;
				    }
				    $capKeyPub=$paramssld['form_captcha_public_key'];
				    echo json_encode(array("outputField" => captchaHtml($rowimages[0]),"outputFieldSettings" => captchaSettingsHtml($rowimages[0]),"captchaNum" => $capKeyPub));
				}else{
					echo json_encode(array("captchaNum" => $capKeyPub,"toRedirect"=>"admin.php?page=hugeit_forms_main_page&task=captcha_keys&id=".$formId."&TB_iframe=1"));
				}
		     	break;

	     	case 'buttons':
		     	$query=$wpdb->prepare("SELECT MAX(ordering) AS res FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($query);
			    $resOfMax=$row8[0]->res;
			    $resOfMax=$resOfMax+1;
			    $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($query);
			    $leftRightPos='left';
			    foreach ($row8 as $value) {
			    	if($value->hc_left_right=='right'){$leftRightPos='right';}
			    }
				$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
				$sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'text', '".$formId."', 'Submit', '".$inputtype."', 'Reset', 'print_success_message','','', '".$resOfMax."', 2, '1', '".$leftRightPos."' )";		   
		      	$wpdb->query($sql_type_text);

		      	$queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>buttonsHtml($rowimages[0],$themeId),"outputFieldSettings"=>buttonsSettingsHtml($rowimages[0]),"buttons" => 'button'));
		     	break;

	     	case 'e_mail':
		     	$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
			    $sql_type_text = "
				INSERT INTO 
				`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
				( 'Type Your Email', '".$formId."', 'on', '".$inputtype."', 'E-mail', '','name','', '0', 2, '1', 'left' )";
		        $wpdb->query($sql_type_text);

		        $queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
			    $row8=$wpdb->get_results($queryMax);
			    $fieldID=$row8[0]->resId;
			    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
			    $rowimages=$wpdb->get_results($fieldQuery);
			    echo json_encode(array("outputField"=>emailHtml($rowimages[0]),"outputFieldSettings"=>emailSettingsHtml($rowimages[0])));
		     	break;

		}
		
	}
	//REMOVE FIELDS
	if(isset($_POST['task'])&&$_POST['task']=='removeFieldTask'){
		if(isset($_POST['nonce'])){
			$nonce = $_POST['nonce'];
		}else{
			$nonce ='';
		}		
		if ( !wp_verify_nonce( $nonce, 'builder_nonce' ) )return;
		$formId=$_POST['formId'];
		$all=$_POST['formData'];
		parse_str("$all",$myArray);
		$fieldID=$_POST['fieldId'];
		$_POSTED=$myArray;
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields where hugeit_contact_id = %d order by id ASC",$formId);
	    $rowim=$wpdb->get_results($query);
		if(isset($_POSTED["name"])){
			if($_POSTED["name"] != ''){
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  name = %s  WHERE id = %d ", $_POSTED["name"], $formId));
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  hc_yourstyle = %s  WHERE id = %d ", $_POSTED["select_form_theme"], $formId));
			}
		}	   
	   foreach ($rowim as $key=>$rowimages){
		   if(isset($_POSTED)&&isset($_POSTED["hc_left_right".$rowimages->id.""])){
			   if($_POSTED["hc_left_right".$rowimages->id.""]){
			   	$id=$rowimages->id;
					if(isset($_POSTED["field_type".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  field_type = %s WHERE id = %d",$_POSTED["field_type".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_other_field".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_other_field = %s WHERE id = %d",$_POSTED["hc_other_field".$rowimages->id.""],$id));
					if(isset($_POSTED["titleimage".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  name = %s  WHERE id = %d",stripslashes($_POSTED["titleimage".$rowimages->id.""]),$id));
					if(isset($_POSTED["im_description".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  description = %s  WHERE id = %d",$_POSTED["im_description".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_required".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_required = %s WHERE id = %d",$_POSTED["hc_required".$rowimages->id.""],$id));
					if(isset($_POSTED["imagess".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_field_label = %s  WHERE id = %d",stripslashes($_POSTED["imagess".$rowimages->id.""]),$id));
					if(isset($_POSTED["hc_left_right".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_left_right = %s  WHERE id = %d",$_POSTED["hc_left_right".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_ordering".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  ordering = %s  WHERE id = %d",$_POSTED["hc_ordering".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_input_show_default".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_input_show_default = %s  WHERE id = %d",$_POSTED["hc_input_show_default".$rowimages->id.""],$id));
				}
			}
		}
		$query=$wpdb->prepare("DELETE FROM ".$wpdb->prefix."huge_it_contact_contacts_fields  WHERE id = %d",$fieldID);
	  	$wpdb->query($query);
	  	echo json_encode(array("removedField"=>$fieldID));
	}
	//DUBLICATE FIELDS
	if(isset($_POST['task'])&&$_POST['task']=='dublicateFieldTask'){
		if(isset($_POST['nonce'])){
			$nonce = $_POST['nonce'];
		}else{
			$nonce ='';
		}		
		if ( !wp_verify_nonce( $nonce, 'builder_nonce' ) )return;
		$formId=$_POST['formId'];
		$themeId=$_POST['themeId'];
		$all=$_POST['formData'];
		parse_str("$all",$myArray);
		$fieldID=$_POST['fieldId'];
		$_POSTED=$myArray;
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields where hugeit_contact_id = %d order by id ASC",$formId);
	    $rowim=$wpdb->get_results($query);
		if(isset($_POSTED["name"])){
			if($_POSTED["name"] != ''){
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  name = %s  WHERE id = %d ", $_POSTED["name"], $formId));
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  hc_yourstyle = %s  WHERE id = %d ", $_POSTED["select_form_theme"], $formId));
			}
		}	   
	   foreach ($rowim as $key=>$rowimages){
		   if(isset($_POSTED)&&isset($_POSTED["hc_left_right".$rowimages->id.""])){
			   if($_POSTED["hc_left_right".$rowimages->id.""]){
			   	$id=$rowimages->id;
					if(isset($_POSTED["field_type".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  field_type = %s WHERE id = %d",$_POSTED["field_type".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_other_field".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_other_field = %s WHERE id = %d",$_POSTED["hc_other_field".$rowimages->id.""],$id));
					if(isset($_POSTED["titleimage".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  name = %s  WHERE id = %d",stripslashes($_POSTED["titleimage".$rowimages->id.""]),$id));
					if(isset($_POSTED["im_description".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  description = %s  WHERE id = %d",$_POSTED["im_description".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_required".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_required = %s WHERE id = %d",$_POSTED["hc_required".$rowimages->id.""],$id));
					if(isset($_POSTED["imagess".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_field_label = %s  WHERE id = %d",stripslashes($_POSTED["imagess".$rowimages->id.""]),$id));
					if(isset($_POSTED["hc_left_right".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_left_right = %s  WHERE id = %d",$_POSTED["hc_left_right".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_ordering".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  ordering = %s  WHERE id = %d",$_POSTED["hc_ordering".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_input_show_default".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_input_show_default = %s  WHERE id = %d",$_POSTED["hc_input_show_default".$rowimages->id.""],$id));
				}
			}
		}
		///ENDS SAVING
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID);
		$rowduble=$wpdb->get_row($query);
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields where hugeit_contact_id = %d order by id ASC", $formId);
		$rowplusorder=$wpdb->get_results($query);
				   
		foreach ($rowplusorder as $key=>$rowplusorders){
			if($rowplusorders->ordering > $rowduble->ordering){
				$rowplusorderspl=$rowplusorders->ordering+1;
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET ordering = %d WHERE id = %d ", $rowplusorderspl,$rowplusorders->id));
			}
		}
		
		$inserttexttype = $wpdb->prefix . "huge_it_contact_contacts_fields";
		$rowdubleorder=$rowduble->ordering+1;
		$inputtype=$rowduble->conttype;
	    $sql_type_text = "
		INSERT INTO 
		`" . $inserttexttype . "` ( `name`, `hugeit_contact_id`, `description`, `conttype`, `hc_field_label`, `hc_other_field`, `field_type`,`hc_required`, `ordering`, `published`, `hc_input_show_default`, `hc_left_right`) VALUES
		( '".$rowduble->name."', '".$rowduble->hugeit_contact_id."', '".$rowduble->description."', '".$rowduble->conttype."', '".$rowduble->hc_field_label."', '".$rowduble->hc_other_field."','".$rowduble->field_type."','".$rowduble->hc_required."', '".$rowdubleorder."', '".$rowduble->published."', '".$rowduble->hc_input_show_default."', '".$rowduble->hc_left_right."' )";
		$wpdb->query($sql_type_text);

		$queryMax=$wpdb->prepare("SELECT MAX(id) AS resId FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE hugeit_contact_id=%d",$formId);
	    $row8=$wpdb->get_results($queryMax);
	    $fieldID2=$row8[0]->resId;
	    $fieldQuery=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields WHERE id=%d",$fieldID2);
	    $rowimages=$wpdb->get_results($fieldQuery);
		   
	    switch ($inputtype) {
		    case 'text':
			    echo json_encode(array("outputField"=>textBoxHtml($rowimages[0]),"outputFieldSettings"=>textBoxSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		        break;

		    case 'textarea':
			    echo json_encode(array("outputField"=>textareaHtml($rowimages[0]),"outputFieldSettings"=>textareaSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		        break;

		    case 'selectbox':
			    echo json_encode(array("outputField"=>selectboxHtml($rowimages[0]),"outputFieldSettings"=>selectboxSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		     	break;

		     case 'checkbox':
			    echo json_encode(array("outputField"=>checkboxHtml($rowimages[0],$themeId),"outputFieldSettings"=>checkboxSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		     	break;

	     	case 'radio_box':
			    echo json_encode(array("outputField"=>radioboxHtml($rowimages[0],$themeId),"outputFieldSettings"=>radioboxSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		     	break;

	     	case 'file_box':
			    echo json_encode(array("outputField"=>fileboxHtml($rowimages[0],$themeId),"outputFieldSettings"=>fileboxSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		     	break;

	     	case 'custom_text':
			    echo json_encode(array("outputField"=>cutomtextHtml($rowimages[0]),"outputFieldSettings"=>cutomtextSettingsHtml($rowimages[0]),"customText"=>"titleimage".$fieldID."","beforeId"=>$fieldID));
		     	break;

	     	case 'e_mail':
			    echo json_encode(array("outputField"=>emailHtml($rowimages[0]),"outputFieldSettings"=>emailSettingsHtml($rowimages[0]),"beforeId"=>$fieldID));
		     	break;

		}
	}
	//Save Form
	if(isset($_POST['task'])&&$_POST['task']=='saveEntireForm'){
		if(isset($_POST['nonce'])){
			$nonce = $_POST['nonce'];
		}else{
			$nonce ='';
		}		
		if ( !wp_verify_nonce( $nonce, 'builder_nonce' ) )return;
		$formId=$_POST['formId'];
		$all=$_POST['formData'];
		parse_str("$all",$myArray);
		$_POSTED=$myArray;
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields where hugeit_contact_id = %d order by id ASC",$formId);
	    $rowim=$wpdb->get_results($query);
		if(isset($_POSTED["name"])){
			if($_POSTED["name"] != ''){
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  name = %s  WHERE id = %d ", $_POSTED["name"], $formId));
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  hc_yourstyle = %s  WHERE id = %d ", $_POSTED["select_form_theme"], $formId));
			}
		}	   
	   foreach ($rowim as $key=>$rowimages){
		   if(isset($_POSTED)&&isset($_POSTED["hc_left_right".$rowimages->id.""])){
			   if($_POSTED["hc_left_right".$rowimages->id.""]){
			   		$id=$rowimages->id;
					if(isset($_POSTED["field_type".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  field_type = %s WHERE id = %d",$_POSTED["field_type".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_other_field".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_other_field = %s WHERE id = %d",$_POSTED["hc_other_field".$rowimages->id.""],$id));
					if(isset($_POSTED["titleimage".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  name = %s  WHERE id = %d",stripslashes($_POSTED["titleimage".$rowimages->id.""]),$id));
					if(isset($_POSTED["im_description".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  description = %s  WHERE id = %d",$_POSTED["im_description".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_required".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_required = %s WHERE id = %d",$_POSTED["hc_required".$rowimages->id.""],$id));
					if(isset($_POSTED["imagess".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_field_label = %s  WHERE id = %d",stripslashes($_POSTED["imagess".$rowimages->id.""]),$id));
					if(isset($_POSTED["hc_left_right".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_left_right = %s  WHERE id = %d",$_POSTED["hc_left_right".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_ordering".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  ordering = %s  WHERE id = %d",$_POSTED["hc_ordering".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_input_show_default".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_input_show_default = %s  WHERE id = %d",$_POSTED["hc_input_show_default".$rowimages->id.""],$id));
				}
			}
		}
		echo json_encode(array("saveForm"=>"success"));
	}
	//Change Theme
	if(isset($_POST['task'])&&$_POST['task']=='changeFormTheme'){
		if(isset($_POST['nonce'])){
			$nonce = $_POST['nonce'];
		}else{
			$nonce ='';
		}		
		if ( !wp_verify_nonce( $nonce, 'builder_nonce' ) )return;
		$formId=$_POST['formId'];
		$themeId=$_POST['themeId'];
		$all=$_POST['formData'];
		parse_str("$all",$myArray);
		$_POSTED=$myArray;
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_it_contact_contacts_fields where hugeit_contact_id = %d order by id ASC",$formId);
	    $rowim=$wpdb->get_results($query);
		if(isset($_POSTED["name"])){
			if($_POSTED["name"] != ''){
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  name = %s  WHERE id = %d ", $_POSTED["name"], $formId));
				$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts SET  hc_yourstyle = %s  WHERE id = %d ", $themeId, $formId));
			}
		}	   
	   foreach ($rowim as $key=>$rowimages){
		   if(isset($_POSTED)&&isset($_POSTED["hc_left_right".$rowimages->id.""])){
			   if($_POSTED["hc_left_right".$rowimages->id.""]){
			   		$id=$rowimages->id;
					if(isset($_POSTED["field_type".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  field_type = %s WHERE id = %d",$_POSTED["field_type".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_other_field".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_other_field = %s WHERE id = %d",$_POSTED["hc_other_field".$rowimages->id.""],$id));
					if(isset($_POSTED["titleimage".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  name = %s  WHERE id = %d",stripslashes($_POSTED["titleimage".$rowimages->id.""]),$id));
					if(isset($_POSTED["im_description".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  description = %s  WHERE id = %d",$_POSTED["im_description".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_required".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_required = %s WHERE id = %d",$_POSTED["hc_required".$rowimages->id.""],$id));
					if(isset($_POSTED["imagess".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_field_label = %s  WHERE id = %d",stripslashes($_POSTED["imagess".$rowimages->id.""]),$id));
					if(isset($_POSTED["hc_left_right".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_left_right = %s  WHERE id = %d",$_POSTED["hc_left_right".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_ordering".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  ordering = %s  WHERE id = %d",$_POSTED["hc_ordering".$rowimages->id.""],$id));
					if(isset($_POSTED["hc_input_show_default".$rowimages->id.""]))$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_it_contact_contacts_fields SET  hc_input_show_default = %s  WHERE id = %d",$_POSTED["hc_input_show_default".$rowimages->id.""],$id));
				}
			}
		}
		//
		echo drawThemeNew($themeId);
	}
	die();
}

?>