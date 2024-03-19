/* global tinymce */
(function () {

	tinymce.PluginManager.add('custom_shortcodes', function (editor) {

		editor.addButton('custom_shortcodes_buttons', {
			text: 'Extra elemek',
			type: 'menubutton',
			menu: [
				{
					text: 'Gomb beillesztése',
					onclick: function () {
						wp.mce.button_shortcode.popupwindow(editor);
					}
				},
			]
		})


	});


})();
