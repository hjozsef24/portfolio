(function ($) {

    var media = wp.media;

    wp.mce = wp.mce || {};

    // Youtube shortcode
    wp.mce.youtube_shortcode = {

        shortcode_data: {},

        template: media.template('youtube-shortcode'),

        getContent: function () {

            var options = this.shortcode.attrs.named;

            return this.template(options);
        },

        edit: function (data) {

            var shortcode_data = wp.shortcode.next('youtube_shortcode', data);
            var values = shortcode_data.shortcode.attrs.named;

            values.innercontent = shortcode_data.shortcode.content;
            wp.mce.youtube_shortcode.popupwindow(tinyMCE.activeEditor, values);
        },


        popupwindow: function (editor, values, onsubmit_callback) {

            values = values || [];

            if (typeof onsubmit_callback !== 'function') {

                onsubmit_callback = function (e) {

                    // input validation
                    if (e.data.id === '') {
                        var window_id = this._id;
                        var inputs = jQuery('#' + window_id + '-body').find('.mce-formitem input');

                        editor.windowManager.alert('ID is a required field!');

                        return false;
                    }

                    var args = {

                        tag: 'youtube_shortcode',
                        type: closed,
                        attrs: {
                            id: e.data.id,
                            text: e.data.text,
                            src: e.data.src,
                            alt: e.data.alt,
                        }

                    };
                    editor.insertContent(wp.shortcode.string(args));
                };

            }

            editor.windowManager.open({

                title: 'Youtube shortcode',
                width: 600,
                height: 300,
                body: [
                    {
                        type: 'textbox',
                        name: 'id',
                        label: 'ID *',
                        value: values.id
                    },
                    {
                        type: 'textbox',
                        name: 'text',
                        label: 'Overlay text',
                        value: values.text
                    },
                    {
                        type: 'textbox',
                        name: 'src',
                        label: 'Image url*',
                        id: 'image_src',
                        value: values.src,
                        readonly: 1
                    },
                    {
                        type: 'textbox',
                        name: 'alt',
                        label: 'Image alt',
                        id: 'image_alt',
                        value: values.alt,
                        readonly: 1
                    },
                    {
                        type: 'button',
                        text: 'Select and image!',
                        onclick: function (e) {
                            e.preventDefault();
                            var image_alt = jQuery('#image_alt');
                            var image_src = jQuery('#image_src');
                            var custom_uploader = wp.media.frames.file_frame = wp.media({
                                title: 'Select and image (1400x700px)!',
                                button: { text: 'Add image' },
                                multiple: false
                            });
                            custom_uploader.on('select', function () {
                                var attachment = custom_uploader.state().get('selection').first().toJSON();
                                image_alt.val(attachment.alt);
                                image_src.val(attachment.url);
                            });
                            custom_uploader.open();
                        }
                    },
                    {
                        type: 'button',
                        text: 'Delete image!',
                        onclick: function (e) {
                            e.preventDefault();
                            jQuery('#image_alt').val('');
                            jQuery('#image_src').val('');
                        }
                    }

                ],

                onsubmit: onsubmit_callback
            });
        }
    };

    wp.mce.highlight_shortcode = {

        shortcode_data: {},

        template: media.template('highlight-shortcode'),

        getContent: function () {

            var options = this.shortcode.attrs.named;

            return this.template(options);
        },

        edit: function (data) {

            var shortcode_data = wp.shortcode.next('highlight_shortcode', data);
            var values = shortcode_data.shortcode.attrs.named;

            values.innercontent = shortcode_data.shortcode.content;
            wp.mce.highlight_shortcode.popupwindow(tinyMCE.activeEditor, values);
        },


        popupwindow: function (editor, values, onsubmit_callback) {

            values = values || [];

            if (typeof onsubmit_callback !== 'function') {

                onsubmit_callback = function (e) {

                    var args = {

                        tag: 'highlight_shortcode',
                        type: closed,
                        attrs: {
                            text: e.data.text,
                        }

                    };
                    editor.insertContent(wp.shortcode.string(args));
                };

            }

            editor.windowManager.open({

                title: 'Kiemelt szĂśveg shortcode',
                width: 600,
                height: 300,
                body: [
                    {
                        type: 'textbox',
                        name: 'text',
                        label: 'SzĂśveg',
                        value: values.text
                    },
                ],

                onsubmit: onsubmit_callback
            });
        }
    }


    // Image shortcode
    wp.mce.image_shortcode = {

        shortcode_data: {},

        template: media.template('image-shortcode'),

        getContent: function () {

            var options = this.shortcode.attrs.named;

            return this.template(options);
        },

        edit: function (data) {

            var shortcode_data = wp.shortcode.next('image_shortcode', data);
            var values = shortcode_data.shortcode.attrs.named;

            values.innercontent = shortcode_data.shortcode.content;
            wp.mce.image_shortcode.popupwindow(tinyMCE.activeEditor, values);
        },


        popupwindow: function (editor, values, onsubmit_callback) {

            values = values || [];

            if (typeof onsubmit_callback !== 'function') {

                onsubmit_callback = function (e) {

                    var args = {

                        tag: 'image_shortcode',
                        type: closed,
                        attrs: {
                            src: e.data.src,
                            alt: e.data.alt,
                        }

                    };
                    editor.insertContent(wp.shortcode.string(args));
                };

            }

            editor.windowManager.open({

                title: 'Image shortcode',
                width: 600,
                height: 300,
                body: [
                    {
                        type: 'textbox',
                        name: 'src',
                        label: 'Image url*',
                        id: 'image_src',
                        value: values.src,
                        readonly: 1
                    },
                    {
                        type: 'textbox',
                        name: 'alt',
                        label: 'Image alt',
                        id: 'image_alt',
                        value: values.alt,
                        readonly: 1
                    },
                    {
                        type: 'button',
                        text: 'Select and image!',
                        onclick: function (e) {
                            e.preventDefault();
                            var image_alt = jQuery('#image_alt');
                            var image_src = jQuery('#image_src');
                            var custom_uploader = wp.media.frames.file_frame = wp.media({
                                title: 'Image',
                                button: { text: 'Add image' },
                                multiple: false
                            });
                            custom_uploader.on('select', function () {
                                var attachment = custom_uploader.state().get('selection').first().toJSON();
                                image_alt.val(attachment.alt);
                                image_src.val(attachment.url);
                            });
                            custom_uploader.open();
                        }
                    },
                    {
                        type: 'button',
                        text: 'Delete image!',
                        onclick: function (e) {
                            e.preventDefault();
                            jQuery('#image_alt').val('');
                            jQuery('#image_src').val('');
                        }
                    }

                ],

                onsubmit: onsubmit_callback
            });
        }
    };

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

                    var args = {

                        tag: 'button_shortcode',
                        type: closed,
                        attrs: {
                            button_target: e.data.button_target,
                            title: e.data.title,
                            link: e.data.link,
                        }

                    };
                    editor.insertContent(wp.shortcode.string(args));
                };

            }

            editor.windowManager.open({

                title: 'Button shortcode',
                width: 600,
                height: 300,
                body: [
                    {
                        type: 'listbox',
                        name: 'button_target',
                        label: 'Target type',
                        values: [
                            { text: 'Same window', value: '_self' },
                            { text: 'New window', value: '_blank' },
                        ],
                        value: values.button_target,
                        id: 'button_target'
                    },
                    {
                        type: 'textbox',
                        name: 'title',
                        label: 'Button title *',
                        value: values.title,
                        id: 'button_title'
                    },
                    {
                        type: 'textbox',
                        subtype: 'url',
                        name: 'link',
                        label: 'Button link *',
                        value: values.link,
                        id: 'button_link'
                    },

                ],

                onsubmit: onsubmit_callback,
            });
        }
    };

    wp.mce.appstore_shortcode = {

        shortcode_data: {},

        template: media.template('appstore-shortcode'),

        getContent: function () {

            var options = this.shortcode.attrs.named;

            return this.template(options);
        },

        edit: function (data) {

            var shortcode_data = wp.shortcode.next('appstore_shortcode', data);
            var values = shortcode_data.shortcode.attrs.named;

            values.innercontent = shortcode_data.shortcode.content;

            wp.mce.appstore_shortcode.popupwindow(tinyMCE.activeEditor, values);

        },

        popupwindow: function (editor, values, onsubmit_callback) {

            values = values || [];


            if (typeof onsubmit_callback !== 'function') {

                onsubmit_callback = function (e) {

                    console.log(e.data);


                    var args = {
                        tag: 'appstore_shortcode',
                        type: closed,
                        attrs: {
                            title: e.data.title,
                            appstore_link: e.data.appstore_link,
                            playstore_link: e.data.playstore_link,
                            flex: e.data.flex,
                        }

                    };
                    editor.insertContent(wp.shortcode.string(args));
                };

            }

            editor.windowManager.open({

                title: 'Appstore shortcode',
                width: 600,
                height: 300,
                body: [
                    {
                        type: 'textbox',
                        name: 'title',
                        label: 'Title',
                        value: values.title,
                        id: 'appstore_title'
                    },
                    {
                        type: 'textbox',
                        subtype: 'url',
                        name: 'appstore_link',
                        label: 'Appstore link',
                        value: values.appstore_link,
                        id: 'appstore_link'
                    },
                    {
                        type: 'textbox',
                        subtype: 'url',
                        name: 'playstore_link',
                        label: 'Playstore link',
                        value: values.playstore_link,
                        id: 'playstore_link'
                    },
                    {
                        type: 'checkbox',
                        name: 'flex',
                        label: 'Display in one line',
                        checked: values.flex,
                        id: 'flex'
                    },
                ],

                onsubmit: onsubmit_callback,
            });
        }
    };


    $(function () {
        // Register shortcodes
        wp.mce.views.register('youtube_shortcode', wp.mce.youtube_shortcode);
        wp.mce.views.register('image_shortcode', wp.mce.image_shortcode);
        wp.mce.views.register('button_shortcode', wp.mce.button_shortcode);
        wp.mce.views.register('highlight_shortcode', wp.mce.highlight_shortcode);
        wp.mce.views.register('appstore_shortcode', wp.mce.appstore_shortcode);
    });

}(jQuery));