/*
 http://fdeschenes.github.io/bootstrap-tag/
 */

!function ( $ ) {

    'use strict'; // jshint ;_;

    var Tag = function ( element, options ) {
        this.element = $(element);
        this.options = $.extend(true, {}, $.fn.tag.defaults, options);
        this.values = $.grep(
            $.map(this.element.val().split(', '), $.trim),
            function ( value ) {
                return value.length > 0
            }
        );
        this.show();
    };

    Tag.prototype = {
        constructor: Tag

        , show: function () {
            var that = this;

            that.element.parent().prepend(that.element.detach().hide())
            that.element
                .wrap($('<div class="form-control provide-tags">'))
                .parent()
                .on('click', function () {
                    that.input.focus();
                });

            if (that.values.length) {
                $.each(that.values, function () {
                    that.createBadge(this);
                });
            }

            that.input = $('<input type="text">')
                .attr('placeholder', that.options.placeholder)
                .attr('class', 'new-tag')
                .insertAfter(that.element)
                .on('focus', function () {
                    that.element.parent().addClass('tags-hover');
                })
                .on('blur', function () {
                    if (!that.skip) {
                        that.process();
                        that.element.parent().removeClass('tags-hover');
                        that.element.siblings('.tag').removeClass('tag-important');
                    }
                    that.skip = false
                })
                .on('keydown', function ( event ) {
                    if ( event.keyCode == 188 || event.keyCode == 13 || event.keyCode == 9 ) {
                        if ( $.trim($(this).val()) && ( !that.element.siblings('.typeahead').length || that.element.siblings('.typeahead').is(':hidden') ) ) {
                            if ( event.keyCode != 9 ) event.preventDefault()
                            that.process()
                        } else if ( event.keyCode == 188 ) {
                            if ( !that.element.siblings('.typeahead').length || that.element.siblings('.typeahead').is(':hidden') ) {
                                event.preventDefault()
                            } else {
                                that.input.data('typeahead').select();
                                event.stopPropagation();
                                event.preventDefault();
                            }
                        }
                    } else if ( !$.trim($(this).val()) && event.keyCode == 8 ) {
                        var count = that.element.siblings('.label').length
                        if (count) {
                            var tag = that.element.siblings('.label:eq(' + (count - 1) + ')')
                            if (tag.hasClass('label-important')) that.remove(count - 1)
                            else tag.addClass('label-important')
                        }
                    } else {
                        that.element.siblings('.label').removeClass('label-important')
                    }
                });

            $('<div class="clear-fix"></div>').insertBefore(that.input);
            $('<i class="fa fa-plus-square"></i>')
                .on('click',function(e){
                    e.preventDefault();
                    if( $.trim(that.input.val()) ) that.add(that.input.val());
                })
                .insertAfter(that.input);
            this.element.trigger('shown.bs.tags');
        }
        , inValues: function ( value ) {
            if (this.options.caseInsensitive) {
                var index = -1;
                $.each(this.values, function (indexInArray, valueOfElement) {
                    if ( valueOfElement.toLowerCase() == value.toLowerCase() ) {
                        index = indexInArray;
                        return false;
                    }
                });
                return index;
            } else {
                return $.inArray(value, this.values);
            }
        }
        , createBadge: function ( value ) {
            var that = this;

            $('<span/>', {
                'class' : "label label-default"
            })
                .text(value.toString())
                .append($('<i class="fa fa-close"></i>')
                    .on('click', function () {
                        that.remove(that.element.siblings('.label').index($(this).closest('.label')));
                    })
                )
                .insertBefore(that.element)
        }
        , add: function ( value ) {
            var that = this;

            if ( !that.options.allowDuplicates ) {
                var index = that.inValues(value);
                if ( index != -1 ) {
                    var badge = that.element.siblings('.label:eq(' + index + ')')
                    badge.addClass('label-warning');
                    setTimeout(function () {
                        $(badge).removeClass('label-warning')
                    }, 500);
                    return;
                }
            }

            this.values.push(value);
            this.createBadge(value);

            this.element.val(this.values.join(', '));
            this.element.trigger('added.bs.tags', [value]);
        }
        , remove: function ( index ) {
            if ( index >= 0 ) {
                var value = this.values.splice(index, 1);
                this.element.siblings('.label:eq(' + index + ')').remove();
                this.element.val(this.values.join(', '));
                this.element.trigger('removed.bs.tags', [value]);
            }
        }
        , process: function () {
            var values = $.grep($.map(this.input.val().split(','), $.trim), function ( value ) { return value.length > 0 }),
                that = this;
            $.each(values, function() {
                that.add(this);
            });
            this.input.val('');
        }
        , skip: false
    };

    var old = $.fn.tag;

    $.fn.tag = function ( option ) {
        return this.each(function () {
            var that = $(this)
                , data = that.data('tag')
                , options = typeof option == 'object' && option
            if (!data) that.data('tag', (data = new Tag(this, options)));
            if (typeof option == 'string') data[option]();
        });
    };

    $.fn.tag.defaults = {
        allowDuplicates: false
        , caseInsensitive: true
        , placeholder: ''
        , source: []
    };

    $.fn.tag.Constructor = Tag;

    $.fn.tag.noConflict = function () {
        $.fn.tag = old;
        return this;
    };

    $(window).on('load', function () {
        $('[data-provide="tags"]').each(function () {
            var that = $(this);
            if (that.data('tag')) return;
            that.tag(that.data());
        });
    });
}(window.jQuery);