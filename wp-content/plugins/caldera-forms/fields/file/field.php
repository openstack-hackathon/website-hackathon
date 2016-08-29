<?php
	$is_multiple = null;
	if( !empty( $field['config']['multi_upload'] ) ){
		$is_multiple = 'class="cf-multi-uploader" multiple="multiple"';		
		wp_enqueue_script( 'multi-file-uploader', CFCORE_URL . 'fields/file/uploader.js', array('jquery'), null, true );
		if( $field_required !== null ){
			$field_required = null;
			$is_multiple .= ' data-required="true"';
		}
		if( empty( $field['config']['multi_upload_text'] ) ){
			$field['config']['multi_upload_text'] = __( 'Add Files', 'caldera-forms' );
		}
	}
	$uniqu_code = uniqid('trupl');	

?><?php echo $wrapper_before; ?>
	<?php echo $field_label; ?>
	<?php echo $field_before; ?>
		<div id="<?php echo esc_attr( $field_id ); ?>_file_list" class="cf-multi-uploader-list"></div>
		<?php if( !empty( $field['config']['multi_upload'] ) ){ ?>
			<button type="button" class="btn btn-block cf-uploader-trigger" data-parent="<?php echo esc_attr( $field_id ); ?>"><?php echo esc_html( $field['config']['multi_upload_text'] ); ?></button>
		<?php } ?>
		<input data-controlid="<?php echo esc_attr( $uniqu_code ); ?>" <?php echo $field_placeholder; ?> <?php echo $is_multiple; ?> type="file" data-field="<?php echo esc_attr( $field_base_id ); ?>" id="<?php echo esc_attr( $field_id ); ?>" name="<?php echo esc_attr( $field_name ); ?>" <?php echo $field_required; ?> <?php echo $field_structure['aria']; ?>>
		<input type="hidden" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $uniqu_code ); ?>">
		<?php echo $field_caption; ?>
	<?php echo $field_after; ?>
<?php echo $wrapper_after; ?>