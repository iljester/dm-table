<?php

/********************************************************************************
 * DM Table
 *
 * Table items generator to manage db elements
 * 
 * @version 1.0 beta
 * @author 	Davide Mura (iljester)  <muradavi@gmail.com>
 * @site 	https://www.iljester.com/
 * @license GPL2

  This Plugin is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.

  This Plugin is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this Plugin. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 
*********************************************************************************/

#namespace DM_Table\DM_Table

class DM_Table {

	/**
	 * $base_url
	 * Defines the basic url of the script
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $base_url = '';

	/**
	 * $perpage
	 * perpage for pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $perpage = 5;

	/**
	 * $total_pages
	 * total pages for pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $total_pages = 9999999999;

	/**
	 * $current_page
	 * the current page for pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $current_page = 1;

	/**
	 * $offset
	 * the offset for items
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $offset = 0;

	/**
	 * $limit
	 * maximum number of items to display per page
	 * contains the same value as $perpage
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $limit = 5;

	/**
	 * $total_rows
	 * the total rows
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $total_rows = 0;
	
	/**
	 * $order
	 * order ASC or DESC
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $order = 'ASC';

	/**
	 * $orderby
	 * Is defined based on the type of query performed
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $orderby = '';

	/**
	 * $search
	 * The current value for search
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @sice 1.0.
	 */
	public $search = '';
	
	/**
	 * $action
	 * The current value for action
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $action = '';

	/**
	 * $input_action_name
	 * The action name for inputs action
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $input_action_name = '';

	/**
	 * $query_names
	 * an array of get vars
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public $query_names = array();

	/**
	 * $_search_args
	 * A set of values ​​defined for the search function
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_search_args = array();

	/**
	 * $_perpage_args
	 * A set of values ​​defined for the perpage function
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_perpage_args = array();

	/**
	 * $_pagination_args
	 * A set of values ​​defined for the pagination function
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_pag_args = array();

	/**
	 * $_sort_args
	 * A set of values ​​defined for the sortable function
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_sort_args = array();

	/**
	 * $_actions_args
	 * A set of values ​​defined for the action function
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_actions_args = array();

	/**
	 * $_filters_args
	 * A set of values ​​defined for the filters function
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_filters_args = array();

	/**
	 * $_table_args
	 * A set of values ​​defined for the table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
    	protected $_table_args = array();

    	/**
	 * $_header
	 * Contains an array of values ​​that define the table columns
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_header = array();

	/**
	 * $_content
	 * Contains an array of values ​​that define the table content
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_content = array();

	/**
	 * $_innerRows
	 * Contains an array of values ​​that define the innered rows
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_innerRows = array();

	/**
	 * $_messages
	 * Contains an array of messages set in the class
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected $_messages = array();

	/**
	 * $is_position;
	 * Define position top, bottom, content
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public static $is_position = '';

	/**
	 * $defaults;
	 * Defaults values for table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public static $defaults = array(
		'set_sortable' => array(
			'order'	  		  => array( 'order', 'asc', 'desc' ),					// set order
			'orderby'	  	  => array( 'orderby', 'id' ),							// set orderby
			'arrows'		  => array( 'asc' => '&dtrif;', 'desc' => '&utrif;'),	// set arrows
		),
		'set_search' => array(
			'search' 			=> array( 'search_action', '' ),					// name of action and default value
		),
		'set_actions' => array(
			'action'		  => array( 'select_action', '-1' ), 					// select action and default value
		),
		'set_perpage' => array(
			'perpage' => array( 'perpage', 5 ), 									// set action name and default value for perpage
		),
		'set_pagination' => array(
			'total_rows' => 0, 														// total rows of items
			'start'		 => array( 'pag', 1 ), 										// start page
			'limit' 	 => array( 'perpag', 5 ),									// number of items for each page
			'action_uri' => false,													// action uri to the form
			'buttons'    => array(													// buttons next|prev
				'next_page'  => '&rsaquo;',
				'prev_page'  => '&lsaquo;',
				'last_page'  => '&raquo;',
				'first_page' => '&laquo;'
			),
			'of_pages' => 'of $1'													// in pagination "of total pages ($1)"
		),
		'set_table' => array(
			'header'   		 => array(),										// an array of values to set columns name
			'content'  		 => array(),										// an array of values to set the content table
			'footer'   		 => true,											// It is a boolean value that determines the display of the footer as a mirror of the header
			'no_data'  		 => 'No items Yet',									// text to display if no items found
			'raw_data' 		 => false,											// raw data are the data you use to create the table list (used only for innerRow method)
			'form' => array(													// form to send table data through actions
				'method' 			 	 => ['GET', 'POST', 'GET'],				// mixed values string|array. Array ex. ['GET', 'GET', 'POST']. top, table, bottom
				'action' 			 	 => '',			   						// set action uri for all forms
				'submit' 			 	 => false,		   						// set custom submit input
				'submit_default_val' 	 => 'Submit',	   						// submit button default value (only if false submit)
				'submit_on_top'		 	 => true,		   						// set false to hide button submit on top
				'submit_on_bottom'	 	 => true,		   						// set false to hide button submit on bottom
				'enctype' 			 	 => false,	   	   						// mixed values bool|array. Array ex. [true, true, false]. top, table, bottom
				'hidden_fields_inputs'	 => array()	   							// build hidden fields
			),	
			'sortable' 				=> false,									// activate sortable
			'table_fixed'			=> true,									// set true to render table fixed
			'table_id'				=> '',										// set id for table
			'scope_row'				=> false,									// set scope row
			'before_list'			=> array(),									// an array of arguments to populate before list. Allowed tags: self::ALLOWED_TABLE
			'after_list'			=> array(),									// an array of arguments to populate after list. Allowed tags: self::ALLOWED_TABLE,
			'column_bulk'			=> false,
			'bulk_js_callback'		=> false
		)
	);

	/**
	 * Position replacer
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @since 1.0
	 */
	const POSITION = '##position##';

	/**
	 * Separator for menu before and after list
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @since 1.0
	 */
	const SEP = '&nbsp;&nbsp;|&nbsp;&nbsp;';

	/**
	 * Allowed tags for menu before and after list
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @since 1.0
	 */
	const ALLOWED_TAGS = '<a><em><i><span><strong><ul><li><b><u>';

	/**
	 * Return an absolute int value otherwise 0
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$value	|int   // numeric value
	 * @access public
	 * @return int
	 * @since 1.0
	 */
    public static function absint( $value = null ) {

		if( !is_numeric( $value ) ) {
			return 0;
		}

		return abs( intval( $value ) );
	}

	/**
	 * Parse the array and replaces unset values ​​by default
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$args		   |array 	// an array to parse
	 *  	$defaults	   |array 	// defaults value for replaces
	 * 		$reorder_assoc |array 	// an array keys for the reorder
	 * @access public
	 * @return array
	 * @since 1.0
	 */
	public static function parseArgs( $args = array(), $defaults = array(), $reorder_assoc = array() ) {


		//Check for empties arrays
		if( ! is_array( $defaults ) ) {
			$defaults = array();
		}

		if( ! is_array( $args ) ) {
			$args = $defaults;
		}

		// Remove illegal space for string values
		$args = array_map( function( $value ) {
			if( is_string( $value ) ) {
				return trim( $value );
			} else {
				return $value;
			}
		},
		$args );

		// go with the parse
		if( !empty( $defaults ) ) {

			foreach( $defaults as $key => $default ) {
				if( !isset( $args[$key] ) ) {
					$args[$key] = is_string( $defaults[$key] ) ? trim( $defaults[$key] ) : $defaults[$key];
				}
			}

		}

		// this allows you to totally or partially reorder the keys of the array according to the desired order
		if( !empty( $reorder_assoc ) ) {
			
			$new_args = array();
			foreach( $reorder_assoc as $key ) {
				if( isset( $args[$key] ) ) {
					$new_args[$key] = $args[$key];
					unset( $args[$key] );
				}
			}
			$args = ($new_args+$args);
			
		}

		return $args;

	}

	/**
	 * Unset illegal args
	 * to use only with associative arrays
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$args 		|array 	 // an array to analize
	 * 		$query_args	|array 	 // an array of authorized keys
	 *  	$condition	|string	 // determine if the arg should be included or not in the array of authorized keys
	 * 						 	 // use: IN_ARRAY (for no), OUT_ARRAY (for yes)
	 * @access public
	 * @return array
	 * @since 1.0
	 */
	public static function unsetArgs( $args = array(), $authorized = array(), $condition = 'OUT_ARRAY' ) {

		//Check for empties arrays
		if( ! is_array( $authorized ) ) {
			$authorized = array();
		}

		if( ! is_array( $args ) ) {
			$args = $authorized;
		}

		$condition = strtoupper( $condition );

		// get keys
		$to_analize = array_keys( $args );

		foreach( $to_analize as $arg ) {
			
			if( is_numeric( $arg ) ) {
				break;
			}

			switch( $condition ) {

				case 'OUT_ARRAY' :
					if( ! in_array( $arg, $authorized ) ) {
						unset( $args[$arg] );
					}
					break;
				case 'IN_ARRAY' :
					if( in_array( $arg, $authorized ) ) {
						unset( $args[$arg] );
					}
				default:
					if( ! in_array( $arg, $authorized ) ) {
						unset( $args[$arg] );
					}
			}
		}

		return $args;

	}

