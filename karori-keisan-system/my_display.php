<?php foreach($browsing_history as $key=>$value){ ?>
	<a href="<?php $value['page_url']; ?>">
		<?php $value['page_name']; ?>
	</a>
}