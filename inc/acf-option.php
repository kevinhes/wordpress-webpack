<?php
if (function_exists('acf_add_options_page')) {
    // ACF插件已安装
    acf_add_options_page(
        array(
            'page_title'      => __('Options'),
            'menu_title'      => __('通用欄位'),
            'menu_slug'       => 'options',
            'capability'      => 'manage_options',
            'position'        => 69,
            'redirect'        => true,
            'icon_url'        => 'dashicons-admin-site',
            'update_button'   => __('Save'),
            'updated_message' => __('Saved'),
        )
    );

    add_action('acf_add_options_page', 'acf_add_options_page');
} else {
    // ACF插件未安装
    // 执行其他操作或显示适当的错误消息
}
