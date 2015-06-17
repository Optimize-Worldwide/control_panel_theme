<?php
/*
** Checklist functions
*/


class ChecklistItem {
	var $name;//slug
	var $title;//User-friendly name
	var $checklist;
	var $checklist_type;
	var $description;
	var $site;
	var $fields;
	var $references;
	var $status;
	var $user;
	var $date;
	var $notes;


	function ChecklistItem($name,$title,$checklist,$description="",$site,$fields=null,$references=null,$status="incomplete") {
		$this->name = $name;
		$this->title = $title;
		$this->checklist = $checklist;
		$terms = wp_get_object_terms($checklist,'checklist-type');
		if(isset($terms[0])){
			$this->checklist_type = $terms[0]->slug;
		}
		$this->description = $description;
		$this->site = $site;
		$this->fields = $fields;
		$this->references = $references;
		$this->status = $status;
	}

	function description() {
		return $this->description;
	}

	function is_complete() {
		if($this->status == 'complete'):
			return true;
		else:
			return false;
		endif;
	}

	function output() {

		global $post;

		$html = "";
		if ($this->status == 'complete'):
			$is_checked = 'checked';
		else:
			$is_checked = '';
		endif;

		$args = array(
			'post_type' => 'checklist',
			'exclude' => $this->checklist,
			'posts_per_page' => -1,
			'meta_key' => '_checklist_site',
			'meta_value' => $this->site,
			'checklist-type' => $this->checklist_type,
			);
		$previous_checklists = get_posts($args);

		$this->date = get_post_meta($this->checklist,'_checklist_'.$this->checklist_type.'_'.$this->name.'_completed_on',true);
		$this->user = get_post_meta($this->checklist,'_checklist_'.$this->checklist_type.'_'.$this->name.'_completed_by',true);
		$this->notes = get_post_meta($this->checklist,'_checklist_'.$this->checklist_type.'_'.$this->name.'_notes',true);
		$html .= "<section id='".$this->name."' class='checklist-item ".$this->status."'>";
		$html .= "	<header>";
		$html .= "		<h2>".$this->title."</h2>";
		$html .= "		<input type='checkbox'".$is_checked." />";
		if(get_post_type($post->ID) == "checklist") $html .= "		<time>".date('Y-m-d',$this->date)."</time>";
		$html .= "	</header>";
		if(get_post_type($post->ID) == "checklist"):
			if($previous_checklists):
				$html .= "<section class='previous-notes'>";
				foreach ($previous_checklists as $previous_checklist):
					$notes = get_post_meta($previous_checklist->ID,'_checklist_'.$this->checklist_type.'_'.$this->name.'_notes',true);
					$notedate = get_post_meta($previous_checklist->ID,'_checklist_'.$this->checklist_type.'_'.$this->name.'_completed_on',true);
					if($notes):
						$html .= "<p class='previous notes'>"."<a href='".$previous_checklist->guid."'>".date('Y-m-d',$notedate)."</a><br />".$notes."</p>";
					endif;
				endforeach;
				$html .= "</section>";
			endif;
			$html .= "	<p>".$this->description."</p>";
			$html .= "	<main>";
			if ($this->fields != null):
				$html .= "<section class='fields'>";
				foreach ($this->fields as $field):
					$field_content = get_editable_post_meta($this->site,$field,'input',true);
					$field_label = str_replace("_site_","",$field);
					$field_label = ucwords(str_replace("_"," ",$field_label));
					$html .= $field_label.": ".$field_content;
					$html .= "<br />";
				endforeach;
				$html .= "</section>";
			endif;
			if ($this->references != null):
				$html .= "<section class='references'>";
				foreach ($this->references as $reference):
					$html .= get_the_content($reference);//TODO: make this work
				endforeach;
				$html .= "</section>";
			endif;
			$html .= 		get_wp_user_avatar($this->user, 'thumbnail');
			$html .= "		<form>";
			$html .= "			<textarea placeholder='enter notes'>".$this->notes."</textarea>";
			$html .= "			<input type='submit' value='save' />";
			$html .= "		</form>";
			$html .= "	</main>";
		endif;
		$html .= "</section>";

		return $html;
	}


}


class Checklist {
	var $site;
	var $type;//Type of checklist
	var $items;
	var $id;


	function Checklist($site,$type){
		include(TEMPLATEPATH . "/checklist/".$type.".php");
		$this->site = $site;
		$this->type = $type;

		$slug = get_the_title($site).'-'.date('F-d-Y').'-'.$type;//optimizehere-co-november-09-security
		$slug = strtolower($slug);
		$slug = str_replace(".", "-", $slug);

		$args = array(
			'post_title' => get_the_title($site).' '.$type.' checklist',
			'post_name' => $slug,
			'post_status' => 'publish',
			'post_type' => 'checklist',
			'tax_input' => array(
				'checklist-type' => $type,
			),
		);
		$this->id = wp_insert_post($args);
		wp_set_object_terms($this->id,$type,'checklist-type');

		update_post_meta($this->id,'_checklist_site',$site);

		// e.g. $checklist = new Checklist($post->ID,'preDevelopment')
		foreach ($checklistItems as $name => $attr) {
			$title = $attr['title'];
			$checklist = $this->id;

			if (isset($attr['fields'])):
				$fields = $attr['fields'];
			else:
				$fields = null;
			endif;

			if (isset($attr['references'])):
				$references = $attr['references'];
			else:
				$references = null;
			endif;

			$this->items[$name] = new checklistItem($name,$title,$checklist,$description=$attr['description'],$site,$fields,$references);
		}
	}

