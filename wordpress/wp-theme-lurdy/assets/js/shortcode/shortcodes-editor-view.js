(function ($) {

    var media = wp.media;

    wp.mce = wp.mce || {};


    wp.mce.button_shortcode = {

        shortcode_data: {},

        template: media.template('button-shortcode'),

        getContent: function () {

            var options = this.shortcode.attrs.named;

            return this.template(options);
        },

        edit: function (data) {

            var shortcode_data = wp.shortcode.next('button_shortcode', data);
            var values = shortcode_data.shortcode.attrs.named;

            values.innercontent = shortcode_data.shortcode.content;

            wp.mce.button_shortcode.popupwindow(tinyMCE.activeEditor, values);

        },

        popupwindow: function (editor, values, onsubmit_callback) {

            values = values || [];


            if (typeof onsubmit_callback !== 'function') {

                onsubmit_callback = function (e) {
                    // input validation
                    if (e.data.link === '') {
                        var window_id = this._id;
                        var inputs = jQuery('#' + window_id + '-body').find('.mce-formitem input');

                        editor.windowManager.alert('A link kitöltése kötelező!');

                        return false;
                    }

                    var args = {

                        tag: 'button_shortcode',
                        type: closed,
                        attrs: {
                            button_type: e.data.button_type,
                            button_target: e.data.button_target,
                            title: e.data.title,
                            link: e.data.link,
                        }

                    };
                    editor.insertContent(wp.shortcode.string(args));
                };

            }

            editor.windowManager.open({

                title: 'Gomb',
                width: 600,
                height: 300,
                body: [

                    {
                        type: 'listbox',
                        name: 'button_type',
                        label: 'Típus',
                        values: [

                            { text: 'Elsődleges gomb típus', value: 'btn--primary' },
                            { text: 'Másodlagos gomb típus', value: 'btn--secondary' },

                        ],
                        value: values.button_type,
                        id: 'button_type'
                    },
                    {
                        type: 'listbox',
                        name: 'button_target',
                        label: 'Link megnyitása',
                        values: [
                            { text: 'Meglévő ablakban', value: '_self' },
                            { text: 'Új ablakban', value: '_blank' },
                        ],
                        value: values.button_target,
                        id: 'button_target'
                    },
                    {
                        type: 'textbox',
                        name: 'title',
                        label: 'Felirat',
                        value: values.title,
                        id: 'button_title'
                    },
                    {
                        type: 'textbox',
                        subtype: 'url',
                        name: 'link',
                        label: 'Link *',
                        value: values.link,
                        id: 'button_link'
                    },

                ],

                onsubmit: onsubmit_callback,
            });
        }
    };




    $(function () {
        // Register shortcodes
        wp.mce.views.register('button_shortcode', wp.mce.button_shortcode);
    });

}(jQuery));
