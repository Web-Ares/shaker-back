/**
 * Created by iutin on 04.04.16.
 */
(function ($) {
    $(function () {

        $.each($('#curations'), function () {

            new Curations($(this));

        });

    });

    var Curations = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _data_action = _obj.data('action'),
            _categor_select = _obj.find('.curation_categories'),
            _subcategor_select = _obj.find('.curation_subcategories'),
            _author_select = _obj.find('.curation_artists'),
            _photos_select = _obj.find('.curation_photos'),
            _us_categor_select = _obj.find('.user_categories'),
            _us_photos_select = _obj.find('.user_photos_list'),
            _us_btn_delete = _obj.find('.delete'),
            _add_to_users = _obj.find('.add_to_users'),
            _user_id = _obj.data('user_id'),
            _window = $(window);

        //private methods
        var _onEvents = function () {
                _categor_select.on('click', function () {
                    _categor_select.attr('disabled', true);
                    var select = parseInt($(this).find('option:selected').val());
                    _send("json", {
                        'action': 'subcategories',
                        'user_id': _user_id,
                        'category_id': select
                    }, _showSubCategory);
                    return false;
                });
                $(_obj).on('click','.img_check', function () {
                    $(this).toggleClass('check');
                });
                _subcategor_select.on('click', function () {
                    $(this).attr('disabled', true);
                    var select = parseInt($(this).find('option:selected').val());
                    _send("json", {'action': 'photos', 'user_id': _user_id, 'category_id': select}, _showPhotos);
                    return false;
                });
                _author_select.on('click', function () {
                    $(this).attr('disabled', true);
                    var select = parseInt($(this).find('option:selected').val());
                    _send("json", {'action': 'authphotos', 'user_id': _user_id, 'category_id': select}, _showAuthPhotos);
                    return false;
                });

                _us_categor_select.on('click', function () {
                    $(this).attr('disabled', true);
                    var select = parseInt($(this).find('option:selected').val());
                    _send("json", {'user_id': _user_id, 'action': 'user_photos', 'category_id': select}, _showUserPhotos);
                    return false;
                });
                _add_to_users.on('click', function () {
                    var select = $(_photos_select).find('.check');
                    var posts = [];
                    select.each(function (el) {
                        posts.push(parseInt($(this).data('id')));
                        $(this).remove();
                    });
                    _send("json", {'user_id': _user_id, 'action': 'add_user_photos', 'posts': posts}, _addShowPhotos);

                    return false;
                });

                $(_obj).on('click', _us_btn_delete, function (e) {
                    if ($(e.target).hasClass('delete')) {
                        var _id = $(e.target).data('id');
                        var select = parseInt($(this).find('option:selected').val()) || -1;
                        _send("json", {
                            'action': 'delete_post',
                            'post_id': _id,
                            'user_id': _user_id,
                            "category_id": select
                        }, _showAfterDelete);
                    }
                    return false;
                });
            },

            _init = function () {
                _obj[0].obj = _self;
                _onEvents();
            },
            _send = function (dataType, data, _success) {
                $.ajax({
                    type: "POST",
                    url: _data_action,
                    dataType: dataType,
                    data: data,
                    success: function (response) {
                        _success(response);
                    }
                });
            },
            _showSubCategory = function (data) {

                if (data.subcategory !== undefined) {
                    _subcategor_select.html(data.subcategory);
                } else {
                    _subcategor_select.html('');
                }

                if (data.photos !== undefined) {
                    _photos_select.html(data.photos);
                } else {
                    _photos_select.html('');
                }

                _categor_select.attr('disabled', false);
            },
            _showPhotos = function (data) {
                if (data.photos !== undefined) {
                    _photos_select.html(data.photos);
                } else {
                    _photos_select.html('');
                }
                _subcategor_select.attr('disabled', false);
            },
            _showAuthPhotos = function (data) {
                if (data.photos !== undefined) {
                    _photos_select.html(data.photos);
                } else {
                    _photos_select.html('');
                }
                if (data.subcategory !== undefined) {
                    _subcategor_select.html(data.subcategory);
                } else {
                    _subcategor_select.html('');
                }
                _author_select.attr('disabled', false);
            },
            _showUserPhotos = function (data) {
                if (data.photos !== undefined) {
                    _us_photos_select.html(data.photos);
                } else {
                    _us_photos_select.html('');
                }

                _us_categor_select.attr('disabled', false);
            },
            _showAfterDelete = function (data) {

                if (data.photos !== undefined) {
                    _us_photos_select.html(data.photos);
                } else {
                    _us_photos_select.html('');
                }

                if (data.categories !== undefined) {
                    _us_categor_select.html(data.categories);
                } else {
                    _us_categor_select.html('');
                }
            },
            _addShowPhotos = function (data) {
                if (data.photos !== undefined) {
                    _us_photos_select.html(data.photos);
                } else {
                    _us_photos_select.html('');
                }

                if (data.categories !== undefined) {
                    _us_categor_select.html(data.categories);
                } else {
                    _us_categor_select.html('');
                }
            };

        _init();
    };
})(jQuery);