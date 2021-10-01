/**
 * (c) mturek@w3media.pl
 */
( function(factory) {
		if ( typeof define === 'function' && define.amd) {
			define(['jquery'], factory);
		} else if ( typeof module === 'object' && module.exports) {
			module.exports = factory(require('jquery'));
		} else {
			factory(window.jQuery);
		}
	}(function($) {

		$.extend($.summernote.plugins, {
			'iframe' : function(context) {
				var self = this;
				var ui = $.summernote.ui;
				var $editor = context.layoutInfo.editor;
				var options = context.options;
				var lang = options.langInfo;

				context.memo('button.iframe', function() {
					// create button
					var button = ui.button({
						contents : '<i class="fa fa-file-code-o"/>',
						tooltip : 'تضمين صفحة خارجية',
						click : function() {
							self.show()
							ui.showDialog(self.$dialog);
						}
					});

					var $iframe = button.render();
					return $iframe;
				});

				this.events = {
					'summernote.init' : function(we, e) {
					},
					'summernote.keyup' : function(we, e) {
					}
				};

				this.initialize = function() {
					var $container = options.dialogsInBody ? $(document.body) : $editor;
					var body = '' 
						+ '<div class="form-group">' 
							+ '<label>رابط الصفحة</label>' 
							+ '<input class="note-iframe-src form-control col-md-12" type="text" />' 
						+ '</div>' 
						+ '<div class="form-group">' 
							+ '<label>العرض</label>' 
							+ '<input class="note-iframe-width form-control col-md-12" type="text" value="640" />' 
						+ '</div>' 
						+ '<div class="form-group">' 
							+ '<label>الطول</label>' 
							+ '<input class="note-iframe-height form-control col-md-12" type="text" value="360" />' 
						+ '</div>';
					var footer = '<button href="#" class="note-iframe-btn btn btn-primary disabled" disabled>تضمين</button>';
					this.$dialog = ui.dialog({
						title : 'تضمين صفحة خارجية',
						fade : options.dialogsFade,
						body : body,
						footer : footer
					}).render().appendTo($container);
				};

				this.destroy = function() {
					ui.hideDialog(this.$dialog);
					this.$dialog.remove();
					this.$dialog = null;
				};

				this.bindEnterKey = function($input, $btn) {
					$input.on('keypress', function(event) {
						if (event.keyCode === self.key.code.ENTER) {
							$btn.trigger('click');
						}
					});
				};

				this.createIframeNode = function(src, width, height) {

					var $iframe = $('<iframe>').attr('scrolling', 'no').attr('frameborder', 0).attr('src', src).attr('width', parseInt(width,10)).attr('height', parseInt(height,10));
					$iframe.addClass('note-iframe');
					return $iframe[0];

				};

				this.show = function() {
					var text = context.invoke('editor.getSelectedText');
					context.invoke('editor.saveRange');
					this.showIframeDialog(text).then(function(src, width, height) {
						ui.hideDialog(self.$dialog);
						context.invoke('editor.restoreRange');

						var $node = self.createIframeNode(src, width, height);

						if ($node) {
							context.invoke('editor.insertNode', $node);
						}
					}).fail(function() {
						context.invoke('editor.restoreRange');
					});
				};

				this.showIframeDialog = function(text) {
					return $.Deferred(function(deferred) {
						var $iframeSrc = self.$dialog.find('.note-iframe-src'),
						    $iframeWidth = self.$dialog.find('.note-iframe-width'),
						    $iframeHeight = self.$dialog.find('.note-iframe-height'),
						    $iframeBtn = self.$dialog.find('.note-iframe-btn');

						ui.onDialogShown(self.$dialog, function() {
							context.triggerEvent('dialog.shown');
							$iframeSrc.val(text).on('input', function() {
								ui.toggleBtn($iframeBtn, $iframeSrc.val());
							}).trigger('focus');

							$iframeBtn.click(function(event) {
								event.preventDefault();
								deferred.resolve($iframeSrc.val(), $iframeWidth.val(), $iframeHeight.val());
							});

							self.bindEnterKey($iframeSrc, $iframeBtn);
						});

						ui.onDialogHidden(self.$dialog, function() {
							$iframeSrc.off('input');
							$iframeWidth.off('input');
							$iframeHeight.off('input');
							$iframeBtn.off('click');

							if (deferred.state() === 'pending') {
								deferred.reject();
							}
						});

						ui.showDialog(self.$dialog);
					});
				};

			}
		});
	}));
