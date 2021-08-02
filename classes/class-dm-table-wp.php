<?php
/********************************************************************************
 * DM Table WP
 *
 * Table items generator to manage db elements in Wordpress
 * Require DM_Table class
 * 
 * @version     1.2
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

/**
 * DM_Table_WP
 * Require DM_Table
 */
if( ! class_exists( 'DM_Table' ) ) {
	die( 'DM_Table_WP requires DM_Table' );
}

class DM_Table_WP {

	/**
	 * $base_url
	 * the url of the page where the script is located
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $base_url = '';

	/**
	 * $domain
	 * the domain language for translate
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $domain = '';

	/**
	 * $dm_table
	 * the instance of DM_Table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var object|bool
	 * @access public
	 * @since 1.0
	 */
	public $dm_table = false;

	/**
	 * $columns
	 * an array of columns table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public $columns = array();

	/**
	 * $action
	 * the action name
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $action = '';

	/**
	 * $actions
	 * an array of actions
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public $actions = array();

	/**
	 * $filters
	 * an array of filters
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public $filters = array();

	/**
	 * $search
	 * keyword passed to search
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $search = '';

	/**
	 * $order
	 * sort order
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $order = 'asc';

	/**
	 * $orderby
	 * order by element (ex. ID, email etc.)
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var string
	 * @access public
	 * @since 1.0
	 */
	public $orderby = 'ID';

	/**
	 * $limit
	 * set number of items perpage
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $limit = 5;

	/**
	 * $offset
	 * set start position item number to display items
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $offset = 0;

	/**
	 * $total_rows
	 * total rows
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var int
	 * @access public
	 * @since 1.0
	 */
	public $total_rows = 0;

	/**
	 * $raw_data
	 * data used for innerRow
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var bool|array
	 * @access public
	 * @since 1.0
	 */
	public $raw_data = false;

	/**
	 * $data
	 * set data for table list
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public $data = array();

	/**
	 * $data
	 * set data for table method
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public $args = array();		
			

	/**
	 * The constructor
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$base_url  |string      // the page url if is implemented the table
	 * 		$domain	   |string	// a language domain
	 * @return void
	 * @since 1.0
	 */
	public function __construct( $base_url = '', $domain = '' ) {

		$this->dm_table = class_exists( 'DM_Table' ) ? new DM_Table : false;
		if( false !== $this->dm_table ) {
			$this->base_url = $this->dm_table->setBaseUrl( $base_url );
		}
		$this->domain = $domain;

	}

	/**
	 * If DM_Table not exists or not exists an instance of DM_Table return false and
	 * an error message
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @access public
	 * @return bool
	 * @since 1.0
	 */
	public function dm_table_notExists() {

		$domain = $this->domain;

		if( false === $this->dm_table ) {
			esc_html_e( 'DM_Table requires DM_Table_WP', $domain );
			return false;
		}

		return true;

	}