	/**
	 * Filter url
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$url 		|string	 // the url to parse
	 * 		$query_args	|array 	 // an array of values to pass in the query
	 * @access public
	 * @return string|url
	 * @since 1.0
	 */
	public static function filterUrl( $url = null, $query_args = array() ) {

		// if no an url return the value
		if( filter_var( $url, FILTER_VALIDATE_URL ) === false ) {
			return $url;
		}

		// parse the url
		$parsed_url = parse_url( $url );

		// do we have a query args?
		if( isset( $parsed_url['query'] ) ) {
			parse_str( $parsed_url['query'], $output );
			unset( $parsed_url['query'] );
		}

		// do we have a fragment? (#)
		$fragment = '';
		if( isset( $parsed_url['fragment'] ) ) {
			$fragment = '#' . $parsed_url['fragment'];
			unset( $parsed_url['fragment'] );
		}

		/**
		 * All possibles elements for the array for the path
		 * To reconstruct the path url we add the missing data
		 * @see: https://www.php.net/manual/en/function.parse-url.php#106731
		 */
		$parsed_url['scheme'] = isset( $parsed_url['scheme'] ) ? $parsed_url['scheme'] . '://' : '';
		$parsed_url['host']   = isset( $parsed_url['host'] ) ? $parsed_url['host'] : ''; 
		$parsed_url['port']   = isset( $parsed_url['port'] ) ? ':' . $parsed_url['port'] : ''; 
		$parsed_url['user']   = isset( $parsed_url['user'] ) ? $parsed_url['user'] : ''; 
		$parsed_url['pass']   = isset( $parsed_url['pass'] ) ? ':' . $parsed_url['pass']  : ''; 
		$parsed_url['pass']   = ( $parsed_url['user'] || $parsed_url['pass'] ) ? "$pass@" : ''; 
		$path = implode('', $parsed_url );

		// If the $query_args is not an array, $query_args will be empty
		if( ! is_array( $query_args ) ) {
			$query_args = array();
		}

		// Rebuild the query with new and old values
		$new_query_args = array();
		$output = ( isset( $output ) && is_array( $output ) ? $output : array() );
		$args_merge = ($output+$query_args);
		foreach( $args_merge as $key => $arg ) {
			$key = urlencode( $key );
			$arg = urlencode( $arg );
			$new_query_args[$key] = $arg;
		}

		// remove empty values
		$new_query_args = array_filter( $new_query_args );

		// Convert array in a string url
		$rebuild_args = '';
		if( ! empty( $new_query_args ) ) {
			$rebuild_args = '?' . http_build_query( $new_query_args );
		}
		
		$url = ( $path . $rebuild_args . $fragment );

		// for bugs
		if( filter_var( $url, FILTER_VALIDATE_URL ) !== false ) {
			return $url;
		} else {
			return false;
		}

	}

