
<?php 
/*
 * Function name
 *
 * what the function does
 *
 * @param (type) about this param
 * @return (type)
 */
# function example((name))

	class person{
		// var $name = "Stefan";
		private $name = "Stefan";
		function get_name(){
			return $this->name;
		}
	}

    $somePerson = new person();
    echo $somePerson->get_name();
    echo '<br/>';
    // echo $somePerson->name;

 ?>