	/**
	 * Build columns
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	|array	// an array of columns
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function columns( $args = array() ) {

		$columns = array();
		foreach( $args as $key => $column ) {
			$key = DM_Table::normalizeString( $key );
			$column = DM_Table::escValue( $column, true );
			$columns[$key] = $column;
		}

		$this->columns = $columns;

	}

	/**
	 * Build sortable
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	|array	// an array of arguments
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function sortable( $args = array() ) {

		$dm_table 	= $this->dm_table;

		$defaults = array(
			'disabled' 	   => false,
			'choices'  	   => array(),
			'default_sort' => 'ID',
			'submit'   	   => true,
			'submit_label' => 'Order By'
		);

		$args  = DM_Table::parseArgs( $args, $defaults );
		$args  = DM_Table::unsetArgs( $args, array_keys( $defaults ) );

		if( (bool) $args['disabled'] === false ) {

			$default_sort = DM_Table::escValue( $args['default_sort'], true );
			$choices      = array_map(
				function( $value ) {
					return DM_Table::escValue( $value, true );
				},
			$args['choices'] );
			$label = DM_Table::escValue( $args['submit_label'], true );

			$submit = false;
			if( (bool) $args['submit'] === true ) {
				$submit = DM_Table::input(
					'submit',
					array(
						'value' => $label
					)
				);
			}

			$dm_table->setSortable(
				array(
					'order'	  		  => array( 'order', 'asc', 'desc' ),
					'orderby'		  => array( 'orderby', $default_sort )
				),
				DM_Table::input(
					'select',
					array(
						'name'  	=> 'orderby',
						'value' 	=> DM_Table::action( INPUT_GET, 'orderby', '-1' ),
						'choices' 	=> $choices,
						'class'		=> 'orderby'
					)
				),
				$submit
			);

			$this->order 	 = $dm_table->order;
			$this->orderby   = $dm_table->orderby;

		}

	}

	/**
	 * Build search
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	|array	// an array of arguments
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function search( $args = array() ) {

		$dm_table = $this->dm_table;

		$defaults = array(
			'disabled' 		=> false,
			'submit'		=> true,
			'submit_label'	=> 'Search',
			'placeholder' 	=> 'Search...'
		);
			
		$args  = DM_Table::parseArgs( $args, $defaults );
		$args  = DM_Table::unsetArgs( $args, array_keys( $defaults ) );
		
		if( (bool) $args['disabled'] === false ) {

			$label 		 = DM_Table::escValue( $args['submit_label'], true );
			$placeholder = DM_Table::escValue( $args['placeholder'], true );

			$submit = false;
			if( $args['submit'] === true ) {
				$submit = DM_Table::input(
					'submit',
					array(
						'value' => $label
					)
				);
			}
			
			$dm_table->setSearch(
				array( 'search_action', '' ),
				DM_Table::input(
					'search',
					array(
						'name' 		  => 'search_action',
						'value' 	  => DM_Table::action( INPUT_GET, 'search_action', '' ),
						'placeholder' => $placeholder,
						'class'		  => 'search-action'
					)
				),
				$submit
			);

			$this->search = $dm_table->search;
		}

	}

	/**
	 * Build filters
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	|array	// an array of arguments
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function filters( $args = array() ) {

		$dm_table = $this->dm_table;

		$defaults = array(
			'disabled' 		=> false,
			'submit_label'	=> 'Filter',
			'submit'   		=> true,
			'filters'  		=> array()
		);

		$args  = DM_Table::parseArgs( $args, $defaults );
		$args  = DM_Table::unsetArgs( $args, array_keys( $defaults ) );

		$filters = array();
		foreach( $args['filters'] as $arg ) {

			$arg = DM_Table::parseArgs( $arg, array( 'filter_id' => '', 'default_label' => 'Choose Filter', 'choices' => array() ) );
			$arg = DM_Table::unsetArgs( $arg, array( 'filter_id', 'default_label', 'choices' ) );
			
			$key      = DM_Table::escValue( $arg['filter_id'], true );
			$label 	  = DM_Table::escValue( $arg['default_label'], true );
			$values   = array_map( function( $value ) {
				return DM_Table::escValue( $value, true );
			}, $arg['choices'] );
			$choices  = ['-1' => $label]+$values;
			$filters[$key] = $choices;

		}

		$inputs_filters = array();
		foreach( $filters as $key => $choices ) {
			$inputs_filters["{$key}_filter"] = array(
				'filter' => array( $key, '-1' ),
				'input' => DM_Table::input(
					'select',
					array(
						'name' 	  => $key,
						'value'   => DM_Table::action( INPUT_GET, $key, '-1' ),
						'choices' => $choices,
						'class'   => 'filters',
						'id'	  => $key . '-filter'
					)
				)
			);
		}

		if( (bool) $args['disabled'] === false ) {

			$label = DM_Table::escValue( $args['submit_label'], true );

			$submit = false;
			if( $args['submit'] === true ) {
				$submit = DM_Table::input(
					'submit',
					array(
						'value' => $label
					)
				);
			}
			
			if( !empty( $inputs_filters ) ) {
				$dm_table->setFilters(
					$inputs_filters,
					$submit
				);
			}
			
			$this->filters = $dm_table->filters;

		}

	}

	/**
	 * Build actions
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @param
	 * 		$args	|array	// an array of arguments
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function actions( $args = array() ) {

		$dm_table = $this->dm_table;

		$defaults = array(
			'disabled'		=> false,
			'choices'       => array(),
			'submit'		=> true,
			'submit_label' 	=> 'Apply',
			'default_label' => 'Choose Action',
		);

		$args  = DM_Table::parseArgs( $args, $defaults );
		$args  = DM_Table::unsetArgs( $args, array_keys( $defaults ) );

		if( (bool) $args['disabled'] === false ) {

			$label_submit  = DM_Table::escValue( $args['submit_label'], true );
			$label_default = DM_Table::escValue( $args['default_label'], true );
			$choices 	   = ( ['-1' => $label_default]+$args['choices'] );

			$this->actions = $choices;

			$submit = false;
			if( $args['submit'] === true ) {
				$submit = DM_Table::input(
					'submit',
					array(
						'value' => $label_submit
					)
				);
			}
			
			$dm_table->setActions(
				array(
					'action'			=> array( 'select_action', '-1' ),
				),
				DM_Table::input(
					'select',
					array(
						'name'    => 'select_action',
						'value'   => DM_Table::action( INPUT_GET, 'select_action', '-1' ),
						'id'	  => DM_Table::POSITION . '-select-action',
						'choices' => $choices,
						'class'	  => 'select-action'
					)
				),
				$submit
			);
		}

	}

	/**
	 * Build pagination
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params $args		|array	// data content to build pagination
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function pagination( $args = array() ) {

		if( false === $this->dm_table ) {
			return;
		}
		
		$domain		= $this->domain;
		
		$defaults = array(
			'rows' 			=> '',
			'perpage' 		=> '',
			'hide' 			=> false,
			'input_name' 	=> 'limit',
			'class' 		=> 'limit perpage',
			'value' 		=> __('Limit', $domain )
		);
		
		$args  = DM_Table::parseArgs( $args, $defaults );
		$args  = DM_Table::unsetArgs( $args, array_keys( $defaults ) );
		
		$rows 			= $args['rows'];
		$perpage_off 	= $args['hide'];
		$input_name     = $args['input_name'];
		$class          = $args['class'];
		$value			= $args['value'];

		$dm_table 	= $this->dm_table;
		$default    = DM_Table::absint( $args['perpage'] );
		$perpage	= !isset( $args['perpage'] ) ? $dm_table->perpage : DM_Table::absint( $args['perpage'] );
		
		// set perpage
		if( (bool) $perpage_off === false ) {
			$dm_table->setPerpage(
				array( 'limit', DM_Table::absint( $perpage ) ),
				DM_Table::input(
					'text',
					array(
						'name'  => DM_Table::normalizeString( $input_name ),
						'value'	=> DM_Table::action( INPUT_GET, 'limit', $default ),
						'class' => DM_Table::escValue( $class )
					)
				),
				DM_Table::input(
					'submit',
					array(
						'value' => DM_Table::escValue( $value )
					)
				)
			);
		}

		$total_rows = !is_int( $rows ) && is_array( $rows ) ? count( $rows ) : DM_Table::absint( $rows );

		$dm_table->setPagination(
			array(
				'total_rows' => $total_rows,
				'start' 	 => array( 'pag', 1 ),
				'limit' 	 => array( 'limit', $perpage ),
				'action_uri' => true,
				'of_pages'   => __( 'of $1', $domain )
			)
		);

		$this->total_rows	= $dm_table->total_rows;
		$this->offset   	= $dm_table->offset;
		$this->limit 		= $dm_table->limit;
		
	}

	/**
	 * Build action
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$id				|string			// the target id action (ex. user->ID, post->ID)
	 * 		$column_action 	|string 		// the column used for action
	 * 		$is_disabled	|bool			// if action is disabled or not
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function action( $id = -1, $column_action = '', $is_disabled = false, $custom_class = '' ) {

		if( false === $this->dm_table ) {
			return;
		}

		$this->action = $column_action;

		$dm_table = $this->dm_table;
		$id 	  = DM_Table::normalizeString( $id );
		
		$actions  = $this->actions;
		unset( $actions['-1'] );
		
		$name	  = $dm_table->input_action_name;
		$domain	  = $this->domain;
		$tag_id   = ( $column_action !== '' ? $column_action . '-' . $id : $column_action . '-none' );
		$disabled = (bool) $is_disabled === false ? 'disabled' : '';
		$custom_class = DM_Table::normalizeString( $custom_class, true );
		$custom_class = $column_action . ( $custom_class !== '' ? ' ' . $custom_class : '' );
		
		$action = DM_Table::input( 'checkbox',
			array(
				'name'  	=> $name,
				'value' 	=> $id,
				'class' 	=> $custom_class,
				'id'	   	=> $tag_id,
				'disabled'	=> $disabled,
				'label'		=> array(
					'for' 		=> $tag_id,
					'class' 	=> 'screen-reader-text',
					'position' 	=> 'before',
					'text'		=> sprintf( __( 'Select %s', $domain ), ( !isset( $actions[$column_action] ) ? 'None' : $actions[$column_action] ) )
				)
			)
		);
		
		return $action;
	}

	/**
	 * Get raw data
	 * This is the raw data, is the data used to create the list. Used for the innerRow method
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$raw_data		 |array			 // an array of data
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function rawData( $raw_data = false ) {

		if( !is_array( $raw_data ) && (bool) $raw_data !== false ) {
			$raw_data = (array) $raw_data;
		}

		$this->raw_data = $raw_data;

	}

	/**
	 * Build data
	 * This is a method to organize data. Must return $data to insert in table $data argument
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$callback  	 |mixed value	 // string or array for callable function or method
	 * 		$args		 |array			 // an array of arguments you would like to pass in the callback function
	 * 		$syntax_only |bool   		 // @see: https://www.php.net/manual/en/function.is-callable.php
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function data( $callback, $args = array(), $syntax_only = true ) {

		$this->args = $args;
		$dm_table   = $this->dm_table;

		if( !is_array( $args ) ) {
			$args = (array) $args;
		}

		$dm_table->setData( $callback, $this, $args, $syntax_only );

		$this->data = $dm_table->data;

	}



	/**
	 * Build table
	 *
	 * @author Davide Mura (iljester) <muradavi@gmail.com>
	 * @params
	 * 		$data		|array	// data content for table
	 * 		$table_args |array 	// arguments for set table
	 * @access public
	 * @return void
	 * @since 1.0
	 */
	public function table( $table_args = array() ) {

		if( false === $this->dm_table ) {
			return;
		}

		$dm_table = $this->dm_table;
		$columns  = $this->columns;
		$domain	  = $this->domain;
		$action   = $this->action;
		$data 	  = $this->data;
		$raw_data = $this->raw_data;

		if( !is_array( $data ) ) {
			$data = (array) $data;
		}

		$defaults = array(
			'header' 			=> $columns,
			'content' 			=> $data,
			'footer'			=> true,
			'raw_data'			=> $raw_data,
			'no_data'			=> __( 'Sorry, no data yet!', $domain ),
			'sortable'			=> true,
			'table_fixed'		=> true,
			'scope_row' 		=> $action,
			'form'				=> array( 'method' => ['get', 'post', 'get'] ),
			'before_list'   	=> array(),
			'after_list'    	=> array(),
			'column_bulk'		=> false,
			'bulk_js_calback' 	=> false
		);

		// If a form key is called out of the form, the key is brought back into the form array.
		$form = DM_Table::$defaults['set_table']['form'];
		foreach( array_keys( $table_args ) as $key ) {
			if( in_array( $key, array_keys( $form ) ) ) {
				$table_args['form'][$key] = $table_args[$key];
				unset( $table_args[$key] );
			}
		}

		$table_args = $dm_table::parseArgs( $table_args, $defaults );
		$table_args = $dm_table::unsetArgs( $table_args, array_keys( $defaults ) );
		
		$args = $table_args;

		$dm_table->setTable( $args );
		$dm_table->displayTable();

	}

}