	/**
	 * Not intended for actions, but only for infos or compares
	 * Is insecure for xxs attacks / illegal redirects
	 * If you extend the class and decide to use it, you will do so at your own risk
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return string|url
	 * @since 1.0
	 */
	protected static function _maybeUrl() {

		$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
		return self::filterUrl( $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] );

	}

	/**
	 * Does the escape action for the passed value
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$value	|mixed values	// mixed value except arrays or booleans (if yes, return value without escape)
	 *  	$filter	|mixed values	// mixed value to choose filter type (default: htmlspecialchars)
	 * 							    if an array is passed, you can pass the arguments to htmlspecialchars
	 * @access public
	 * @return html|string
	 * @since 1.0
	 */
	public static function escValue( $value = '', $filter = false ) {

		// empty value and is not an array, return empty
		if( empty( $value ) && !is_array( $value ) ) {
			return '';
		}

		// we don't escape an array. At most, whoever wants to do it, can use escValue with array_map
		if( is_array( $value ) ) {
			return $value;
		}

		// we don't escape a boolean values
		if( is_bool( $value ) ) {
			return $value;
		}

		// cast as string (for numeric values as int or float)
		$value = (string) $value;

		// trim string
		$value = trim( $value );

		// apply filters and escape
		if( false !== $filter && is_array( $filter ) ) {
			$defaults = array(
				'ent' => ENT_COMPAT,
				'charset' => 'UTF-8'
			);
			$args = self::parseArgs( $filter, $defaults );
			return htmlspecialchars( $value, $args['ent'], $args['charset'] );
		}
		elseif( true === $filter ) {
			$value = filter_var( $value, FILTER_SANITIZE_STRING );
			return strip_tags( $value );
		}
		else {
			return htmlspecialchars( $value );
		}
		
	}

	/**
	 * Remove unallowed chars for the passed string
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$string |string  // string value
	 * @access public
	 * @return string
	 * @since 1.0
	 */
	public static function normalizeString( $string = null ) {

		// is null return empty
		if( ! isset( $string ) ) {
			return '';
		}

		// we don't normalize arrays, boolean values or object
		if( is_bool( $string ) || is_array( $string ) || is_object( $string ) ) {
			return $string;
		}

		// cast as string (for numeric values as int or float)
		$string = (string) $string;

		// trim string
		$string = trim( $string );

		// then normalize: accepts only a-z0-9# or _- values
		$normalize = preg_replace( '/[^a-z0-9\-_#]/i', '', $string );

		return $normalize;
	}

	/**
	 * Retrieve the $_GET arguments of an url and convert them to hidden input fields
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$exclude 	   |array	// array keys to be excluded from generating hidden fields
	 *  	$return_array  |array	// if you want the method to return only the array of values
	 * @access public
	 * @return html|array
	 * @since 1.0
	 */
	public static function getHiddenFields( $exclude = '', $return_array = false ) {

		// using $_GET variable
		$query_names = $_GET;

		// check if exclude arg is an array or not
		// if not, cast as array
		if( !is_array( $exclude ) ) {
			$exclude = (array) $exclude;
		}

		// check if $return_array is set to true
		// if yes return simple an sanitized array for $_GET
		if( (bool) $return_array === true ) {
			foreach( $exclude as $key ) {
				if( in_array( $key, array_keys( $query_names ) ) ) {
					unset( $query_names[$key] );
				}
			}

			$new_query_names = array();
			foreach( $query_names as $key => $get ) {
				$key = self::escValue( $key, true );
				$get = self::escValue( $get, true );
				$new_query_names[$key] = $get;
			}
			return $new_query_names;
		}

		// otherwise generate hidden fields
		$html = '';
		foreach( $query_names as $key => $get ) {
			if( !in_array( $key, $exclude ) ) {
				$html .= sprintf( '<input type="hidden" name="%1$s" value="%2$s">', self::escValue( $key, true ), self::escValue( $get, true ) ) . PHP_EOL;
			}
		}

		return $html;

	}

	/**
	 * Generate any input field
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$target_input	|string	  // type input: text|radio|checkbox|select|textarea|button|email|search etc.
	 *  	$args			|array	  // an array to generate tags ['type' => 'text', 'name' => 'action' ... ]
	 * 		$return_array	|array	  // if you want return the array of all values
	 * @access public
	 * @return html|string|array
	 * @since 1.0
	 */
	public static function input( $target_input = 'text', $args = array(), $return_array = false ) {
    
		if( strlen( $target_input ) === 0 ) {
			$target_input = 'text';
		}

		// convert boolean values in int values
		$args = array_map( function( $value ) {
				if( is_array( $value ) ) {
					return $value;
				} else {
					if( is_bool( $value ) ) {
						return (int) $value;
					} else {
						return $value;
					}
				}
			},
		$args );

		// defaults values
		$defaults = array(
			'type'  	 => $target_input,
			'name'  	 => false,
			'value' 	 => false,
			'label' 	 => false,
			'disabled'	 => false
		);
			
		/**
		 * Add allowed params based on type
		 */
		if( $target_input === 'select' || $target_input === 'radio' ) {
			$defaults['choices'] = false;
		}

		if( $target_input === 'textarea' || $target_input === 'button' ) {
			$defaults['content'] = false;
		}

		if( $target_input === 'checkbox' ) {
			$defaults['compare'] = false;
		}

		// parse args
		$args = self::parseArgs( $args, $defaults, ['type', 'name', 'value'] );

		/**
		 * If no set class, convert name in class
		 * If the name represents an array, also remove the square brackets
		 */
		if( (bool) preg_match( '/\[(.*?)\]/', $args['name'] ) === true ) {
			$args['class']  = self::normalizeString( !isset( $args['class'] ) ? $args['name'] : $args['class'] );
		}

		if( isset( $args['id'] ) ) {
			$args['id'] = self::normalizeString( $args['id'] );
		}

		/**
		 * for developers
		 */
		if( (bool) $return_array === true ) {
			return $args;
		}

		/**
		 * prepare label and remove it from array
		 */
		$label_defaults = array(
			'id' 		=> false,
			'class' 	=> false,
			'for' 		=> false,
			'text'		=> false,
			'position' 	=> 'wrap'
		);

		if( (bool) $args['label'] !== false ) {

			if( !is_array( $args['label'] ) ) {
				$args['label'] = (array) $args['label'];
			}

			$args['label'] = self::parseArgs( $args['label'], $label_defaults );

			foreach( array_keys( $args['label'] ) as $key ) {
				if( ! in_array( $key, array_keys( $label_defaults ) ) ) {
					unset( $args['label'][$key] );
				} else {
					if( false !== $args['label'][$key] ) {
						if( $key !== 'text' ) {
							$args['label'][$key] = self::normalizeString( $args['label'][$key] );
						} else {
							$args['label'][$key] = self::escValue( $args['label'][$key] );
						}
					}
				}
			}

		}

		$label = $args['label'];
		unset( $args['label'] );
		
		$input_label = ( (bool) $label !== false ? self::escValue( $label['text'], true ) : '' );
		unset( $label['text'] );

		$label_position = $label['position'];
		unset( $label['position'] );

		/**
		 * Setup inputs
		 */
		$input  = '';
		$output = '';

		// create select or radio input
		if( $target_input === 'select' || $target_input === 'radio' ) {
			
			if( $target_input === 'select' ) {
				
				$choices  = $args['choices'];
				$value    = $args['value'];
				unset( $args['choices'] );
				unset( $args['value'] );
				unset( $args['type'] );
			
				$attrs_input = array();
				foreach( $args as $key => $val ) {
					if( false !== (bool) $val ) {
						$attrs_input[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
					}
				}
				
				$input .= '<select ' . implode( ' ', $attrs_input ) . ' >';
				foreach( $choices as $choice => $text ) {
					$flagged = $value == $choice ? ' selected' : '';
					$input .= sprintf( '<option value="%1$s"%2$s>%3$s</option>',
						self::escValue( $choice, true ),
						self::escValue( $flagged, true ),
						self::escValue( $text, true )
					);
				}
				$input .= '</select>' . PHP_EOL;

				if( false !== $label ) {
					$attrs_label = array();
					foreach( $label as $key => $val ) {
						if( false !== (bool) $val ) {
							$attrs_label[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
						}
					}
					switch( $label_position ) {
						case 'wrap' :
							$output = sprintf( '<label%1$s><span>%2$s</span>%3$s</label>',
								' ' . implode( ' ', $attrs_label ),
								$input_label,
								$input
							) . PHP_EOL;
							break;
						case 'before' :
							$output = sprintf( '<label%1$s>%2$s</label>%3$s',
								' ' . implode( ' ', $attrs_label ),
								$input_label,
								$input
							) . PHP_EOL;
							break;
						case 'after' :
							$output = sprintf( '%1$s<label%2$s>%3$s</label>',
								$input,
								' ' . implode( ' ', $attrs_label ),
								$input_label
							) . PHP_EOL;
							break;
					}
				} else {
					$output = $input;
				}
				
			} 
			elseif( $target_input === 'radio' ) {
				
				$choices = $args['choices'];
				unset( $args['choices'] );
				
				$attrs_input = array();
				foreach( $args as $key => $val ) {
					if( false !== (bool) $val ) {
						$attrs_input[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
					}
				}
				
				foreach( $choices as $choice => $text ) {
					if( (bool) $value !== false ) {
						$flagged = $value === $choice ? ' checked' : '';
					}
					if( false !== $label ) {
						$attrs_label = array();
						foreach( $label as $key => $val ) {
							if( false !== (bool) $val ) {
								$attrs_label[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
							}
						}
						switch( $label_position ) {
							case 'wrap' :
								$input .= sprintf( '<label%1$s><input%1$s%2$s><span>%3$s</span></label>',
									' ' . implode( ' ', $attrs_label ),
									' ' . implode( ' ', $attrs_input ),
									self::escValue( $flagged, true ),
									self::escValue( $text, true )
								) . PHP_EOL;
								break;
							case 'before' :
								$input .= sprintf( '<label%1$s>%2$s</label><input%1$s%2$s>',
									' ' . implode( ' ', $attrs_label ),
									self::escValue( $text, true ),
									' ' . implode( ' ', $attrs_input ),
									self::escValue( $flagged, true )
								) . PHP_EOL;
								break;
							case 'after' :
								$input .= sprintf( '<input%1$s%2$s><label%3$s>%4$s</label>',
									' ' . implode( ' ', $attrs_input ),
									self::escValue( $flagged, true ),
									' ' . implode( ' ', $attrs_label ),
									self::escValue( $text, true )
								) . PHP_EOL;
								break;
						}
					} else {
						$input = sprintf( '<input %1$s%2$s>',
							implode( ' ', $attrs_input ),
							self::escValue( $flagged, true )
						) . PHP_EOL;
					}
				}
				
				$output = $input;
				
			}
			
		}

		// create textarea or button
		elseif( $target_input === 'textarea' || $target_input === 'button' ) {

			$type = $args['type'];
			unset( $args['type'] );

			$value = $args['value'];
			unset( $args['value'] );

			$content = $args['content'];
			unset( $args['content'] );

			$attrs_input = array();
			foreach( $args as $key => $val ) {
				if( false !== (bool) $val ) {
					$attrs_input[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
				}
			}

			switch( $target_input ) {
				case 'textarea' :
					$input .= sprintf( '<textarea %1$s>%2$s</textarea>', implode( ' ', $attrs_input ), $content ) . PHP_EOL;
					break;
				case 'button' :
					$attrs_input['type'] = 'type="' . $type . '"';
					$attrs_input['value'] = 'value="'. $value . '"';
					$attrs_input = self::parseArgs( $attrs_input, array(), ['type', 'name', 'value'] ); // reorder keys
					$input .= sprintf( '<button %1$s>%2$s</button>', implode( ' ', $attrs_input ), $content ) . PHP_EOL;
					break;
			}

			if( false !== $label ) {
				$attrs_label = array();
				foreach( $label as $key => $val ) {
					if( false !== (bool) $val ) {
						$attrs_label[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
					}
				}
				switch( $label_position ) {
					case 'wrap' :
						$output = sprintf( '<label%1$s><span>%2$s</span>%3$s</label>',
							' ' . implode( ' ', $attrs_label ),
							$input_label,
							$input
						) . PHP_EOL;
						break;
					case 'before' :
						$output = sprintf( '<label%1$s>%2$s</label>%3$s',
							' ' . implode( ' ', $attrs_label ),
							$input_label,
							$input
						) . PHP_EOL;
						break;
					case 'after' :
						$output = sprintf( '%1$s<label%2$s>%3$s</label>',
							$input,
							' ' . implode( ' ', $attrs_label ),
							$input_label
						) . PHP_EOL;
						break;
				}
			} else {
				$output = $input;
			}

		}

		// create others input
		else {

			if( $target_input === 'checkbox' ) {
				$compare = $args['compare'];
				unset( $args['compare'] );
			}
			
			$attrs_input = array();
			foreach( $args as $key => $val ) {
				if( false !== (bool) $val ) {
					$attrs_input[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
				}
			}
			
			if( $target_input !== 'checkbox' ) {
				$input .= sprintf( '<input %s />', implode( ' ', $attrs_input ) ) . PHP_EOL;
				if( false !== $label ) {
					$attrs_label = array();
					foreach( $label as $key => $val ) {
						if( false !== (bool) $val ) {
							$attrs_label[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
						}
					}
					switch( $label_position ) {
						case 'wrap' :
							$output = sprintf( '<label%1$s><span>%2$s</span>%3$s</label>',
								' ' . implode( ' ', $attrs_label ),
								$input_label,
								$input
							) . PHP_EOL;
							break;
						case 'before' :
							$output = sprintf( '<label%1$s>%2$s</label>%3$s',
								' ' . implode( ' ', $attrs_label ),
								$input_label,
								$input
							) . PHP_EOL;
							break;
						case 'after' :
							$output = sprintf( '%1$s<label%2$s>%3$s</label>',
								$input,
								' ' . implode( ' ', $attrs_label ),
								$input_label
							) . PHP_EOL;
							break;
					}
				} else {
					$output = $input;
				}
			} else {
				$flagged = '';
				if( $args['value'] !== false ) {
					$flagged = $args['value'] === $compare ? ' checked' : '';
				}
				$input .= sprintf( '<input %1$s%2$s />', implode( ' ', $attrs_input ), $flagged ) . PHP_EOL;
				if( false !== $label ) {
					$attrs_label = array();
					foreach( $label as $key => $val ) {
						if( false !== (bool) $val ) {
							$attrs_label[] = sprintf( '%1$s="%2$s"', self::escValue( $key, true ), self::escValue( $val, true ) );
						}
					}
					switch( $label_position ) {
						case 'wrap' :
							$output = sprintf( '<label%1$s><span>%2$s</span>%3$s</label>',
								' ' . implode( ' ', $attrs_label ),
								$input_label,
								$input
							) . PHP_EOL;
							break;
						case 'before' :
							$output = sprintf( '<label%1$s>%2$s</label>%3$s',
								' ' . implode( ' ', $attrs_label ),
								$input_label,
								$input
							) . PHP_EOL;
							break;
						case 'after' :
							$output = sprintf( '%1$s<label%2$s>%3$s</label>',
								$input,
								' ' . implode( ' ', $attrs_label ),
								$input_label
							) . PHP_EOL;
							break;
					}
				} else {
					$output = $input;
				}
			}
			
		}
		
		return $output;
		
	}

	/**
	 * Is a wrap for filter_input
	 * This method is not intended to be used with an action that requires an array of data
	 * For arrays, use filter_var_array or filter_input_array or filter_input with FILTER_REQUIRE_ARRAY flag
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$method		|int			// allowed INPUT_GET or INPUT_POST. If not isset method, uses $_REQUEST
	 * 		$action		|string			// the name of action
	 * 		$default	|mixed values	// default value
	 * @access: public
	 * @return: mixed values
	 * @since 1.0
	 */
	public static function action( $method = null, $action = null, $default = '' ) {
    
		if( !isset( $method ) || !in_array( $method, array( INPUT_GET, INPUT_POST ) ) ) {
			$method = $_REQUEST;
			$is = (bool) isset( $_REQUEST[$action] ) === true ? true : false;
			$var = filter_var( $_REQUEST[$action], FILTER_SANITIZE_STRING );
		} else {
			$is  = filter_has_var( $method, $action );
			$var = filter_input( $method, $action, FILTER_SANITIZE_STRING );
		}
		
		return $is ? $var : $default;    
		
	}

	/**
	 * Calculate offset for pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	  |array   // array values used for calculation
	 * @access public
	 * @return int
	 * @since 1.0
	 */
	public static function offset( $args = array() ) {

		if( empty( $args ) ) {
			return 0;
		}

		$keys = array_keys( $args );

		if( is_numeric( $keys[0] ) || is_numeric( $keys[1] ) ) {
			return 0;
		}

		$page 	 = self::action( INPUT_GET, $keys[0], $args[$keys[0]] );
		$perpage = self::action( INPUT_GET, $keys[1], $args[$keys[1]] );
		
		$offset = $page <= 1 ? 0 : ( $perpage*($page-1) );

		return self::absint( $offset );

	}

	/**
	 * Toggle Bulk allows you to make a multiple selection of checkboxes for bulk actions
	 * In this case, you need to implement the actions with DM_Table::setActions
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$action	|string   // name of the action to which the bulk action refers
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public static function jsBulk( $action = null ) {

		if( !isset( $action ) || is_array( $action ) ) {
			return;
		}

		$action = (string) $action;

		$html  = '<script type="text/javascript" id="js-bulk-action">' . PHP_EOL;
		$html .= 'function toggleBulk( needle ) {' . PHP_EOL;
		$html .= '		var ckbs = document.getElementsByName("' . $action . '")' . PHP_EOL;
		$html .= '		for( var i = 0; i < ckbs.length; i++ ) {' . PHP_EOL;
		$html .= '			ckbs[i].checked = needle.checked;' . PHP_EOL;
		$html .= '		}' . PHP_EOL;
		$html .= '}' . PHP_EOL;
		$html .= '</script>' . PHP_EOL;

		echo $html;
		
	}

	/**
	 * Get the current action name for bulk actions
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$name		|string 		// name of action
	 * 		$default	|mixed values	// default value
	 * @access public
	 * @return string
	 * @since 1.0
	 */
	public static function buildActionName( $name = 'select_action', $default = '-1' ) {

		if( is_array( $name ) || is_array( $default ) ) {
			return;
		}

		$action = self::action( INPUT_GET, $name, $default );
		$action = self::normalizeString( $action );

		if( $action === $default ) {
			return '';
		}
		
		return 'action_' . $action . '[]';
	}

	/**
	 * Set base url
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$url	|string	  // the url of the page where the table is managed
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setBaseUrl( $url ) {

		$this->base_url = self::filterUrl( $url );

	}

	/**
	 * Set messages to override default messages
	 * This method is intended to be used outside the class or in a child class
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$messages	  |array   // and array of messages to ovveride
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setMessages( $messages = array() ) {

		if( !is_array( $messages ) ) {
			$messages = (array) $messages;
		}

		$this->_messages = $messages;

	}

	/**
	 * Get set messages
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$handle		|string			// a unique id for message
	 * 		$message	|mixed values	// text message
	 * @access public
	 * @return string
	 * @since 1.0
	 */
	public function getMessage( $handle = null, $message = '' ) {

		// not arrays for message
		if( is_array( $message ) ) {
			return '';
		}

		$messages = $this->_messages;

		if( !isset( $messages[$handle] ) ) {
			$this->_messages[$handle] = $message;
			return (string) $message;
		} else {
			return $this->_messages[$handle];
		}

	}

	/**
	 * This method allows you to create the reordering action of the table elements
	 * based on the defined target (eg ID, email, etc.)
	 * Is not a required method. You can create your own system of sortable
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$args	|array	  // an array of arguments to set sortable
	 * 		                  for arguments, see: DM_Table::$defaults['set_sortable']
	 * 		$input	|string	  // create a input for setSortable (select type).
	 *  	$submit	|string	  // create a input submit. Set false to not display
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setSortable( $args = array(), $input = null, $submit = null ) {

		if( ! is_array( $args ) ) {
			$args = array();
		}

		if( ! is_string( $input ) || empty( $input ) ) { 	// $input is required
			die( $this->getMessage( 'sortable_input', "Error: \$input must be set as string and/or not empty in setSortable method" ) );
		}

		if( ( ! is_string( $submit ) || empty( $submit ) ) && false !== $submit ) {
			die( $this->getMessage( 'sortable_submit', "Error: \$submit must be set as string and/or not empty, otherwise set false in setSortable method" ) );
		}

		$defaults = self::$defaults['set_sortable'];

		$args 	 = self::parseArgs( $args, $defaults );
		$order 	 = self::parseArgs( $args['order'], $defaults['order'] );
		$orderby = self::parseArgs( $args['orderby'], $defaults['orderby'] );

		$orderby_name 	 = (string) $args['orderby'][0];
		$orderby_value	 = (string) $args['orderby'][1];

		$order_name 	 = (string) $args['order'][0];
		$order_value	 = (string) $args['order'][1];
		$order_value_alt = (string) $args['order'][2];

		$orderby = self::action( INPUT_GET, $orderby_name, $orderby_value );
		$order   = ( self::action( INPUT_GET, $order_name ) === $order_value ? $order_value_alt : $order_value );

		$this->order   = $order;
		$this->orderby = $orderby;
		$this->query_names['order']   = $order_name;
		$this->query_names['orderby'] = $orderby_name;

		$sort_names = array(
			'order_name'   => $order_name,
			'orderby_name' => $orderby_name,
		);

		unset( $args['order'] );
		unset( $args['orderby'] );

		$args['input']  = $input;
		$args['submit'] = $submit;

		$this->_sort_args = ( $args+$sort_names );

	}

	/**
	 * This method allows you to create the search function in the table
	 * Is not a required method. You can create your own system of search
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$args	|mixed value	  // passed string contain an array or array['search'] contain an array
	 * 					  for arguments, see: DM_Table::$defaults['set_search']
	 * 		$input	|string	          // create a input for search (text|search type).
	 *  	$submit	|string	  		  // create a input submit. Set false to not display
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setSearch( $args = array(), $input = null, $submit = null ) {

		if( !is_array( $args ) ) {
			$args = array();
		}

		if( ! isset( $args['search'] ) ) {
			$args = ['search' => $args];
		}

		if( ! is_string( $input ) || empty( $input ) ) {	// $input is required
			die( $this->getMessage( 'search_input', "Error: \$input must be set as string and/or not empty in setSearch method" ) );
		}

		if( ( ! is_string( $submit ) || empty( $submit ) ) && false !== $submit ) {
			die( $this->getMessage( 'search_submit', "Error: \$submit must be set as string and/or not empty, otherwise set false in setSearch method" ) );
		}
		
		$defaults = self::$defaults['set_search'];

		$args = self::parseArgs( $args, $defaults );
		$search_val = self::parseArgs( $args['search'], $defaults['search'] );

		$search_name   = (string) $search_val[0];
		$default_value = (string) $search_val[1];
		
		$search = self::action( INPUT_GET, $search_name, $default_value );
		$search = self::escValue( $search );

		$this->search = (string) $search;
		$this->query_names['search'] = $search_name;

		$args['search_name'] 	= $search_name;
		$args['default_value'] 	= $default_value;
		$args['input'] 			= $input;
		$args['submit'] 		= $submit;

		$this->_search_args = $args;

		
	}

	/**
	 * This method allows you to create actions in the table or even single actions
	 * Is not a required method. You can create your own system of actions
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$args	|array	  // an array of arguments to set actions
	 * 				  for arguments, see: DM_Table::$defaults['set_actions']
	 * 		$input	|string	  // create a input for actions (select type).
	 *  	$submit	|string	  // create a input submit. Set false to not display
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setActions( $args = array(), $input = null, $submit = null ) {

		if( ! is_array( $args ) ) {
			$args = array();
		}

		if( ! is_string( $input ) || empty( $input ) ) { 	// $input is required
			die( $this->getMessage( 'actions_input', "Error: \$input must be set as string and/or not empty in setActions method" ) );
		}

		if( ( ! is_string( $submit ) || empty( $submit ) ) && false !== $submit ) {
			die( $this->getMessage( 'actions_submit', "Error: \$submit must be set as string and/or not empty, otherwise set false in setActions method" ) );
		}

		$defaults = self::$defaults['set_actions'];

		$args 	 = self::parseArgs( $args, $defaults );
		$actions = self::parseArgs( $args['action'], $defaults['action'] );

		$action_name    		= (string) $actions[0]; 									// the selected action name
		$default_value  		= (string) $actions[1]; 									// the default value in drop down
		$current_value 			= self::action( INPUT_GET, $action_name, $default_value );	// the current value for select

		$this->action 		 		 = (string) $current_value; 
		$this->input_action_name 	 = self::buildActionName( $action_name, $default_value );
		$this->query_names['action'] = $action_name;

		unset( $args['action'] );

		$args['action_name']   	= $action_name;
		$args['default_value'] 	= $default_value;
		$args['input']  		= $input;
		$args['submit'] 		= $submit;
		
		$this->_actions_args = $args;

	}

	/**
	 * This method allows you to create the filter function in the table (ex by date, by color ecc.)
	 * With this method you can create multiple filters
	 * Is not a required method. You can create your own system of filters
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 	$inputs	|array	  // create an array of inputs. One for each filter (select type).
	 * 			  Each filter must include two array keys: ['filter','input']
	 *  	$submit	|string	  // create a input submit. Set false to not display
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setFilters( $inputs = array(), $submit = null ) {

		if( ! is_array( $inputs ) || empty( $inputs ) ) {   // $inputs is required
			die( $this->getMessage( 'filters_array', "Error: \$inputs filters must be an array of strings and/or not empty in setFilters method" ) );
		}

		if( ( ! is_string( $submit ) || empty( $submit ) ) && false !== $submit ) {
			die( $this->getMessage( 'filters_submit', "Error: \$submit must be set as string and/or not empty, otherwise set false in setFilters method" ) );
		}

		// separate single filters
		$filters_args = array();
		foreach( $inputs as $key => $val ) {

			if( !isset( $val['filter'] ) || !is_array( $val['filter'] ) || count( $val['filter'] ) !== 2 ) {
				die( $this->getMessage( 'filter_filters', "Error: \$filter['filter'] must be set in setFilters method" ) );
			}

			$filter = $val['filter'];
			unset( $val['filter'] );

			$filter_name   	= (string) $filter[0];
			$default_value 	= (string) $filter[1];
			$action 		= (string) self::action( INPUT_GET, $filter_name, $default_value );
			
			$this->filters[$key] 	 = array( 'name' => $filter_name, 'value' => $action );
			$this->query_names[$key] = $filter_name; 

			$filters_args[$key] = $filter_name;
			$filters_args[$key] = $default_value;
			$filters_args[$key] = $val['input'];
			
		}

		$filters_args['submit']   = $submit;
		
		$this->_filters_args = $filters_args;

	}

	/**
	 * This method allows to define limit items per page
	 * Is not a required method. You can create your own system to set limit items per page
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$args	|mixed value	  // passed string contain an array, or array['perpage'] to set perpage
	 * 					  for arguments, see: DM_Table::$defaults['set_perpage']
	 * 		$input	|string	          // create a input for actions (select type).
	 *  	$submit	|string	  		  // create a input submit. Set false to not display
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setPerpage( $args = array(), $input = null, $submit = null ) {

		if( !is_array( $args ) ) {
			$args = array();
		}

		if( !isset( $args['perpage'] ) ) {
			$args = ['perpage' => $args];
		}

		if( ! is_string( $input ) || empty( $input ) ) { 	// $input is required
			die( $this->getMessage( 'sortable_input', "Error: \$input must be set as string and/or not empy in setSortable method" ) );
		}

		if( ( ! is_string( $submit ) || empty( $submit ) ) && false !== $submit ) {
			die( $this->getMessage( 'sortable_submit', "Error: \$submit must be set as string and/or not empty, otherwise set false in setSortable method" ) );
		}

		$defaults = self::$defaults['set_perpage'];

		$args 	 = self::parseArgs( $args, $defaults );
		$perpage = self::parseArgs( $args['perpage'], $defaults['perpage'] );

		$perpage_name    = (string) $perpage[0];
		$default_value 	 = (string) $perpage[1];
		
		$current_value 	= self::action( INPUT_GET, $perpage_name, $default_value );

		$this->perpage = self::absint( $current_value );
		$this->query_names['perpage'] = $perpage_name;

		unset( $args['perpage'] );

		$args['input']  = $input;
		$args['submit'] = $submit;

		$this->_perpage_args = $args;

	}

	/**
	 * This method allows to create the paging of the table
	 * Is not a required method. You can create your own system of pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	 |array   // an array of values.
	 * 				  allowed: ['total_rows', 'start', 'limit', 'action_uri', 'buttons']
	 * 				  // see method for descriptions
	 * @access public
	 * @return void
	 * @since 1.0
	 */
    public function setPagination( $args = array() ) {

		if( ! is_array( $args ) ) {
			$args = array();
		}

		$defaults = self::$defaults['set_pagination'];

		$args 	 = self::parseArgs( $args, $defaults );
		$start   = self::parseArgs( $args['start'], $defaults['start'] );
		$limit	 = self::parseArgs( $args['limit'], $defaults['limit'] );
		$buttons = self::parseArgs( $args['buttons'], $defaults['buttons'] );

		// define total rows as absolute int number
		if( is_numeric( $args['total_rows'] ) ) {
			$rows = self::absint( $args['total_rows'] );
		}
		elseif( is_array( $args['total_rows'] ) ) {
			$rows = count( $args['total_rows'] );
		}
		else {
			$rows = 0;
		}

		// if total_rows is set to zero, items will be displayed in a single page
		// not recommended for large items list
		if( 0 === $rows ) {
			$start = array( 'pag', 1 );
			$limit = array( 'perpag', 9999999999 );
		}

		$start_name  = (string) $start[0];
		$start_value = (string) $start[1];

		$limit_name  = (string) $limit[0];
		$limit_value = (string) $limit[1];

		$start 		= self::action( INPUT_GET, $start_name, $start_value );
		$limit 	    = self::action( INPUT_GET, $limit_name, $limit_value );
		$offset		= self::offset(
			array(
				$start_name => $start_value,
				$limit_name => $limit_value
			)
		);

		$round  = ceil( $rows/$limit );
		$total_pages = (string) $round;

		$this->total_rows			= self::absint( $rows );
		$this->total_pages			= self::absint( $total_pages );
		$this->current_page			= self::absint( $start );
		$this->offset				= self::absint( $offset );
		$this->limit				= self::absint( $limit );
		$this->query_names['start'] = $start_name;
		$this->query_names['limit'] = $limit_name;

		unset( $args['start'] );
		unset( $args['limit'] );
		unset( $args['buttons'] );

		$args['page_name'] 	  = $start_name;
		$args['perpage_name'] = $limit_name;
		$args['buttons'] = $buttons;

		$this->_pag_args = $args; 

	}

	/**
	 * Set data
	 * This is a not required method to process data. Callback must return $data to insert in setTable $args['content']
	 * This is not done automatically. You have to do it.
	 * 
	 * author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$callback  	 |mixed value	// string or array for callable function or method
	 * 		$instance 	 |object	// If you are using a class that extends DM_Table or uses DM_Table anyway,
	 * 						you can pass your class instance here. Make sure though that you also pass the instance of DM_Table.
	 * 						It may be useful.
	 * 		$args		 |array		// an array of arguments you would like to pass in the callback function
	 * 		$syntax_only |bool   		// @see: https://www.php.net/manual/en/function.is-callable.php
	 * @access public
	 * @return mixed value
	 * @since 1.0
	 */
	public function setData( $callback = null, $instance = null, $args = array(), $syntax_only = true ) {

		if( is_callable( $callback, (bool) $syntax_only, $callable_name ) ) {

			if( !isset( $instance ) || !is_object( $instance ) ) {
				$instance = $this;
			}
        
            return $callback( $instance, $args );
        
        }
        return false;
	}

	/**
	 * Set the table
	 * This is the fundamental method to create the table.
	 * Therefore it is required or in any case must be overwritten
	 * if it wants to create a different one
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args  |array	  // an array of values
	 * 				  for arguments, see: DM_Table::$defaults['set_table']
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setTable( $args = array() ) {

		if( ! is_array( $args ) ) {
			$args = array();
		}

		$defaults = self::$defaults['set_table'];

		$args 		= self::parseArgs( $args, $defaults );
		$form 		= self::parseArgs( $args['form'], $defaults['form'] );

		$this->_header  	= (array) $args['header'];
		$this->_content 	= (array) $args['content'];

		unset( $args['header'] );
		unset( $args['content'] );
		unset( $args['form'] );

		// setup scope column
		if( false !== $args['scope_row'] && in_array( $args['scope_row'], array_keys( $this->_header ) ) ) {
			$scope_columns = $this->_header; 
			unset( $scope_columns[$args['scope_row']] );
			$args['scope_column'] = array_keys( $scope_columns );
		} else {
			$args['scope_column'] = array_keys( $this->_header );
		}

		// sortable will always be false when the total rows are less than one
		if( $this->total_rows < 2 ) {
			$args['sortable'] = false;
		}

		// set table fixed
		$args['tfixed'] = array( '', array( 'header' => '', 'content' => '' ) );
		if( $args['table_fixed'] === true && ! empty( $this->_header ) ) {
			$headers = $this->_header;
			if( $args['scope_row'] !== '' ) {
				unset( $headers[$args['scope_row']] );
			}
			$td_width = ( 100 / ( count( $headers ) ) );
			$args['tfixed'] = array(
				'table-fixed',
				array(
					'header' 	=>  ' style="width:' . ( 100 / ( count( $headers ) ) ) . '%;"',
					'content' 	=>  ' style="width:' . ( 100 / ( count( $headers ) ) ) . '%;"'
				)
			);
		}

		// set hidden fields		
		if( ! is_array( $form['hidden_fields_inputs'] ) ) {
			$form['hidden_fields_inputs'] = (array) $form['hidden_fields_inputs'];
		}

		foreach( $form['hidden_fields_inputs'] as $input => $hidden_field ) {
			if( !is_array( $hidden_field ) ) {
				$hidden_field = (array) $hidden_field;
			}
			$input = self::normalizeString( $input, true );
			$form['hidden_fields_inputs'][$input] = self::unsetArgs( $hidden_field,  array( 'value', 'id', 'class', 'position' ) );
		}

		// sanitize before and after list
		if( !is_array( $args['before_list'] ) ) {
			$args['before_list'] = (array) $args['before_list'];
		}

		$args['before_list'] = array_map( function( $value ) {
			return strip_tags( $value, self::ALLOWED_TAGS );
		}, $args['before_list'] );

		if( !is_array( $args['after_list'] ) ) {
			$args['after_list'] = (array) $args['after_list'];
		}

		$args['after_list'] = array_map( function( $value ) {
			return strip_tags( $value, self::ALLOWED_TAGS );
		}, $args['after_list'] );

		// set id for table
		$args['table_id'] = self::normalizeString( $args['table_id'] );

		$args['form'] 	   = $form;
		$this->_table_args = $args;

	}

	/**
	 * Set the lite table
	 * This is the fundamental method to set the table for DM_Table::displayLiteTable()
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args  |array	  // an array of values
	 * 				  for arguments, see: DM_Table::$defaults['set_table']
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function setLiteTable( $args = array() ) {

		if( ! is_array( $args ) ) {
			$args = array();
		}

		$used = array(
			'header',
			'content',
			'footer',
			'sortable',
			'tfixed',
			'scope_column',
			'column_bulk',
			'bulk_js_callback',
			'no_data',
			'scope_row'
		);

		$defaults = self::$defaults['set_table'];
		$defaults = self::unsetArgs( $defaults, $used );

		$args = self::parseArgs( $args, $defaults );
		$args = self::unsetArgs( $args, array_keys( $defaults ) );

		$this->setTable( $args );

	}

	/**
	 * Insert single row in the table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$after		|int 		// index array item after insert row
	 * 		$class		|string		// class assigned to the row
	 * 		$callback	|function	// a callback function to customize row
	 * 		$instance   	|object		// see setData method for description
	 * 		$syntax_only	|bool		// see setData method for description
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function innerRow( $after = null, $class = null, $callback = null, $instance = null, $syntax_only = true ) {

		$after 	 	= self::absint( $after );
		$columns 	= count( $this->_header );
		$data 		= $this->_table_args['raw_data'];	// raw data set in setTable

		if( is_callable( $callback, (bool) $syntax_only, $callable_name ) ) {

			if( !isset( $instance ) || !is_object( $instance ) ) {
				$instance = $this;
			}
		
			$callback = $callback( $columns, $instance, $data  );

			// stored all rows in an array
			$this->_innerRows[] = array( 'after' => $after, 'callback' => $callback, 'class' => $class );

		}
		
	}

	/**
	 * Render perpage html
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _perpage() {

		$perpage = $this->_perpage_args;

		if( empty( $perpage ) ) {
			return '';
		}

		// replace alias self::POSITION with real position (head, content, foot)
		$input  = str_ireplace( self::POSITION, self::$is_position, $perpage['input'] );
		$submit = str_ireplace( self::POSITION, self::$is_position, $perpage['submit'] );
		
		$html   = sprintf( '<span class="dm-input dm-perpage-input">%1$s%2$s</span>',
			$input,
			$submit
		);

		return $html;

	}

	/**
	 * Render sortable html
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _sortable() {

		$sortable = $this->_sort_args;

		if( empty( $sortable ) ) {
			return '';
		}

		$is_sortable = isset( $this->_table_args['sortable'] ) ? $this->_table_args['sortable'] : false;

		if( (bool) $is_sortable === false ) {
			return '';
		}

		// replace alias self::POSITION with real position (head, content, foot)
		$input  = str_ireplace( self::POSITION, self::$is_position, $sortable['input'] );
		$submit = str_ireplace( self::POSITION, self::$is_position, $sortable['submit'] );
		
		$html   = sprintf( '<span class="dm-input dm-sortable-input">%1$s%2$s</span>',
			$input,
			$submit
		);

		return $html;

	}

	/**
	 * Render search html
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _search() {

		$search = $this->_search_args;

		if( empty( $search ) ) {
			return '';
		}

		// replace alias self::POSITION with real position (head, content, foot)
		$input  = str_ireplace( self::POSITION, self::$is_position, $search['input'] );
		$submit = str_ireplace( self::POSITION, self::$is_position, $search['submit'] );

		$html = sprintf( '<span class="dm-input dm-search-input">%1$s%2$s</span>',
			$input,
			$submit
		);


		return $html;

	}

	/**
	 * Render action html
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _actions() {

		$actions = $this->_actions_args;

		if( empty( $actions ) ) {
			return '';
		}

		// replace alias self::POSITION with real position (head, content, foot)
		$input  = str_ireplace( self::POSITION, self::$is_position, $actions['input'] );
		$submit = str_ireplace( self::POSITION, self::$is_position, $actions['submit'] );
		
		$html   = sprintf( '<span class="dm-input dm-action-input">%1$s%2$s</span>',
			$input,
			$submit
		);

		return $html;
		
	}

	/**
	 * Render filters html
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _filters() {

		$filters  = $this->_filters_args;

		if( empty( $filters ) ) {
			return '';
		}
		
		$submit   = $this->_filters_args['submit'];
		unset( $filters['submit'] );

		$html = '';
		$html .= '<span class="dm-input dm-filters-input">';
		foreach( $filters as $key => $input ) {
			
			// replace alias self::POSITION with real position (head, content, foot)
			$input  = str_ireplace( self::POSITION, self::$is_position, $input );
			$html .= $input;

		}

		// replace alias self::POSITION with real position (head, content, foot)
		$submit = str_ireplace( self::POSITION, self::$is_position, $submit );
		$html .= $submit;
		$html .= '</span>';

		return $html;
	}

	/**
	 * Render pagination html
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _pagination() {

		if( empty( $this->_pag_args ) ) {
			return '';
		}

		// public
		$total_pages 	= $this->total_pages;
		$current_page	= $this->current_page;
		$limit		 	= $this->limit;
		$offset		 	= $this->offset;
		$total_rows  	= $this->total_rows;
		$buttons 	 	= $this->_pag_args['buttons'];
		$page_name	 	= $this->_pag_args['page_name'];
		$perpage_name	= $this->_pag_args['perpage_name'];
		$of_pages		= str_replace( '$1', $total_pages, $this->_pag_args['of_pages'] );

		$query = http_build_query(
			array(
				$page_name => urlencode( self::absint( $current_page-1 ) )
			)
		);

		$hidden_query_args = self::getHiddenFields( array( $page_name ), true );

		$html = '';
		if( $current_page > 1 || $limit < $total_rows ) {

			if( $current_page > 1 ) {
				
				$query_args = ($hidden_query_args+[$page_name => 1]);
				$html .= sprintf( '<a class="dm-nav-btn tfirst" href="%1$s">%2$s</a>', self::filterUrl( $this->base_url, $query_args ), $buttons['first_page'] ) . PHP_EOL;

				$query_args = ($hidden_query_args+[$page_name => ($current_page-1)]);
				$html .= sprintf( '<a class="dm-nav-btn tprev" href="%1$s">%2$s</a>', self::filterUrl( $this->base_url, $query_args ), $buttons['prev_page'] ) . PHP_EOL;
			}
			
			if( $current_page < $total_pages ) {
				$html .= sprintf( '<input class="dm-pagechange" type="text" name="%1$s" value="%2$s" />', $page_name, self::escValue( $current_page, true ) ) . PHP_EOL;
				$html .= sprintf( '<span class="dm-of">%s</span>', $of_pages ) . PHP_EOL;

				$query_args = ($hidden_query_args+[$page_name => ($current_page+1)]);
				$html .= sprintf( '<a class="dm-nav-btn tnext" href="%1$s">%2$s</a>', self::filterUrl( $this->base_url, $query_args ), $buttons['next_page'] ) . PHP_EOL;

				$query_args = ($hidden_query_args+[$page_name => $total_pages]);
				$html .= sprintf( '<a class="dm-nav-btn tlast" href="%1$s">%2$s</a>', self::filterUrl( $this->base_url, $query_args ), $buttons['last_page'] ) . PHP_EOL;
			} else {
				$html .= sprintf( '<input class="dm-pagechange" type="text" id="dm-curpag" name="" value="%s" disabled />', self::escValue( $current_page, true ) ) . PHP_EOL;
			}

		}

		return $html;

	}

      /**
       * We build table meta header
       * This will be used to construct the header and the footer of the table
       *
       * @author Davide Mura (iljester) <muradavi@gmail.com>
       * @param
       * 		$footer   |bool    //It is used to determine if it is a header or footer render
       * @access protected
       * @return void
       * @since 1.0
       */
	protected function _metaHeader( $footer = false ) {

		if( empty( $this->_table_args ) ) {
			return '';
		}
		
		$header 	   = $this->_header;
		$sortable 	   = $this->_table_args['sortable'];
		$tfixed		   = $this->_table_args['tfixed'][1]['header'];
		$scope_column  = $this->_table_args['scope_column'];
		$column_bulk   = $this->_table_args['column_bulk'];
		$js_callback   = $this->_table_args['bulk_js_callback'];

		// add prefix head/foot
		$pref = ( $footer === true ? 'foot-' : 'head-' );
		$bulk_input_args = array( 'id' => self::escValue( $pref . 'bulk-action' )  );
		if( false !== $js_callback ) {
			$bulk_input_args['onClick'] = self::escValue( $js_callback );
		}

		// setup bulk
		$bulk_input = '';
		if( (bool) $column_bulk !== false ) {
			$bulk_input = self::input(
				'checkbox',
				$bulk_input_args
			);
		}

		// setup sortable
		switch( (bool) $sortable ) {

			case true :
				$orderby 		= $this->orderby;
				$order	 		= $this->order;
				$orderby_name 	= ! empty( $this->_sort_args ) ? $this->_sort_args['orderby_name'] : '';
				$order_name	  	= ! empty( $this->_sort_args ) ? $this->_sort_args['order_name'] : '';
				$arrows			= ! empty( $this->_sort_args ) ? $this->_sort_args['arrows'] : '';
				break;
			default:
				$orderby = '';
				$order   = '';
				$orderby_name = '';
				$order_name = '';
				$arrows = '';

		}
		
		$html = '';
		
		if( empty( $header ) || !is_array( $header ) ) {
			$html .= '';
		} else {
			$html .= sprintf( '%s', ( $footer === true ? '<tfoot>' : '<thead>' ) ) . PHP_EOL;
			$html .= '<tr>' . PHP_EOL;
			$i = 0;
			foreach( $header as $key => $label ) {
				$create_class = ( is_numeric( $key ) ? $pref . $key+1 : self::normalizeString( $pref . $key ) );
				$classes 	  = array( $pref . 'dmth', $create_class );
				$class 		  = implode( ' ', $classes );
				$bulk		  = ( $key === $column_bulk ? $bulk_input : '' );
				if( in_array( $key, $scope_column ) || empty( $scope_column ) ) {
					$scope_attr = empty( $scope_column ) ? '' : ' scope="col"';
					if( (bool) $sortable === true && $orderby === $key ) {
						$query_args = array( $orderby_name => $orderby, $order_name => $order );
						$hiddens 	= self::getHiddenFields( array_keys( $query_args ), true );
						$sortable 	= sprintf( '<span class="dm-sort"><a href="%1$s">%2$s %3$s</a></span>',
							self::filterUrl( $this->base_url, ($hiddens+$query_args) ),
							$label, // not sanitized
							$arrows[$order]
						) . PHP_EOL;
						$html .= sprintf( '<th%1$s class="%2$s"%3$s>%4$s</th>',
							$scope_attr,
							self::escValue( $class ),
							$tfixed,
							$sortable
						) . PHP_EOL;
					} else {
						$html .= sprintf( '<th%1$s class="%2$s"%3$s>%4$s%5$s</th>',
							$scope_attr,
							self::escValue( $class ),
							$tfixed,
							$bulk,
							$label	
						) . PHP_EOL;
					}
				} else {
					$html .= sprintf( '<td class="%1$s"%2$s>%3$s%4$s</td>',
						self::escValue( $class ),
						$tfixed,
						$bulk,
						$label
					) . PHP_EOL;
				}
				$i++;
			}
			$html .= '</tr>' . PHP_EOL;
			$html .= sprintf( '%s', ( $footer === true ? '</tfoot>' : '</thead>' ) ) . PHP_EOL;
		}
		
		return $html;
		
	}

	/**
         * Render table header
         *
         * @author Davide Mura (iljester) <muradavi@gmail.com>
         * @access protected
         * @return void
         * @since 1.0
         */    
	protected function _header() {

		return $this->_metaHeader();
	   
	}

	/**
	 * Render table footer
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */    
	protected function _footer() {

		$footer = ! empty( $this->_table_args ) ? $this->_table_args['footer'] : false;

		if( (bool) $footer === true ) {
			return $this->_metaHeader( true );
		}
		return;
	   
	}

	/**
	 * Render table content
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return void
	 * @since 1.0
	 */
	protected function _content() {

		if( empty( $this->_table_args ) ) {
			return '';
		}
	   
		$content   = $this->_content;
		$no_data   = $this->_table_args['no_data'];
		$tfixed	   = $this->_table_args['tfixed'][1]['content'];
		$scope_row = $this->_table_args['scope_row'];

		// get current action (for screen reader text )
		$current_action = 'none';
		if( !empty( $this->_actions_args ) ) {
			$current_action = $this->action;
		}

		$html  = '';
		$html .= '<tbody>' . PHP_EOL;
		if( empty( $content ) || !is_array( $content ) ) {
		   
		   $colspan = '';
		   if( is_array( $this->_header ) && ! empty( $this->_header ) ) {
			   $colspan = sprintf( ' colspan="%s"', count( $this->_header ) );
		   }
		   
		   $html .= '<tr>' . PHP_EOL;
		   $html .= sprintf( '<td%1$s%2%s>%3$s</td>', $colspan, $tfixed, $no_data ) . PHP_EOL;
		   $html .= '</tr>' . PHP_EOL;
		} else {
			$i = 0;
		    foreach( $content as $row => $columns ) {
				$oddeven = ( $i % 2 === 0 ) ? 'odd' : 'even';
				$id = self::normalizeString( $row );
				if( ! empty( $this->_innerRows ) ) {
					foreach( $this->_innerRows as $innerRow ) {
						if( $i === self::absint( $innerRow['after'] ) ) {
							$inner_class = $innerRow['class'] !== '' ? ' class="' . self::normalizeString( $innerRow['class'] ) . '"' : '';
							$html .= sprintf( '<tr%1$s>%2$s</tr>',
								$inner_class,
								$innerRow['callback']
							);
						}
					}
				}
				$html .= sprintf( '<tr id="dmct-tr-%1$s" class="dmct-trow dmct-trow-%2$s">', $id, $oddeven ) . PHP_EOL;
				foreach( $columns as $key => $column ) {
					$class = is_numeric( $key ) ? (int) $key+1 : preg_replace( '/[^a-z0-9\_\-]/i', '', strtolower($key) );
					if( $key === $scope_row ) {
						$html .= sprintf( '<th scope="row" class="dmct-td dmct-%1$s">%2$s</th>',
							self::escValue( $class ),
							$column
						) . PHP_EOL;
					} else {
						// normal column
						if( ! is_array( $column ) ) {
							$html .= sprintf( '<td class="dmct-td dmct-%1$s"%2$s>%3$s</td>',
								self::escValue( $class ),
								$tfixed,
								$column
							) . PHP_EOL;
						}
						// column with submenu
						else {
							$html .= sprintf( '<td class="dmct-td dmct-%1$s"%2$s>', $class, $tfixed );
							$html .= $column['primary']; // not sanitized
							$html .= '<p class="dmct-menu">' . PHP_EOL;
							if( ! is_array( $column['secondary'] ) ) {
								$column['secondary'] = (array) $column['secondary'];
							}
							foreach( $column['secondary'] as $key => $value ) {
								$html .= sprintf( '<span class="dmct-voice-%1$s">%2$s</span>',
									self::escValue( $key+1 ),
									$value
								) . PHP_EOL;
							}
							$html .= '</p>' . PHP_EOL;
							$html .= '</td>' . PHP_EOL;
						}
					}
				}
				$html .= '</tr>' . PHP_EOL;
				$i++;  
		   }
		}
		$html .= '</tbody>' . PHP_EOL;

		return $html;
   
	}

	/**
	 * Render table submit
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return voif
	 * @since 1.0
	 */
	protected function _submit() {

		if( empty( $this->_table_args ) ) {
			return '';
		}
		
		$submit 			= $this->_table_args['form']['submit'];
		$default_value		= $this->_table_args['form']['submit_default_val'];

		$html = '';
		if( false !== (bool) $submit ) {
			$html .= $submit;
		} else {
			$html .= sprintf( '<input type="submit" value="%s" />', self::escValue( $default_value ) );
		}

		return $html;

	}

	/**
	 * Render table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access protected
	 * @return voif
	 * @since 1.0
	 */
	protected function _table() {

		if( empty( $this->_table_args ) ) {
			return;
		}

		$form    = $this->_table_args['form'];
		$tfixed	 = $this->_table_args['tfixed'][0];
		$tid	 = $this->_table_args['table_id'];
		$footer  = $this->_table_args['footer'];
		$vars	 = self::getHiddenFields( array_values( $this->query_names ) ); // remove all query vars generate from settings above
		$before_list = $this->_table_args['before_list'];
		$after_list  = $this->_table_args['after_list'];

		// set method form
		if( !is_array( $form['method'] ) ) {
			$form['method'] = (array) $form['method'];
		}
		
		foreach( $form['method'] as $key => $value ) {
			$value = strtolower( $value );
			if( !in_array( $value, array( 'get', 'post' ) ) ) {
				$form['method'][$key] = 'get';
			}
		}
		
		$methods = self::parseArgs( $form['method'], array('get','get','get') );
		$method_top 	= strtolower( $methods[0] );
		$method_content = strtolower( $methods[1] );
		$method_bottom  = strtolower( $methods[2] );

		// set inputs hidden
		$hidden_fields = $form['hidden_fields_inputs'];
		$top_hidden_fields 	  = array();
		$table_hidden_fields  = array();
		$bottom_hidden_fields = array();
		if( !empty( $hidden_fields ) ) {
			foreach( $hidden_fields as $key => $hidden_field ) {
				switch( $hidden_field['position'] ) {
					case 'header' :
						unset( $hidden_field['position'] );
						$hidden_field['name'] = $key;
						$top_hidden_fields[] = self::input( 'hidden', $hidden_field );
						break;
					case 'content' :
						unset( $hidden_field['position'] );
						$hidden_field['name'] = $key;
						$tags = ' ' . implode ( ' ', $hidden_field ) . ' ';
						$table_hidden_fields[] = self::input( 'hidden', $hidden_field );
						break;
					case 'footer' :
						unset( $hidden_field['position'] );
						$hidden_field['name'] = $key;
						$tags = ' ' . implode ( ' ', $hidden_field ) . ' ';
						$top_hidden_fields[] = self::input( 'hidden', $hidden_field );
				}
			}
		}

		// html
		$html  = '';
		$html .= sprintf( '<div%sclass="dm-table">', ( $tid !== '' ? ' id="' . self::escValue( $tid ) . '"' : ' ' ) );

		/**
		 * Table area top
		 */
		$html .= '<div class="dm-table-area-top">';
		self::$is_position = 'head';
		$html .= sprintf( '<form method="%1$s" id="dm-settings-top"%2$s>',
			self::escValue( $method_top, true ),
			( ! $form['action'] ? '' : ' action="' . self::escValue( $form['action'], true ) . '"' )
		);
		$html .= $vars;
		$html .= sprintf( '<div class="dm-area dm-settings"><div class="dm-pagsort">%1$s%2$s</div><div class="dm-search">%3$s</div></div>',
			$this->_perpage(),
			$this->_sortable(),
			$this->_search()
		);
		$html .= sprintf( '<div class="dm-area dm-manage"><div class="dm-actions">%1$s%2$s</div><div class="dm-pagination">%3$s</div></div>',
			$this->_actions(),
			$this->_filters(),
			$this->_pagination()
		);
		$html .= ! empty( $top_hidden_fields ) ? implode( '', $top_hidden_fields ) : '';
		$html .= '</form>';
		$html .= '</div>';

		/**
		 * Table area content
		 */
		$html .= '<div class="dm-table-area-content">';
		self::$is_position = 'content'; // we are in content area
		$html .= sprintf( '<form method="%1$s" id="dm-form-table"%2$s%3$s>',
			self::escValue( $method_content, true ),
			( ! $form['action'] ? '' : ' action="' . self::escValue( $form['action'], true ) . '"' ),
			( $form['enctype'] !== false && $method_content === 'post' ? ' enctype="' . self::escValue( $form['enctype'], true ) . '"' : '' )
		);
		if( (bool) $form['submit_on_top'] === true || ! empty( $before_list ) ) {
			$no_list   = ( empty( $before_list ) ? ' dm-no-inline-menu' : '' );
			$no_submit = ( true !== (bool) $form['submit_on_top'] ? ' dm-no-submit' : '' );
			$html .= sprintf( '<div class="dm-area dm-before-list%1$s">%2$s%3$s</div>',
				( $no_list . $no_submit ),
				( ! empty( $before_list ) ? sprintf( '<div class="dm-inline-menu dm-top-inline-menu">%s</div>', implode( ' ', $before_list ) ) : '' ),
				( (bool) $form['submit_on_bottom'] === true ? sprintf( '<div class="dm-submit dm-submit-top">%s</div>',  $this->_submit() ) : '' )
			);
		}
		$html .= $vars;
		$html .= sprintf( '<table width="100&percnt;"%1$s>%2$s%3$s%4$s</table>',
			'class="' . self::escValue( $tfixed, true ) . '"',
			$this->_header(),
			$this->_content(),
			$this->_footer()
		);
		$html .= ! empty( $table_hidden_fields ) ? implode( '', $table_hidden_fields ) : '';
		if( (bool) $form['submit_on_bottom'] === true || ! empty( $after_list ) ) {
			$no_list   = ( empty( $before_list ) ? ' dm-no-inline-menu' : '' );
			$no_submit = ( true !== (bool) $form['submit_on_bottom'] ? ' dm-no-submit' : '' );
			$html .= sprintf( '<div class="dm-area dm-after-list%1$s">%2$s%3$s</div>',
				( $no_list . $no_submit ),
				( ! empty( $after_list ) ? sprintf( '<div class="dm-inline-menu dm-bottom-inline-menu">%s</div>', implode( ' ', $after_list ) ) : '' ),
				( (bool) $form['submit_on_bottom'] === true ? sprintf( '<div class="dm-submit dm-submit-bottom">%s</div>',  $this->_submit() ) : '' )
			);
		}
		$html .= '</form>';
		$html .= '</div>';

		/**
		 * Table area footer
		 */
		$html .= '<div class="dm-table-area-footer">';
		self::$is_position = 'foot'; // we are in the footer
		if( (bool) $footer === true ) {
			$html .= sprintf( '<form method="%1$s" id="dm-settings-bottom"%2$s>',
				self::escValue( $method_bottom, true ),
				( ! $form['action'] ? '' : ' action="' . self::escValue( $form['action'], true ) . '"' )
			);
			$html .= $vars;
			$html .= sprintf( '<div class="dm-area dm-manage"><div class="dm-actions">%1$s</div><div class="dm-pagination">%2$s</div></div>',
				$this->_actions(),
				$this->_pagination()
			);
			$html .= ! empty( $hidden_fields_bottom ) ? implode( '', $hidden_fields_bottom ) : '';
			$html .= '</form>';
		}
		$html .= '</div>';
		$html .= '</div>';

		return $html;

	}

	/**
	 * Display Sortable
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displaySortable() {

		echo $this->_sortable();

	}

	/**
	 * Display Actions
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displayActions() {

		echo $this->_actions();

	}

	/**
	 * Display Sortable
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displayFilters() {

		echo $this->_filters();
		
	}

	/**
	 * Display Search
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displaySearch() {

		echo $this->_search();

	}

	/**
	 * Display Pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displayPerpage() {

		echo $this->_perpage();

	}

	/**
	 * Display Pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displayPagination() {

		echo $this->_pagination();

	}

	/**
	 * Display only essential content table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displayLiteTable() {

		printf( '<table id="dm-lite-table" width="100&percnt;"%1$s>%2$s%3$s%4$s</table>',
			'class="' . self::escValue( $tfixed, true ) . '"',
			$this->_header(),
			$this->_content(),
			$this->_footer()
		);

	}

       /**
         * Display complete table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displayTable() {

		echo $this->_table();
	  
	}

	/**
	 * Display submit
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function displaySubmit() {

		echo $this->_submit();

	}
    
}
