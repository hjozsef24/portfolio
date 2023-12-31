/* global tinymce */
(function () {

	tinymce.PluginManager.add('custom_shortcodes', function (editor) {

		editor.addButton('custom_shortcodes_buttons', {
			text: 'Shortcodes',
			type: 'menubutton',
			menu: [
				{
					text: 'Youtube shortcode',
					onclick: function () {
						wp.mce.youtube_shortcode.popupwindow(editor);
					}
				},
				{
					text: 'Kép shortcode',
					onclick: function () {
						wp.mce.image_shortcode.popupwindow(editor);
					}
				},
				{
					text: 'Gomb shortcode',
					onclick: function () {
						wp.mce.button_shortcode.popupwindow(editor);
					}
				}

			]
		})


	});


})();
