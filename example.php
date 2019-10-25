<?php

/********************************************************************************
 * Example for DM_Table 
********************************************************************************/

/**
 * Include DM_Table Class
 * set absolute path where is localized dm-table.php
 * It can change based on where the script is located
 */
require_once dirname(__DIR__) . '/dm-table/classes/class-dm-table.php';

/**
 * Create an instance
 */
$dm_table = new DM_Table;

/**
 * Set base url, which is the url where is localized your script (in this case: example.php)
 */
$your_url = 'INSERT_YOUR_URL';
$dm_table->setBaseUrl( $your_url );		

/**
 * We create data examples
 * You should have this data from your db
 */
$users = array();
for( $i = 1; $i <= 20; $i++ ) {

	if( $i <= 5 ) {
		$color = 'red';
		$city = 'rome';
	}
	elseif( $i > 5 && $i <= 10 ) {
		$color = 'yellow';
		$city = 'paris';
	}
	elseif( $i > 10 && $i <= 15 ) {
		$color = 'blue';
		$city = 'london';
	}
	elseif( $i > 15 && $i <= 20 ) {
		$color = 'white';
		$city = 'new_york';
	}

	$users[$i] = array(
		'ID' => $i,
		'username' => 'user_' . $i,
		'email' => 'user_' . $i . '@dmtable.com',
		'color' => $color,
		'city'	=> $city
	);

}

/**
 * Set sortable
 */
$dm_table->setSortable(
	array(
		'order'	  		  => array( 'order', 'asc', 'desc' ),
		'orderby'		  => array( 'orderby', 'ID' )
	),
	DM_Table::input(
		'select',
		array(
			'name'  => 'orderby',
			'value' => DM_Table::action( INPUT_GET, 'orderby', '-1' ), // you can use $_GET['orderby'] or filter_input( INPUT GET, 'orderby' )
			'choices' => array(
				'ID' 		=> 'ID',
				'email' 	=> 'Email',
				'username'  => 'Username'
			)
		)
	),
	DM_Table::input(
		'submit',
		array(
			'value' => 'Ordina'
		)
	)
);

/**
 * Set search
 */
$dm_table->setSearch(
	array(
		'search' => array( 'search_action', '' )
	),
	DM_Table::input(
		'search',
		array(
			'name' => 'search_action',
			'value' => DM_Table::action( INPUT_GET, 'search_action', '' ), // you can use $_GET['search_action'] or filter_input( INPUT GET, 'search_action' )
			'id' => 'mysearch_id',
			'class' => 'mysearch_class',
			'placeholder' => 'Search...'
		)
	),
	DM_Table::input(
		'submit',
		array(
			'value' => 'Search'
		)
	)
);

/**
 * Set actions
 */
$dm_table->setActions(
	array(
		'action'			=> array( 'select_action', '-1' )
	),
	DM_Table::input(
		'select',
		array(
			'name'  => 'select_action',
			'value' => DM_Table::action( INPUT_GET, 'select_action', '-1' ), // you can use $_GET['select_action'] or filter_input( INPUT GET, 'select_action' )
			'choices' => array(
				'-1' 		=> 'Actions',
				'delete' 	=> 'Delete',
				'edit' 		=> 'Edit'
			),
		)
	),
	DM_Table::input(
		'submit',
		array(
			'value' => 'Action'
		)
	)
);

/**
 * Set filters
 */
$dm_table->setFilters(
	array(
		'color_filter' => array(
			'filter' => array( 'color', '-1' ),
			'input' => DM_Table::input(
				'select',
				array(
					'name' => 'color',
					'value' => DM_Table::action( INPUT_GET, 'color', '-1' ), // you can use $_GET['color'] or filter_input( INPUT GET, 'color' )
					'choices' => array(
						'-1' 		=> 'Color Filter',
						'red'  		=> 'Red',
						'yellow'  	=> 'Yellow',
						'blue'  	=> 'Blu',
						'white' 	=> 'White'
					)
				)
			)
		),
		'city_filter' => array(
			'filter' => array( 'city', '-1' ),
			'input' => DM_Table::input(
				'select',
				array(
					'name' => 'city',
					'value' => DM_Table::action( INPUT_GET, 'city', '-1' ), // you can use $_GET['city'] or filter_input( INPUT GET, 'city' )
					'choices' => array(
						'-1' 		=> 'City Filter',
						'rome'  		=> 'Rome',
						'paris'			=> 'Paris',
						'london'		=> 'London',
						'new_york'		=> 'New York'
					)
				)
			)
		)
	),
	DM_Table::input(
		'submit',
		array(
			'value' => 'Filter'
		)
	)
);

/**
 * Set perpage
 */
$dm_table->setPerpage(
	array(
		'perpage' => array( 'perpage', 5 ),
	),
	DM_Table::input(
		'text',
		array(
			'name' => 'perpage',
			'value'	=> DM_Table::action( INPUT_GET, 'perpage', 5 ), // you can use $_GET['perpage'] or filter_input( INPUT GET, 'perpage' )
			'class' => 'dm-perpage'
		)
	),
	DM_Table::input(
		'submit',
		array(
			'value' => 'Perpage'
		)
	)
);

/**
 * Prepare query (this is an example)
 * Remember: you must have an array of arguments. Ex. an array of objects or values
 */

$order	  		= $dm_table->order;
$orderby		= $dm_table->orderby;