	function output() {
		$html = "";

		foreach ($this->items as $item):
			$html .= $item->output();
		endforeach;

		return $html;
	}

	function updateField($field,$content) {
		update_postmeta($site,$field,$content);
	}

}


function create_checklist_ajax() {
	$site_id = $_POST['id'];
	$checklist_type = $_POST['type'];

	$checklist = new Checklist($site_id,$checklist_type);
	echo $checklist->id;
	die($checklist->id);
}
add_action('wp_ajax_create_checklist','create_checklist_ajax');


function noteitem_ajax() {
	$checklist_id = $_POST['id']; //Gets post ID from POST variable
	$checklist_item = '_'.$_POST['item']; //Gets lowercase underscored item from POST
	$notes = $_POST['notes'];
	$terms = wp_get_post_terms($checklist_id,'checklist-type'); //Gets all terms from sent post
	$checklist_name = '_checklist_'.$terms[0]->slug; //Gets slug of current term, like 'development', or 'sweep'

	update_post_meta($checklist_id,$checklist_name.$checklist_item.'_notes',$notes);

	echo $checklist_name.$checklist_item.'_notes';

	die();

}
add_action('wp_ajax_noteitem', 'noteitem_ajax');



function checkitem_ajax() {
	$checklist_id = $_POST['id']; //Gets post ID from POST variable
	$checklist_item = '_'.$_POST['item']; //Gets lowercase underscored item from POST
	$terms = wp_get_post_terms($checklist_id,'checklist-type'); //Gets all terms from sent post
	$checklist_name = '_checklist_'.$terms[0]->slug; //Gets slug of current term, like 'development', or 'sweep'

	$completed_on = get_post_meta($checklist_id,$checklist_name.$checklist_item.'_completed_on',true);
	if (!$completed_on) {
		update_post_meta($checklist_id,$checklist_name.$checklist_item.'_completed_on',time());
		update_post_meta($checklist_id,$checklist_name.$checklist_item.'_completed_by',get_current_user_id());
	} else {
		update_post_meta($checklist_id,$checklist_name.$checklist_item.'_completed_on','');
		update_post_meta($checklist_id,$checklist_name.$checklist_item.'_completed_by','');
	}

	die();

}
add_action('wp_ajax_checkitem', 'checkitem_ajax');




function make_checklist_item_fields($item_name,$args) {
	/*
	$args = array(
		'prefix' => 'e.g. _checklist_development_'
		'desc' => 'Description of what is to be done in order for item completion'
	)
	 */
	$slug = str_replace(" ", "_", strtolower($item_name));

	$checklist_prefix = $args['prefix'];

	global $post;

	$users = get_users();

	$user_ids = array('');
	$user_names = array('');
	foreach ($users as $user) {
		$user_ids[] = $user->data->ID;
		$user_names[] = $user->data->display_name;
	}

	$users = array_combine($user_ids,$user_names);


	$checklist_title = array(
		'id' => $checklist_prefix.$slug,
		'name' => $item_name,
		'desc' => $args['desc'],
		'type' => 'title',
	);

	$checklist_completed_by = array(
		'id'      => $checklist_prefix.$slug.'_completed_by',
		'name'    => 'Completed By',
		'type'    => 'select',
		'options' => $users,
	);

	$checklist_completed_on = array(
		'id'   => $checklist_prefix.$slug.'_completed_on',
		'name' => 'Completed On',
		'type' => 'text_date_timestamp',
	);

	$checklist_notes = array(
		'id' => $checklist_prefix.$slug.'_notes',
		'name' => 'Notes',
		'type' => 'textarea_small',
	);

	$checklist_fields[] = $checklist_title;
	$checklist_fields[] = $checklist_completed_by;
	$checklist_fields[] = $checklist_completed_on;
	$checklist_fields[] = $checklist_notes;

	return $checklist_fields;
}

//Takes array $items, where key is name and content is description, and $checklist_name, which is lowercase
function make_checklist_fields($items,$checklist_name) {

	$checklist_prefix = '_checklist_'.$checklist_name.'_';

	foreach ($items as $item_name => $item_attr) {
		$args = array(
			'prefix' => $checklist_prefix,
			'desc' => $item_attr['description']
		);
		$checklist_items = make_checklist_item_fields($item_attr['title'],$args);
		foreach ($checklist_items as $checklist_item) {
			$fields[] = $checklist_item;
		}
	}

	return $fields;
}

//Future: http://codex.wordpress.org/Function_Reference/wp_schedule_event
//
// on a site, if release checklist has been completed, wp_insert_post a new page attached to the site.
// also fires email to the emails of users with role 'developer'


 ?>