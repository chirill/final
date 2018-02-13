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
	'qa_create' => '新增',
	'qa_save' => '儲存',
	'qa_edit' => '編輯',
	'qa_restore' => '還原',
	'qa_permadel' => '永久刪除',
	'qa_all' => '所有',
	'qa_trash' => '垃圾箱',
	'qa_view' => '檢視',
	'qa_update' => '更新',
	'qa_list' => '列表',
	'qa_no_entries_in_table' => '沒有紀錄',
	'qa_logout' => '登出',
	'qa_add_new' => '新增',
	'qa_are_you_sure' => '確定?',
	'qa_back_to_list' => '返回',
	'qa_dashboard' => '管理區',
	'qa_delete' => '刪除',
	'qa_delete_selected' => '刪除選擇',
	'qa_category' => '類別',
	'qa_categories' => '類別',
	'qa_sample_category' => '示範類別',
	'qa_questions' => '問題',
	'qa_question' => '問題',
	'qa_answer' => '答案',
	'qa_sample_question' => '示範問題',
	'qa_sample_answer' => '示範答案',
	'qa_faq_management' => '常見問題管理',
	'qa_administrator_can_create_other_users' => '系統管理員(可以新增其他用戶)',
	'qa_simple_user' => '普通用戶',
	'qa_roles' => '角式',
	'qa_role' => '角式',
	'qa_user_management' => '會友管理',
	'qa_users' => '會友',
	'qa_user' => '會友',
	'qa_name' => '名稱',
	'qa_email' => '電子郵件',
	'qa_password' => '密碼',
	'qa_permissions' => '權限',
	'qa_user_actions' => '用戶操作',
	'qa_action' => '操作',
	'qa_time' => '時間',
	'qa_campaign' => '運動',
	'qa_campaigns' => '運動',
	'qa_description' => '簡介',
	'qa_edit_calendar_source' => '編輯日曆來源',
	'qa_client_management' => '客戶管理',
	'qa_client_management_settings' => '客戶管理設定',
	'qa_country' => '國家',
	'qa_client_status' => '客戶狀態',
	'qa_clients' => '客戶',
	'qa_client_statuses' => '客戶狀態',
	'qa_currencies' => '貨幣',
	'qa_main_currency' => '主要貨幣',
	'qa_documents' => '文件',
	'qa_file' => '檔案',
	'qa_income_source' => '收入來源',
	'qa_income_sources' => '收入來源',
	'qa_fee_percent' => '費用百分比',
	'qa_note_text' => '注意文本',
	'qa_client' => '客戶',
	'qa_start_date' => '開始日期',
	'qa_budget' => '預算',
	'qa_project_status' => '項目狀態',
	'qa_project_statuses' => '項目狀態',
	'qa_transactions' => '交易',
	'qa_transaction_types' => '交易類別',
	'qa_transaction_type' => '交易類別',
	'qa_transaction_date' => '交易日期',
	'qa_currency' => '貨幣',
	'qa_current_password' => '現時密碼',
	'qa_new_password' => '新密碼',
	'qa_password_confirm' => '新確認密碼',
	'qa_dashboard_text' => '您已經登入!',
	'qa_forgot_password' => '忘記密碼?',
	'qa_remember_me' => '記住我',
	'qa_login' => '登入',
	'qa_change_password' => '更改密碼',
	'qa_csv' => 'CSV',
	'qa_print' => '列印',
	'qa_excel' => 'Excel',
	'qa_copy' => '複制',
	'qa_pdf' => 'PDF',
	'qa_reset_password' => '重設密碼',
	'qa_reset_password_woops' => '<strong>噢!</strong> 錯誤輸入...',
	'qa_email_line1' => '您收到此電子郵件是因為我們收到了您的帳戶的密碼重設請求。',
	'qa_email_line2' => '如果您沒有要求重設密碼，則不需要採取進一步的操作。',
	'qa_email_greet' => '您好',
	'qa_confirm_password' => '確認密碼',
	'qa_if_you_are_having_trouble' => '如果您在遇到問題, 請點擊',
	'qa_please_select' => '請選擇',
	'qa_register' => '註冊',
	'qa_registration' => '註冊',
	'qa_not_approved_title' => '您未獲授權',
	'qa_not_approved_p' => '您的帳戶尚未獲批。 請耐心等待，稍後再試。',
	'qa_there_were_problems_with_input' => '輸入錯誤',
	'qa_whoops' => '噢!',
	'qa_csvImport' => 'CSV匯入',
	'qa_csv_file_to_import' => 'CSV檔案匯入',
	'qa_parse_csv' => '貼上CSV',
	'qa_import_data' => '匯入數據',
	'qa_imported_rows_to_table' => '已匯入:rows數據',
	'qa_valid_from' => '有效期從',
	'qa_valid_to' => '有效期至',
	'qa_discount_amount' => '折扣（固定）',
	'qa_discount_percent' => '折扣（百分比）',
	'qa_coupons_amount' => '優惠劵面值',
	'qa_coupons' => '優惠劵',
	'qa_code' => '編號',
	'qa_redeem_time' => '換領時間',
	'qa_coupon_management' => '優惠劵管理',
	'qa_time_management' => '時間管理',
	'qa_reports' => '報表',
	'qa_work_type' => '工作類型',
	'qa_work_types' => '工作類型',
	'qa_project' => '項目',
	'qa_start_time' => '開始時間',
	'qa_end_time' => '結束時間',
	'qa_expense_category' => '支出分類',
	'qa_expense_categories' => '支出分類',
	'qa_expense_management' => '支出管理',
	'qa_expenses' => '支出',
	'qa_expense' => '支出',
	'qa_entry_date' => '輸入日期',
	'qa_amount' => '數',
	'qa_income_categories' => '收入類別',
	'qa_monthly_report' => '月結單',
	'qa_companies' => '公司',
	'qa_company_name' => '公司名稱',
	'qa_address' => '地址',
	'qa_website' => '網站',
	'qa_contact_management' => '聯絡管理',
	'qa_contacts' => '聯絡',
	'qa_company' => '公司',
	'qa_first_name' => '名字',
	'qa_last_name' => '姓氏',
	'qa_phone' => '電話',
	'qa_phone1' => '圖片1',
	'qa_phone2' => '圖片2',
	'qa_skype' => 'Skype',
	'qa_photo' => '照片（8mb或以下）',
	'qa_category_name' => '分類名稱',
	'qa_product_management' => '產品管理',
	'qa_products' => '產品',
	'qa_product_name' => '產品名稱',
	'qa_price' => '價錢',
	'qa_tags' => '標籤',
	'qa_tag' => '標籤',
	'qa_photo1' => '圖片1',
	'qa_photo2' => '圖片2',
	'qa_photo3' => '圖片3',
	'qa_calendar' => '日曆',
	'qa_statuses' => '狀態',
	'qa_task_management' => '任務管理',
	'qa_tasks' => '任務',
	'qa_status' => '狀態',
	'qa_attachment' => '附件',
	'qa_due_date' => '限期',
	'qa_assigned_to' => '分配給',
	'qa_assets' => '資產',
	'qa_asset' => '資產',
	'qa_serial_number' => '序號',
	'qa_location' => '位置',
	'qa_locations' => '位置',
	'qa_assigned_user' => '分配（用戶）',
	'qa_notes' => '筆記',
	'qa_assets_history' => '資產歷史',
	'qa_assets_management' => '資產管理',
	'qa_slug' => '人性化連結',
	'qa_content_management' => '文章管理',
	'qa_text' => '文字',
	'qa_excerpt' => '內容',
	'qa_featured_image' => '圖片',
	'qa_pages' => '頁',
	'qa_show' => '顯示',
	'qa_create_new_report' => '新增報告',
	'qa_no_reports_yet' => '沒有報告',
	'qa_created_at' => '新增日期：',
	'qa_updated_at' => '修改日期：',
	'qa_deleted_at' => '刪除日期：',
	'qa_change_notifications_field_1_label' => '寄出通知',
	'qa_select_users_placeholder' => '請選擇其中一個用戶',
	'qa_is_created' => '新增版面',
	'qa_is_updated' => '修改版面',
	'qa_is_deleted' => '刪除版面',
	'qa_notifications' => '通知',
	'qa_notify_user' => '通知用戶',
	'qa_create_new_notification' => '新增通知',
	'qa_stripe_transactions' => 'Stripe交易',
	'qa_upgrade_to_premium' => '升级至高級版',
	'qa_messages' => '訊息',
	'qa_you_have_no_messages' => '您沒有任何訊息!',
	'qa_all_messages' => '所有訊息',
	'qa_new_message' => '新訊息',
	'qa_outbox' => '寄件夾',
	'qa_inbox' => '收件夾',
	'qa_recipient' => '收件者',
	'qa_subject' => '主旨',
	'qa_message' => '訊息',
	'qa_send' => '寄出',
	'qa_reply' => '回覆',
	'qa_calendar_sources' => '日曆來源',
	'qa_new_calendar_source' => '新增日曆來源',
	'qa_create_new_calendar_source' => '新增日曆來源',
	'quickadmin_title' => 'broker',
];