if( $order === 'asc' ) {
	asort( $users );
} else {
	arsort( $users );
}

if( (int) $dm_table->filters['color_filter']['value'] !== -1 ) {
	$key 	= $dm_table->filters['color_filter']['name'];
	$value  = $dm_table->filters['color_filter']['value'];
	foreach( $users as $k => $u ) {
		if( $u['color'] !== $value ) {
			unset( $users[$k] );
		}
	}
}

if( (int) $dm_table->filters['city_filter']['value'] !== -1 ) {
	$key 	= $dm_table->filters['city_filter']['name'];
	$value  = $dm_table->filters['city_filter']['value'];
	foreach( $users as $k => $u ) {
		if( $u['city'] !== $value ) {
			unset( $users[$k] );
		}
	}
}

if( $dm_table->search !== '' ) {
	$search = $dm_table->search;
	foreach( $users as $k => $u ) {
		foreach( $u as $i => $v ) {
			if( $search !== $v ) {
				unset( $users[$k] );
			}
		}
	}
}

/**
 * Get total rows
 * You can use any function or method to return total count of rows
 * You can insert in 'total_rows' an array or a int number (ex. count( your_array) ).
 */
$total_rows = count( $users );

/**
 * Set pagination
 */
$dm_table->setPagination(
	array(
		'total_rows' => $total_rows,
		'start' 	 => array( 'tpage', 1 ),
		'limit' 	 => array( 'tperpage', $dm_table->perpage ),
		'action_uri' => true
	)
);

$offset = $dm_table->offset;
$limit  = $dm_table->limit;

$users = array_slice( $users, $offset, $limit );

/**
 * Set content
 */
// columns
$columns = array(
	'action'		=> '', // we reserved it for actions
	'ID'			=> 'ID',
	'username' 		=> 'Username',
	'email' 		=> 'Email',
	'test'			=> 'Test'
);

// built data
$data = array();
foreach( $users as $key => $user ) {

	// we create action edit in line and we disabled action checkboxes
	if( $dm_table->action === 'edit' ) {
		$username = DM_Table::input(
			'text',
			array(
				'name' => 'edit_username[]',
				'value' => $user['username']
			)
		);
		$disabled = true;
		$dm_table->input_action_name = '';
	} else {
		$username = $user['username'];
		$disabled = false;
	}

	// create our data
	$data[$user['username']] = array(
		'action' => DM_Table::input( 'checkbox',
			array(
				'name'  	=> $dm_table->input_action_name, // the action is the value passed in select_action
				'value' 	=> $user['ID'],
				'class' 	=> $dm_table->action,
				'id'	   	=> ( $dm_table->action !== '' ? $dm_table->action . '-' . $user['ID'] : '' )
			)
		),
		'ID' 		=> $user['ID'],
		'username' 	=> $username,
		'email' 	=> $user['email'],
		'test'		=> array(
			'primary' => DM_Table::input( 'button',
				array(
					'type' => 'submit',
					'name' => 'mytextarea',
					'value' => 5,
					'class' => 'button',
					'id'	=> 'secret',
					'content' => 'Click me!'
				)
			),
			'secondary' => array(
				'This is a submenu:',
				$key === 1 ? ( '<a id="show-hidden-row" href="javascript:void();">Hidden Row</a>' ) : '',
				'<a href="#">Link 2</a>'
			)
		)
	);

}

/**
 * Set table
 */
$args = array(
	'header' 		=> $columns, // columns
	'content' 		=> $data,    // data,
	'footer'		=> true,	 // if true, we render footer as mirror header
	'raw_data'		=> $users,	 // the array of users example
	'no_data'		=> 'Sorry, no data yet!',
	'sortable'		=> true, 	 // if yes, columns will be sortable
	'table_fixed'	=> true,	 // if yes table will be render fixed
	'table_id'		=> 'test_id', // id for table,
	'before_list'	=> array(
		'<a href="' . DM_Table::escValue( $your_url ) . '">Base</a>',
		DM_Table::SEP,
		'<span class="total-rows">Total Items: ' .DM_Table::escValue( $dm_table->total_rows ) . '</span>',
		DM_Table::SEP,
		'Other stuff!'
	),
	'scope_row' 		=> 'action',
	'column_bulk'		=> 'action',
	'bulk_js_callback'	=> 'toggleBulk(this)'
);

$dm_table->setTable( $args );

/**
 * Inner Rows.
 * After set Table
 */
$dm_table->innerRow( 2, 'innered-row', function( $columns, $instance, $users ) {
	return '<td class="hidden-row" style="display:none; background-color: red;" colspan="' . $columns . '">This is a innered row</td>';
} );

?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/dm-table.css" />
	<style>
	p.generated {
		text-align: right;
		font-size: 14px;
		font-family: arial, sans-serif;
		padding: 0 20px 10px;
	}
    </style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<?php
	$action = DM_Table::buildActionName('select_action', '-1' );
	DM_Table::jsBulk($action); ?>
	<script>
		jQuery(function($) {
			$('#show-hidden-row').click( function() {
				$('.hidden-row').toggle();
			});
		});
	</script>
	
</head>
<body>
	<?php $dm_table->displayTable(); ?>
	<p class="generated">Generated by <a href="https://www.iljester.com/portfolio/dm-table/">DM_Table</a></p>
</body>
</html>
