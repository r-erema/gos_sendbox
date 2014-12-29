$(function () {

	var config = {
		'profizMags' : [
			{'code':'kr'},
			{'code':'sr'},
			{'code':'se'},
			{'code':'eco'},
			{'code':'sec'},
			{'code':'peo'}
		],
		'addresseeForums' : [
			{'name' : 'buhgalter-info.ru'},
			{'name' : 'kadrovik-info.ru'},
			{'name' : 'economist-info.ru'},
			{'name' : 'sekretar-info.ru'},
			{'name' : 'ecolog-info.ru'}
		]
	};

	var body = $('body');
	var parserSelect = $('[name="parser-select"]');
	var controlPanel = $('#parser-control-panel');
	var parseForm = $('#parse-form');
	var formWrapper = $('#form-wrapper');

	parserSelect.on('change', function() {
		controlPanel.hide('fast').empty();
		var selectValue = $(this).val();
		switch(selectValue) {
			case 'profizDigestParser' : controlPanel.apppendProfizMagsDigestControls().show('fast'); break;
			default : body.prependMessage('error','Неизвестный парсер'); break;
		}
	});


	/**
	 * Вставляет блок с информационным сообщением в начало this
	 * @param type
	 * @param text
	 * @returns {*|jQuery|HTMLElement}
	 */
	$.prototype.prependMessage = function(type, text) {
		$('.message').remove();
		var messageBlock = $('<div class="message">' + text + '</div>');
		messageBlock.append(createRemover(messageBlock));
		//x.appendTo(messageBlock);
		return messageBlock.prependTo($(this)).addClass(type).show('fast');
	};

	/**
	 *
	 * @returns {$}
	 */
	$.prototype.apppendProfizMagsDigestControls = function () {
		$(this).append(createProfizMagsButtonsPanel());
		return this;
	};

	/**
	 *
	 * @returns {*|jQuery|HTMLElement}
	 */
	var createProfizMagsButtonsPanel = function () {
		var panel = $('<div id="profiz-mags-to-parse-buttons-panel"><p>Выберите журналы которые нужно сверстать в один документ</p></div>');
		$.each(config.profizMags, function() {
			$('<button name="add-textarea" data-mag="' + this.code + '">'+ this.code + '</button>').appendTo(panel);
		});
		return panel;
	};

	var createAddresseeForumsPanel = function () {
		var div = $('<div id="addressee-forums-buttons">Форум получателей:<br /></div>');
		$.each(config.addresseeForums, function () {
			div.append('<input type="radio" name="addresseeForum" value="' + this.name + '">' + this.name + '<br />');
		});
		return div;
	};

	$(document).on('click', '[name="add-textarea"]',function () {
		var btn = $(this);
		btn.attr('disabled', 'disabled');
		var mag = $(this).data('mag');
		var textAreaWrapper = $('<div class="textarea-wrapper"><h3>' +mag + '</h3></div>');
		createRemover(textAreaWrapper).appendTo(textAreaWrapper).on('click', function () {
			btn.removeAttr('disabled');
		});
		textAreaWrapper.append();
 		var textarea = $('<textarea id="' + mag + '-parse-textarea" cols="120" rows="20" name=texts[' + mag + ']>');
		formWrapper.prepend(textAreaWrapper.append(textarea));
		formWrapper.show();
	});

	/**
	 *
	 * @param toRemove
	 * @returns {*|jQuery|HTMLElement}
	 */
	var createRemover = function (toRemove) {
		var x = $('<a href="#">✖</a>');
		x.on('click', function () {
			toRemove.hide('fast', function () {
				$(this).remove();
			});
		});
		return x;
	}


});