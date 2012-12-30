<?php
#############################################################################################################################

function user_role($id, $controller, $function)
	{
		$CI =& get_instance();
		$t = $CI->view->view_user_access_level($id, $controller, $function);
		if($t)
			{
				if ($t->num_rows() == 1)
					{
						RETURN TRUE;
					}
					else
					{
						RETURN FALSE;
					}
			}
			else
			{
				RETURN FALSE;
			}
	};

#############################################################################################################################

?>