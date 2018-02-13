<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'location' => [		'title' => 'Location',		'fields' => [			'name' => 'Name',			'address' => 'Address',		],	],
		'computers' => [		'title' => 'Computers',		'fields' => [			'name' => 'Name',			'mac' => 'Mac',			'os' => 'Os Version',			'owner' => 'Owner',			'location' => 'Location',			'details' => 'Details',			'factura' => 'Factura',			'status' => 'Status',		],	],
		'printers' => [		'title' => 'Printers',		'fields' => [			'name' => 'Name',			'model' => 'Model',			'mac' => 'Mac',			'ip' => 'Ip',			'location' => 'Location',		],	],
		'apps' => [		'title' => 'Apps',		'fields' => [			'name' => 'Name',			'description' => 'Description',			'configs' => 'Configs',			'path' => 'Application',		],	],
		'contact-management' => [		'title' => 'Contact management',		'fields' => [		],	],
		'contact-companies' => [		'title' => 'Companies',		'fields' => [			'name' => 'Company name',			'address' => 'Address',			'website' => 'Website',			'email' => 'Email',		],	],
		'contacts' => [		'title' => 'Contacts',		'fields' => [			'company' => 'Company',			'first-name' => 'First name',			'last-name' => 'Last name',			'phone1' => 'Phone 1',			'phone2' => 'Phone 2',			'email' => 'Email',			'skype' => 'Skype',			'address' => 'Address',		],	],
	'qa_create' => 'Създай',
	'qa_save' => 'Запази',
	'qa_edit' => 'Промени',
	'qa_view' => 'Покажи',
	'qa_update' => 'Обнови',
	'qa_list' => 'Списък',
	'qa_no_entries_in_table' => 'Няма записи в таблицата',
	'qa_custom_controller_index' => 'Персонализиран контролер.',
	'qa_logout' => 'Изход',
	'qa_add_new' => 'Добави нов',
	'qa_are_you_sure' => 'Сигурни ли сте?',
	'qa_back_to_list' => 'Обратно към списъка',
	'qa_dashboard' => 'Табло',
	'qa_delete' => 'Изтрий',
	'quickadmin_title' => 'broker',
];