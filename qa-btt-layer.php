<?php

/*

	Question2Answer (c) Gideon Greenspan
	http://www.question2answer.org/
	
	Back To Top Plugin by Bruno Vandekerkhove © 2015
	
*/

class qa_html_theme_layer extends qa_html_theme_base {

	/*
	
		OVERRIDE THEME FUNCTIONS
		
	*/	
	
	// Style back to top button
	function head_links() {
		qa_html_theme_base::head_links();
		$colours = array('aquamarine','chocolate','darkolivegreen','deepskyblue','greenyellow','lightcoral','lightcyan','palegreen','thistle','tomato','turquoise','wheat');
		$this->output('<style>.cd-top {background:'.$colours[rand(0, count($colours)-1)].' url('.$this->rooturl.'elements/cd-top-arrow.svg) no-repeat center 50%;}</style>'); // Random back-to-top colours
	}
	
	// Add back to top button
	function body_content() {		
		qa_html_theme_base::body_content();
		if (qa_opt('qa_btt_enabled')) {
			$this->output('<a href="#0" class="cd-top">Top</a>');
		}
	}	
	
	// Body tags
	public function body_tags() {
		$class = 'qa-template-qa';// qa-template-'.qa_html($this->template);
		if (isset($this->content['categoryids'])) {
			foreach ($this->content['categoryids'] as $categoryid)
				$class .= ' qa-category-'.qa_html($categoryid);
		}
		$this->output('class="'.$class.' qa-body-js-off"');
	}
	
	// Include the JS
	function head_custom() {
		parent::head_custom();
		if (qa_opt('qa_btt_enabled')) {
			$script = file_get_contents(QA_HTML_THEME_LAYER_DIRECTORY.'js/qa-btt.js');
			$script = str_replace('QA_PLUGINDIR', QA_HTML_THEME_LAYER_URLTOROOT, $script);
			$this->output_raw('<script>'.$script.'</script>');

		}
	}
	
	// Remove page links label
	function page_links_label($label) {}

}
