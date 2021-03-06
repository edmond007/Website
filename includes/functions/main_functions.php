<?php 

/*
/////////////////////////////////////////////////////////////////////////
Main functions: For functions that do NOT display directly to the user. /
//////////////////////////////////////////////////////////////////////// 

Comment code appropriately. Also, include your name for each function.

*/


function pageExist($input, $pages, $typeCheck = true)
 {

	$input = ucfirst(strtolower($input));
    foreach ($pages as $page) 
    {
        if (($typeCheck ? $page === $input : $page == $input) ||
           (is_array($page) && pageExist($input, $page, $typeCheck)))
         {
            return true;
         }
    }

    return false;
 }



// James Luevano 09/27/14
function getFilepath($validPage)
	{ 
		global $pages; // get existing array

		// Loop through  page array and compare 
		foreach ($pages as $page) 
			{
				if($page['page'] == $validPage)
				{
					// IF page is found we can return the filename for the element, 
					// along with the correct url path (bodypath)
					return BODYPATH.$page['filename'];
				}
			}	
			// else IF no match, return 404 page.
		return BODYPATH.'404.php';
	}

function getPageNum($validPage)
	{ 
		global $pages; // get existing array

		// Loop through  page array and compare 
		 $x = 0;
		foreach ($pages as $page) 
			{
				if($page['page'] == $validPage)
				{
					return $x;
				}
					$x++;
			}	
			// else IF no match, return 404 page.
		return 404;
	}


function returnPage()
	{	
		// Get pages array and calculate
		global $pages;
		return ((isset($_GET['page'])) ? (pageExist($_GET['page'], $pages, true) ? 
				ucfirst(strtolower($_GET['page'])) : '404' ) : 'Home');
		
	}

 ?>