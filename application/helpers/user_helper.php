<?php
#############################################################################################################################
///*
function user_role($user_role, $controller, $function)
	{
		//checking utk $user_role mesti array
		if (!is_array($user_role))
			{
				return FALSE;
			}
			else
			{
				foreach ($user_role as $r => $s)
					{
						if ($r.$s == $controller.$function)
							{
								return TRUE;
							}
					}
			}
	};
//*/
#############################################################################################################################

?>