# DM Table

DM Table is not a real plugin, but a PHP class for creating tables. It is a table generator, customizable and suitable for any PHP project. Being a generic class, it is cross-script, so it can be adapted and used on different types of content platform (CMS).

However, the package also includes DM_Table_WP, which is a class prepared specifically for WordPress. DM_Table WP is not an extension of DM_Table, but uses a DM_Table instance.

__Note: all past values should be sanitized and escaped__

# Basic Usage

`$instance = new DM_Table;`

Then, you must set input selections through:

`$instance->setSortable( $args, $input, $submit )`

`$instance->setActions( $args, $input, $submit )`

`$instance->setFilters( $inputs, $submit )`

`$instance->setPerpage( $args, $input, $submit )`

`$instance->setSearch( $args, $input, $submit )`

For usage, you can see at this link: [DM Table](http://www.iljester.com/portfolio/dm-table/)
