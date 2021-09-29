/* code Pickter */
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
(function () {
  var ImagePicker,
      ImagePickerOption,
      both_array_are_equal,
      sanitized_options,
      indexOf = [].indexOf;

  jQuery.fn.extend({
    imagepicker: function imagepicker() {
      var opts = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

      return this.each(function () {
        var select;
        select = jQuery(this);
        if (select.data("picker")) {
          select.data("picker").destroy();
        }
        select.data("picker", new ImagePicker(this, sanitized_options(opts)));
        if (opts.initialized != null) {
          return opts.initialized.call(select.data("picker"));
        }
      });
    }
  });

  sanitized_options = function sanitized_options(opts) {
    var default_options;
    default_options = {
      hide_select: true,
      show_label: false,
      initialized: void 0,
      changed: void 0,
      clicked: void 0,
      selected: void 0,
      limit: void 0,
      limit_reached: void 0,
      font_awesome: false
    };
    return jQuery.extend(default_options, opts);
  };

  both_array_are_equal = function both_array_are_equal(a, b) {
    var i, j, len, x;
    if (!a || !b || a.length !== b.length) {
      return false;
    }
    a = a.slice(0);
    b = b.slice(0);
    a.sort();
    b.sort();
    for (i = j = 0, len = a.length; j < len; i = ++j) {
      x = a[i];
      if (b[i] !== x) {
        return false;
      }
    }
    return true;
  };

  ImagePicker = function () {
    function ImagePicker(select_element) {
      var opts1 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

      _classCallCheck(this, ImagePicker);

      this.sync_picker_with_select = this.sync_picker_with_select.bind(this);
      this.opts = opts1;
      this.select = jQuery(select_element);
      this.multiple = this.select.attr("multiple") === "multiple";
      if (this.select.data("limit") != null) {
        this.opts.limit = parseInt(this.select.data("limit"));
      }
      this.build_and_append_picker();
    }

    _createClass(ImagePicker, [{
      key: "destroy",
      value: function destroy() {
        var j, len, option, ref;
        ref = this.picker_options;
        for (j = 0, len = ref.length; j < len; j++) {
          option = ref[j];
          option.destroy();
        }
        this.picker.remove();
        this.select.off("change", this.sync_picker_with_select);
        this.select.removeData("picker");
        return this.select.show();
      }
    }, {
      key: "build_and_append_picker",
      value: function build_and_append_picker() {
        if (this.opts.hide_select) {
          this.select.hide();
        }
        this.select.on("change", this.sync_picker_with_select);
        if (this.picker != null) {
          this.picker.remove();
        }
        this.create_picker();
        this.select.after(this.picker);
        return this.sync_picker_with_select();
      }
    }, {
      key: "sync_picker_with_select",
      value: function sync_picker_with_select() {
        var j, len, option, ref, results;
        ref = this.picker_options;
        results = [];
        for (j = 0, len = ref.length; j < len; j++) {
          option = ref[j];
          if (option.is_selected()) {
            results.push(option.mark_as_selected());
          } else {
            results.push(option.unmark_as_selected());
          }
        }
        return results;
      }
    }, {
      key: "create_picker",
      value: function create_picker() {
        this.picker = jQuery("<ul class='thumbnails image_picker_selector'></ul>");
        this.picker_options = [];
        this.recursively_parse_option_groups(this.select, this.picker);
        return this.picker;
      }
    }, {
      key: "recursively_parse_option_groups",
      value: function recursively_parse_option_groups(scoped_dom, target_container) {
        var container, j, k, len, len1, option, option_group, ref, ref1, results;
        ref = scoped_dom.children("optgroup");
        for (j = 0, len = ref.length; j < len; j++) {
          option_group = ref[j];
          option_group = jQuery(option_group);
          container = jQuery("<ul></ul>");
          container.append(jQuery("<li class='group_title'>" + option_group.attr("label") + "</li>"));
          target_container.append(jQuery("<li class='group'>").append(container));
          this.recursively_parse_option_groups(option_group, container);
        }
        ref1 = function () {
          var l, len1, ref1, results1;
          ref1 = scoped_dom.children("option");
          results1 = [];
          for (l = 0, len1 = ref1.length; l < len1; l++) {
            option = ref1[l];
            results1.push(new ImagePickerOption(option, this, this.opts));
          }
          return results1;
        }.call(this);
        results = [];
        for (k = 0, len1 = ref1.length; k < len1; k++) {
          option = ref1[k];
          this.picker_options.push(option);
          if (!option.has_image()) {
            continue;
          }
          results.push(target_container.append(option.node));
        }
        return results;
      }
    }, {
      key: "has_implicit_blanks",
      value: function has_implicit_blanks() {
        var option;
        return function () {
          var j, len, ref, results;
          ref = this.picker_options;
          results = [];
          for (j = 0, len = ref.length; j < len; j++) {
            option = ref[j];
            if (option.is_blank() && !option.has_image()) {
              results.push(option);
            }
          }
          return results;
        }.call(this).length > 0;
      }
    }, {
      key: "selected_values",
      value: function selected_values() {
        if (this.multiple) {
          return this.select.val() || [];
        } else {
          return [this.select.val()];
        }
      }
    }, {
      key: "toggle",
      value: function toggle(imagepicker_option, original_event) {
        var new_values, old_values, selected_value;
        old_values = this.selected_values();
        selected_value = imagepicker_option.value().toString();
        if (this.multiple) {
          if (indexOf.call(this.selected_values(), selected_value) >= 0) {
            new_values = this.selected_values();
            new_values.splice(jQuery.inArray(selected_value, old_values), 1);
            this.select.val([]);
            this.select.val(new_values);
          } else {
            if (this.opts.limit != null && this.selected_values().length >= this.opts.limit) {
              if (this.opts.limit_reached != null) {
                this.opts.limit_reached.call(this.select);
              }
            } else {
              this.select.val(this.selected_values().concat(selected_value));
            }
          }
        } else {
          if (this.has_implicit_blanks() && imagepicker_option.is_selected()) {
            this.select.val("");
          } else {
            this.select.val(selected_value);
          }
        }
        if (!both_array_are_equal(old_values, this.selected_values())) {
          this.select.change();
          if (this.opts.changed != null) {
            return this.opts.changed.call(this.select, old_values, this.selected_values(), original_event);
          }
        }
      }
    }]);

    return ImagePicker;
  }();

  ImagePickerOption = function () {
    function ImagePickerOption(option_element, picker) {
      var opts1 = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};

      _classCallCheck(this, ImagePickerOption);

      this.clicked = this.clicked.bind(this);
      this.picker = picker;
      this.opts = opts1;
      this.option = jQuery(option_element);
      this.create_node();
    }

    _createClass(ImagePickerOption, [{
      key: "destroy",
      value: function destroy() {
        return this.node.find(".thumbnail").off("click", this.clicked);
      }
    }, {
      key: "has_image",
      value: function has_image() {
        return this.option.data("img-src") != null;
      }
    }, {
      key: "is_blank",
      value: function is_blank() {
        return !(this.value() != null && this.value() !== "");
      }
    }, {
      key: "is_selected",
      value: function is_selected() {
        var select_value;
        select_value = this.picker.select.val();
        if (this.picker.multiple) {
          return jQuery.inArray(this.value(), select_value) >= 0;
        } else {
          return this.value() === select_value;
        }
      }
    }, {
      key: "mark_as_selected",
      value: function mark_as_selected() {
        return this.node.find(".thumbnail").addClass("selected");
      }
    }, {
      key: "unmark_as_selected",
      value: function unmark_as_selected() {
        return this.node.find(".thumbnail").removeClass("selected");
      }
    }, {
      key: "value",
      value: function value() {
        return this.option.val();
      }
    }, {
      key: "label",
      value: function label() {
        if (this.option.data("img-label")) {
          return this.option.data("img-label");
        } else {
          return this.option.text();
        }
      }
    }, {
      key: "clicked",
      value: function clicked(event) {
        this.picker.toggle(this, event);
        if (this.opts.clicked != null) {
          this.opts.clicked.call(this.picker.select, this, event);
        }
        if (this.opts.selected != null && this.is_selected()) {
          return this.opts.selected.call(this.picker.select, this, event);
        }
      }
    }, {
      key: "create_node",
      value: function create_node() {
        var image, imgAlt, imgClass, thumbnail;
        this.node = jQuery("<li/>");
        // font-awesome support
        if (this.option.data("font_awesome")) {
          image = jQuery("<i>");
          image.attr("class", "fa-fw " + this.option.data("img-src"));
        } else {
          image = jQuery("<img class='image_picker_image'/>");
          image.attr("src", this.option.data("img-src"));
        }
        thumbnail = jQuery("<div class='thumbnail'>");
        // Add custom class
        imgClass = this.option.data("img-class");
        if (imgClass) {
          this.node.addClass(imgClass);
          image.addClass(imgClass);
          thumbnail.addClass(imgClass);
        }
        // Add image alt
        imgAlt = this.option.data("img-alt");
        if (imgAlt) {
          image.attr('alt', imgAlt);
        }
        thumbnail.on("click", this.clicked);
        thumbnail.append(image);
        if (this.opts.show_label) {
          thumbnail.append(jQuery("<p/>").html(this.label()));
        }
        this.node.append(thumbnail);
        return this.node;
      }
    }]);

    return ImagePickerOption;
  }();
}).call(undefined);