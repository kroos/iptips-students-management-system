<?php
#############################################################################################################################

function user_role($id, $controller, $function)
	{
		$CI =& get_instance();
		$t = $CI->view->view_user_access_level($id);
		foreach ($t->result() as $f)
			{
				if ($f->dept_ctrlr.$f->function == $controller.$function)
					{
						return TRUE;
					}
			}
	};

#############################################################################################################################

?>