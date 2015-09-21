<?php

/*

	Question2Answer (c) Gideon Greenspan
	http://www.question2answer.org/
	
	Back To Top Plugin by Bruno Vandekerkhove © 2015
	
*/

class qa_btt_admin {

	// Default admin options
	function option_default($option) {
	    switch($option) {
			case 'qa_btt_enabled':
				return false;
			default:
			    return null;				
	    }
	}
       
    // Allow template
	function allow_template($template) {
		return ($template != 'admin');
	}       
		
	// Create admin form
	function admin_form(&$qa_content) {                       
				
		// Prepare errors
		$pagelength_error = '';
						
		// Process form input
		$ok = null;
		if (qa_clicked('qa_btt_save')) {
		
			// Save options
			qa_opt('qa_btt_enabled',(bool)qa_post_text('qa_btt_enabled'));
			$ok = qa_lang('admin/options_saved');
			
		}
		else if (qa_clicked('qa_btt_reset')) {
		
			// Reset options
			qa_opt('qa_btt_enabled',$this->option_default('qa_btt_enabled'));
			$ok = qa_lang('admin/options_reset');
			
		}
                    
        // Create the form for display
		$fields = array();
		$fields[] = array(	'label' => 'Add Back To Top Button','tags' => 'name="qa_btt_enabled"',
							'value' => qa_opt('qa_btt_enabled'),'type' => 'checkbox',);
							
		return array(           
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array('label' => 'Save', 'tags' => 'NAME="qa_btt_save"',),
				array('label' => 'Reset', 'tags' => 'NAME="qa_btt_reset"',),
			),
		);
		
	}
	
}

