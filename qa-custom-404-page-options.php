<?php

class pt_qa_custom_404_page 
{
	function allow_template($template)
	{
		return ($template!='admin');
	}

	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('pt_404_save_button')) 
		{
			qa_opt('pt_enable_html_404_message',      (bool)qa_post_text('pt_enable_html_404_message'));
			qa_opt('pt_q2a_html_404_message_codebox', qa_post_text('pt_q2a_html_404_message_field'));            
			qa_opt('pt_add_search_box_on_404',        (bool)qa_post_text('pt_add_search_box_on_404'));            
			qa_opt('pt_search_box_on_404_lable', 	  qa_post_text('pt_search_box_on_404_lable'));            
			qa_opt('pt_404_costum_css', 	  	      qa_post_text('pt_404_costum_css'));            
	
			$ok = qa_lang('admin/options_saved');
		}
      
		qa_set_display_rules($qa_content, array(
				
				'pt_q2a_html_404_message_field' => 'pt_enable_html_404_message',
				'pt_add_search_box_on_404'      => 'pt_enable_html_404_message',
				'pt_search_box_on_404_lable'    => 'pt_enable_html_404_message',
				'pt_404_costum_css'             => 'pt_enable_html_404_message',
							
		));

		$fields = array();

		$fields[] = array(
		   'label' => 'Enable Custom 404 Page',
		   'type'  => 'checkbox',
		   'value' => qa_opt('pt_enable_html_404_message'),
		   'tags'  => 'NAME="pt_enable_html_404_message" ID="pt_enable_html_404_message"',
		);
		
		$fields[] = array(
			'id'    => 'pt_q2a_html_404_message_field',
			'label' => 'Write your 404 message in this box',
			'type'  => 'textarea',
			'value' => qa_opt('pt_q2a_html_404_message_codebox'),
			'tags'  => 'NAME="pt_q2a_html_404_message_field"',
			'rows'  => 10 ,
		);
        $fields[] = array(
			'id'    => 'pt_add_search_box_on_404',
			'label' => 'Add a Search box ',
			'type'  => 'checkbox',
			'value' => qa_opt('pt_add_search_box_on_404'),
			'tags'  => 'NAME="pt_add_search_box_on_404" ID="pt_add_search_box_on_404"',
		);
		$fields[] = array(
		   'id'    => 'pt_search_box_on_404_lable',
		   'label' => 'Search Box lable ',
		   'type'  => 'text',
		   'value' => qa_opt('pt_search_box_on_404_lable'),
		   'tags'  => 'NAME="pt_search_box_on_404_lable" ID="pt_search_box_on_404_lable"',
		);
		$fields[] = array(
			'id'    => 'pt_404_costum_css',
			'label' => 'Write your 404 message in this box',
			'type'  => 'textarea',
			'value' => qa_opt('pt_404_costum_css'),
			'tags'  => 'NAME="pt_404_costum_css"',
			'rows'  => 6 ,
		);
	
		$fields[] = array(
			'type' => 'blank',
		);


		return array(
			'ok' => ($ok && !isset($error)) ? $ok : null,
			
			'fields' => $fields,
			
			'buttons' => array(
				array(
				    'label' => qa_lang_html('main/save_button'),
				    'tags'  => 'NAME="pt_404_save_button"',
				),
			),
		);
	}
	function option_default($option) {

		switch($option) {
			case 'pt_enable_html_404_message':
				return 1;
				break;
			case 'pt_q2a_html_404_message_codebox':
				return '<span class="oops"> পাওয়া যায় নি!!! </span><span class="sorry">দুঃখিত!</span> , আপনার কাংক্ষিত পৃষ্ঠাটি ই-নলেজে পাওয়া যায় নি! ';
				break;
			case 'pt_add_search_box_on_404':
				return 1;
				break;
			case 'pt_search_box_on_404_lable':
				return 'দয়া করে আবার চেষ্টা করুন অথবা নিচের সার্চ বক্সে সার্চ করুন। ';
				break;
			case 'pt_404_costum_css':
				return '/*Enter your custom CSS here */';
				break;
			
			default :
				return null ;
				break ;
		}
	}
}
/*
	Omit PHP closing tag to help avoid accidental output
*/
